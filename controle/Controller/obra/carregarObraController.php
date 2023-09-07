<?php

    session_start();
    if(!$_SESSION["logado"]){
        echo "Usuario nao esta logado !";   
        exit;

    }else{
        
        require_once('../Config.php');
        $result = "[";

        $sql = "SELECT A.OBRAS_ID, A.CLIENTE_ID, A.NOME_CLIENTE, A.EMAIL, A.CIDADE, A.EQUIPE_ID, B.NOME_EQUIPE FROM OBRAS A JOIN EQUIPES B ON B.EQUIPE_ID = A.EQUIPE_ID";
        $select = $pdo->query($sql);
        $items = $select->fetchAll();
        foreach($items as $row)
        {
            $result = $result.'{';
            $result = $result.'"OBRAS_ID":"'.$row['OBRAS_ID'].'",';
            $result = $result.'"CLIENTE_ID":"'.$row['CLIENTE_ID'].'",';
            $result = $result.'"NOME_CLIENTE":"'.$row['NOME_CLIENTE'].'",';
            $result = $result.'"EMAIL":"'.$row['EMAIL'].'",';
            $result = $result.'"CIDADE":"'.$row['CIDADE'].'",';
            $result = $result.'"EQUIPE_ID":"'.$row['EQUIPE_ID'].'",';
            $result = $result.'"NOME_EQUIPE":"'.$row['NOME_EQUIPE'].'"';
            $result = $result.'},';
        }
        if($result != "["){
            $result = substr($result, 0, -1);
        }
        $result = $result."]";

        echo $result;
        
    }

  ?>