<?php
  session_start();
  $_SESSION["logado"] = false;  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Usando CSS do boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" 
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" 
          crossorigin="anonymous" />

    <link rel="stylesheet" href="./style/index.css" />

    <title>Avaliação de obras - Login</title>
</head>
<body>

    <!-- Formulário de Login -->
  <form action="./Controller/validarLogin.php" method="post" class="form-login">
    <div class="row input-nome">
      <div class="input-group mb-12 col-12">
        <span class="input-group-text" id="inputGroup-sizing-default">Usuário</span>
        <input type="text" class="form-control" aria-label="Sizing example input" name="usuario" aria-describedby="inputGroup-sizing-default">
      </div>
    </div>
    
    <div class="row input-senha">
      <div class="input-group mb-12 col-12">
        <span class="input-group-text" id="inputGroup-sizing-default">Senha</span>
        <input type="password" class="form-control" aria-label="Sizing example input" name="senha" aria-describedby="inputGroup-sizing-default">
      </div>
    </div>
    <br />
    <button type="submit" class="btn btn-primary row">Acessar</button>

  </form>
    
  <!-- Usando JavaScript do boostrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" 
          integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" 
          crossorigin="anonymous"></script>

</body>
</html>