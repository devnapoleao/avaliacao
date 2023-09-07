<?php
    session_start();
    if(!$_SESSION["logado"]){
        header("Location: index.php"); 
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style/principal.css" type="text/css" />
    <link rel="stylesheet" href="./style/cadastrarObras.css" type="text/css" />
    <link rel="stylesheet" href="./style/cadastrarEquipes.css" type="text/css" />
    <link rel="stylesheet" href="./style/avaliarObras.css" type="text/css" />
    <!-- CSS do boostrap-->
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
        crossorigin="anonymous" 
    />
    
    <!-- CSS do selectize-->
    <link 
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <title>Sistema de controle</title>
</head>
<body>

    <?php
        require_once("./pages/header.php");
    ?>

    <div id="main-conteudo">
          
    </div>


    <script src="./script/JQuery.js"></script>
    <script src="./script/principal.js"></script> 
    <script src="./script/equipes.js"></script> 
    <script src="./script/obras.js"></script>
    <script src="./script/obrasAvaliadas.js"></script>
    
    <!-- JavaScript do boostrap -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
        crossorigin="anonymous">
    </script>
    
    <!-- JavaScript do selectize -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
    </script>

</body>
</html>