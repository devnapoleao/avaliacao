<?php

    session_start();
    if(!$_SESSION["logado"]){
        echo "Usuario nao esta logado !";   
        exit;

    }else{

        require_once('../Config.php');
        $item = json_decode($_POST['data']);

        $result = "[";
         
        if($item->EQUIPE_ID == 0){
            $sql =  "SELECT  A.OBRAS_ID, A.NOTA1, A.NOTA2, A.NOTA3, A.COMENTARIO, C.NOME_EQUIPE"; 
            $sql .= "  FROM AVALIACAO A"; 
            $sql .= " JOIN OBRAS   B ON B.OBRAS_ID = A.OBRAS_ID";
            $sql .= " JOIN EQUIPES C ON C.EQUIPE_ID = B.EQUIPE_ID";
            
            $stmt = $pdo->query($sql);
            $items = $stmt->fetchAll();


        }else{
            $sql =  "SELECT  A.OBRAS_ID, A.NOTA1, A.NOTA2, A.NOTA3, A.COMENTARIO, C.NOME_EQUIPE"; 
            $sql .= "  FROM AVALIACAO A"; 
            $sql .= " JOIN OBRAS   B ON B.OBRAS_ID = A.OBRAS_ID";
            $sql .= " JOIN EQUIPES C ON C.EQUIPE_ID = B.EQUIPE_ID";
            $sql .= " WHERE C.EQUIPE_ID = :EQUIPE_ID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['EQUIPE_ID' => $item->EQUIPE_ID]);
            $items = $stmt->fetchAll();
        }

        foreach($items as $row)
        {
            $result = $result.'{';
            $result = $result.'"OBRAS_ID":"'.$row['OBRAS_ID'].'",';
            $result = $result.'"NOTA1":"'.$row['NOTA1'].'",';
            $result = $result.'"NOTA2":"'.$row['NOTA2'].'",';
            $result = $result.'"NOTA3":"'.$row['NOTA3'].'",';
            $result = $result.'"COMENTARIO":"'.$row['COMENTARIO'].'",';
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