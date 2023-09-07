<?php
    
    require_once('../Config.php');
    $item = json_decode($_POST['data']);

    $stmt = $pdo->prepare("SELECT OBRAS_ID, CLIENTE_ID FROM OBRAS WHERE OBRAS_ID = :ID AND CLIENTE_ID = :CLIENTE");
    $stmt->execute(['ID' => $item->ID, 'CLIENTE' => $item->CLIENTE]); 
    $data = $stmt->fetchAll();

    if($data != null){
        session_start();
        $_SESSION["cliente_logado"] = true;  
        $result = "pages/avaliarObras.php?idObra=".$item->ID; 
    }else{
        $_SESSION["cliente_logado"] = false;  
        $result = "pages/avaliarLogin.php?idObra=".$item->ID; 
    }

    echo $result;
    
  ?>