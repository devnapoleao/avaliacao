<?php

    session_start();
    if(!$_SESSION["cliente_logado"]){
        echo "Usuario nao esta logado !";   
        exit;

    }else{
        
        require_once('../Config.php');
        $item = json_decode($_POST['data']);

        $sql = "DELETE FROM AVALIACAO WHERE OBRAS_ID = :id";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":id", $item->OBRAS_ID, PDO::PARAM_STR);

            // Tente executar a declaração preparada
            if($stmt->execute()){
                $mensagem = 'Registro excluido com sucesso!';
            } else{
                $mensagem = "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }
            // Fechar conexão
            unset($stmt);
        }

        $sql = "INSERT INTO AVALIACAO (OBRAS_ID, NOTA1, NOTA2, NOTA3, COMENTARIO) VALUES (:OBRAS_ID, :NOTA1, :NOTA2, :NOTA3, :COMENTARIO)";

        if($stmt = $pdo->prepare($sql)){
            // Vincule as variáveis à instrução preparada como parâmetros
            $stmt->bindParam(":OBRAS_ID", $item->OBRAS_ID, PDO::PARAM_STR);
            $stmt->bindParam(":NOTA1", $item->NOTA1, PDO::PARAM_STR);
            $stmt->bindParam(":NOTA2", $item->NOTA2, PDO::PARAM_STR);
            $stmt->bindParam(":NOTA3", $item->NOTA2, PDO::PARAM_STR);
            $stmt->bindParam(":COMENTARIO", $item->COMENTARIO, PDO::PARAM_STR);
            
            // Tente executar a declaração preparada
            if($stmt->execute()){
                $_SESSION["cliente_logado"] = false;  
                echo 'Registro salvo com sucesso!';
            } else{
                echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar conexão
            unset($stmt);
        }


    }
    

  ?>