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
            $result = $result.'"ID":"'.$row['EQUIPE_ID'].'",';
            $result = $result.'"NOME":"'.$row['NOME_EQUIPE'].'",';
            $result = $result.'"INTEGRANTES":"'.$row['INTEGRANTES'].'",';
            $result = $result.'"ENDERECO":"'.$row['ENDERECO'].'",';
            $result = $result.'"EMAIL":"'.$row['EMAIL'].'",';
            $result = $result.'"TELEFONE":"'.$row['TELEFONE'].'"';
            $result = $result.'},';
        }
        if($result != "["){
            $result = substr($result, 0, -1);
        }
        $result = $result."]";

        echo $result;
        
    }

  ?>