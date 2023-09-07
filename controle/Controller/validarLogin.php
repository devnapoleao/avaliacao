<?php
session_start();
if( (trim($_POST['usuario']) == 'admin') and (trim($_POST['senha']) == '123') ) {
    $_SESSION["logado"] = true;  
    header("Location: ../principal.php"); 
    exit;
}else{
    $_SESSION["logado"] = false;
    header("Location: ../index.php"); 
    exit;
}

?>