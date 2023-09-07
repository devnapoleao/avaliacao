<?php

    session_start();
    if(!$_SESSION["logado"]){
        echo "Usuario nao esta logado !";   
        exit;

    }else{
        
        require_once('../Config.php');
        $item = json_decode($_POST['data']);

        if($item->ID == 0){
            // Prepare uma declaração selecionada
            $sql = "INSERT INTO OBRAS (CLIENTE_ID, NOME_CLIENTE, EMAIL, CIDADE, EQUIPE_ID) VALUES (:CLIENTE_ID, :NOME_CLIENTE, :EMAIL, :CIDADE, :EQUIPE_ID)";

            if($stmt = $pdo->prepare($sql)){
                // Vincule as variáveis à instrução preparada como parâmetros
                $stmt->bindParam(":CLIENTE_ID", $item->CLIENTE_ID, PDO::PARAM_STR);
                $stmt->bindParam(":NOME_CLIENTE", $item->NOME_CLIENTE, PDO::PARAM_STR);
                $stmt->bindParam(":EMAIL", $item->EMAIL, PDO::PARAM_STR);
                $stmt->bindParam(":CIDADE", $item->CIDADE, PDO::PARAM_STR);
                $stmt->bindParam(":EQUIPE_ID", $item->EQUIPE_ID, PDO::PARAM_STR);

                // Tente executar a declaração preparada
                if($stmt->execute()){
                    echo 'Registro salvo com sucesso!';
                } else{
                    echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
                }

                // Fechar conexão
                unset($stmt);
            }

        }else{

            // Prepare uma declaração selecionada
            $sql = "UPDATE OBRAS 
                       SET CLIENTE_ID = :CLIENTE_ID, 
                           NOME_CLIENTE = :NOME_CLIENTE, 
                           EMAIL = :EMAIL, 
                           CIDADE = :CIDADE, 
                           EQUIPE_ID = :EQUIPE_ID 
                     WHERE OBRAS_ID = :OBRAS_ID";

            if($stmt = $pdo->prepare($sql)){
                // Vincule as variáveis à instrução preparada como parâmetros
                $stmt->bindParam(":CLIENTE_ID", $item->CLIENTE_ID, PDO::PARAM_STR);
                $stmt->bindParam(":NOME_CLIENTE", $item->NOME_CLIENTE, PDO::PARAM_STR);
                $stmt->bindParam(":EMAIL", $item->EMAIL, PDO::PARAM_STR);
                $stmt->bindParam(":CIDADE", $item->CIDADE, PDO::PARAM_STR);
                $stmt->bindParam(":EQUIPE_ID", $item->EQUIPE_ID, PDO::PARAM_STR);
                $stmt->bindParam(":OBRAS_ID", $item->ID, PDO::PARAM_STR);
                
                // Tente executar a declaração preparada
                if($stmt->execute()){
                    echo 'Registro salvo com sucesso!';
                } else{
                    echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
                }

                // Fechar conexão
                unset($stmt);
            }

        }
    }
    

  ?>