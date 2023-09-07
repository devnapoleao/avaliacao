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
            $sql = "INSERT INTO EQUIPES (NOME_EQUIPE, INTEGRANTES, ENDERECO, EMAIL, TELEFONE) VALUES (:NOME_EQUIPE, :INTEGRANTES, :ENDERECO, :EMAIL, :TELEFONE)";

            if($stmt = $pdo->prepare($sql)){
                // Vincule as variáveis à instrução preparada como parâmetros
                $stmt->bindParam(":NOME_EQUIPE", $item->NOME, PDO::PARAM_STR);
                $stmt->bindParam(":INTEGRANTES", $item->INTEGRANTES, PDO::PARAM_STR);
                $stmt->bindParam(":ENDERECO", $item->ENDERECO, PDO::PARAM_STR);
                $stmt->bindParam(":EMAIL", $item->EMAIL, PDO::PARAM_STR);
                $stmt->bindParam(":TELEFONE", $item->TELEFONE, PDO::PARAM_STR);

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
            $sql = "UPDATE EQUIPES 
                       SET NOME_EQUIPE = :NOME_EQUIPE, 
                           INTEGRANTES = :INTEGRANTES, 
                           ENDERECO = :ENDERECO, 
                           EMAIL = :EMAIL, 
                           TELEFONE = :TELEFONE 
                     WHERE EQUIPE_ID = :EQUIPE_ID";

            if($stmt = $pdo->prepare($sql)){
                // Vincule as variáveis à instrução preparada como parâmetros
                $stmt->bindParam(":NOME_EQUIPE", $item->NOME, PDO::PARAM_STR);
                $stmt->bindParam(":INTEGRANTES", $item->INTEGRANTES, PDO::PARAM_STR);
                $stmt->bindParam(":ENDERECO", $item->ENDERECO, PDO::PARAM_STR);
                $stmt->bindParam(":EMAIL", $item->EMAIL, PDO::PARAM_STR);
                $stmt->bindParam(":TELEFONE", $item->TELEFONE, PDO::PARAM_STR);
                $stmt->bindParam(":EQUIPE_ID", $item->ID, PDO::PARAM_STR);
                
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