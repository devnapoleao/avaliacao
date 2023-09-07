<?php

    session_start();
    if(!$_SESSION["logado"]){
        echo "Usuario nao esta logado !";   
        exit;

    }else{

        require_once('../Config.php');
        $item = json_decode($_POST['data']);
        $mensagem = "";

        $sql = "DELETE FROM OBRAS WHERE OBRAS_ID = :id";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":id", $item, PDO::PARAM_STR);

            // Tente executar a declaração preparada
            if($stmt->execute()){
                $mensagem = 'Registro excluido com sucesso!';
            } else{
                $mensagem = "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
            }

            // Fechar conexão
            unset($stmt);
        }
        
        echo $mensagem;
    }

  ?>