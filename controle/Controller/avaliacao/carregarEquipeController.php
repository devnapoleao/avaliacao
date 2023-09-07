<?php

    session_start();
    if(!$_SESSION["logado"]){
        echo "Usuario nao esta logado !";   
        exit;

    }else{
        
        require_once('../Config.php');
        $result = "[";

        $sql = "SELECT EQUIPE_ID, NOME_EQUIPE, INTEGRANTES, ENDERECO, EMAIL, TELEFONE FROM EQUIPES";
        $select = $pdo->query($sql);
        $items = $select->fetchAll();
        foreach($items as $row)
        {
            $result = $result.'{';
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