<?php
    session_start();
    if(!$_SESSION["cliente_logado"]){
        header("Location: avaliarLogin.php?idObra=".$_GET['idObra']); 
        exit;
    }else{
        if($_GET != null){
            $idObra = $_GET['idObra'];
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<style>
    #main-conteudo{
    margin: 0 auto;
    width: 80%;
}



.pergunta{
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
}

.input-comentario {
    unicode-bidi: bidi-override; /* Mantém a direção correta dos caracteres */
    font-size: 1rem;             /* Tamanho das estrelas */
}


/* ESTRELAS NOTA1 */
.estrelas-n1 {
    direction: rtl;              /* Inverte a direção das estrelas para serem exibidas da direita para a esquerda */
    unicode-bidi: bidi-override; /* Mantém a direção correta dos caracteres */
    font-size: 3rem;             /* Tamanho das estrelas */
    margin-bottom: 20px;         /* Espaçamento inferior */
    position: relative;
}

.estrelas-n1 div .estrela-n1-click {
    display: none; /* Esconde os inputs de rádio */
}

.estrelas-n1 label {
    display: inline-block;
    cursor: pointer;
    color: #ccc; /* Cor das estrelas vazias */
}

.estrelas-n1 div label:hover,
.estrelas-n1 div .estrela-n1-click:checked ~ label {
    color: #ffcc00; /* Cor das estrelas preenchidas ao passar o mouse ou quando selecionadas */
}


/* ESTRELAS NOTA2 */
.estrelas-n2 {
    direction: rtl;              /* Inverte a direção das estrelas para serem exibidas da direita para a esquerda */
    unicode-bidi: bidi-override; /* Mantém a direção correta dos caracteres */
    font-size: 3rem;             /* Tamanho das estrelas */
    margin-bottom: 20px;         /* Espaçamento inferior */
    position: relative;
}

.estrelas-n2 div .estrela-n2-click {
    display: none; /* Esconde os inputs de rádio */
}

.estrelas-n2 label {
    display: inline-block;
    cursor: pointer;
    color: #ccc; /* Cor das estrelas vazias */
}

.estrelas-n2 label:hover,
.estrelas-n2 div .estrela-n2-click:checked ~ label {
    color: #ffcc00; /* Cor das estrelas preenchidas ao passar o mouse ou quando selecionadas */
}



/* ESTRELAS NOTA3 */
.estrelas-n3 {
    direction: rtl;              /* Inverte a direção das estrelas para serem exibidas da direita para a esquerda */
    unicode-bidi: bidi-override; /* Mantém a direção correta dos caracteres */
    font-size: 3rem;             /* Tamanho das estrelas */
    margin-bottom: 20px;         /* Espaçamento inferior */
    position: relative;
}

.estrelas-n3 div .estrela-n3-click {
    display: none; /* Esconde os inputs de rádio */
}

.estrelas-n3 label {
    display: inline-block;
    cursor: pointer;
    color: #ccc; /* Cor das estrelas vazias */
}

.estrelas-n3 label:hover,
.estrelas-n3 div .estrela-n3-click:checked ~ label {
    color: #ffcc00; /* Cor das estrelas preenchidas ao passar o mouse ou quando selecionadas */
}




.form-fazer-avaliacao{
    display: none;
}






</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Link da fonte-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap">

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
<style>
/* Estilos gerais */
body {
    background-color: #5d5a56;
    color: #ffffff;
    font-family: 'Poppins', sans-serif;
    font-size: 16px;
}

h1 {
    font-size: 26px; /* Tamanho da fonte para h1 */
    text-align: center; /* Centralizar o texto horizontalmente */
    font-weight: bold; /* Deixar o texto em negrito */
}
h2 {
    font-size: 18px; /* Tamanho da fonte para h2 */
}

h3 {
    font-size: 26px; /* Tamanho da fonte para h1 */
    text-align: center; /* Centralizar o texto horizontalmente */

}

.input-comentario textarea {
    padding: 15px;
    width: 100%; /* Define a largura como 100% para ocupar toda a largura da tela */
    box-sizing: border-box; /* Inclui o padding na largura total do elemento */
}

/* Estilo para o botão */

.botao-avaliacao {
  display: flex;
  justify-content: center;
  align-items: center;
}

.botao-avaliacao button {
    background-color: black; /* Define a cor de fundo como preto */
    color: white; /* Define a cor do texto como branco */
    font-size: 1.2rem; /* Define o tamanho da fonte */
    padding: 10px; /* Adiciona algum espaço interno para melhor aparência */
    border: none; /* Remove a borda */
    cursor: pointer; /* Adiciona um cursor de ponteiro ao passar o mouse */
    
}

/* Estilo para o botão no hover (passar o mouse) */
.botao-avaliacao button:hover {
    background-color: white; /* Altera a cor de fundo para branco ao passar o mouse */
    color: black; /* Altera a cor do texto para preto ao passar o mouse */
}

/* Estilo para o botão */
.botaoteste {
    background-color: black; /* Define a cor de fundo como preto */
    color: white; /* Define a cor do texto como branco */
    font-size: 1.2rem; /* Define o tamanho da fonte */
    padding: 10px; /* Adiciona algum espaço interno para melhor aparência */
    border: none; /* Remove a borda */
    cursor: pointer; /* Adiciona um cursor de ponteiro ao passar o mouse */
    
    /* Centralize horizontalmente */
    margin: 0 auto;
    
    /* Centralize verticalmente (opcional, dependendo do contexto) */
    /* Você pode ajustar o valor de acordo com suas necessidades */
    display: flex;
    justify-content: center;
    align-items: center;
}

.input-comentario textarea {
    background-color: #f4f9fc; /* Cor de fundo desejada */
    border-radius: 10px; /* Raio de borda arredondada de 10px */
    padding: 15px;
    width: 100%;
    box-sizing: border-box;
}


</style>
<body>

    <div id="main-conteudo">
        
        <div class="pergunta">
            <br>
            <img src="logo.png" alt="Logo" width="60" height="60" style="display: block; margin: 0 auto;">
            <h2>Palácio Negócios Inteligentes</h2><br>
            <h1>A sua avaliação é muito importante!</h1>
            <h3>Avalie a equipe nos seguintes aspectos:</h3><br>
            <h2>Limpeza</h2>
            <div class="estrelas-n1">
                <div>
                    <input type="radio" id="n1-estrela5" class="estrela-n1-click" name="avaliacao-n1" value="5">
                    <label for="n1-estrela5">&#9733;</label>
                    <input type="radio" id="n1-estrela4" class="estrela-n1-click" name="avaliacao-n1" value="4">
                    <label for="n1-estrela4">&#9733;</label>
                    <input type="radio" id="n1-estrela3" class="estrela-n1-click" name="avaliacao-n1" value="3">
                    <label for="n1-estrela3">&#9733;</label>
                    <input type="radio" id="n1-estrela2" class="estrela-n1-click" name="avaliacao-n1" value="2">
                    <label for="n1-estrela2">&#9733;</label>
                    <input type="radio" id="n1-estrela1" class="estrela-n1-click" name="avaliacao-n1" value="1">
                    <label for="n1-estrela1">&#9733;</label>
                </div>
            </div>
        </div>
        <br />
        <br />
        <div class="pergunta">
            <h2>Esclarecimento sobre o sistema</h2>
            <div class="estrelas-n2">
                <div>
                    <input type="radio" id="n2-estrela5" class="estrela-n2-click" name="avaliacao-n2" value="5">
                    <label for="n2-estrela5">&#9733;</label>
                    <input type="radio" id="n2-estrela4" class="estrela-n2-click" name="avaliacao-n2" value="4">
                    <label for="n2-estrela4">&#9733;</label>
                    <input type="radio" id="n2-estrela3" class="estrela-n2-click" name="avaliacao-n2" value="3">
                    <label for="n2-estrela3">&#9733;</label>
                    <input type="radio" id="n2-estrela2" class="estrela-n2-click" name="avaliacao-n2" value="2">
                    <label for="n2-estrela2">&#9733;</label>
                    <input type="radio" id="n2-estrela1" class="estrela-n2-click" name="avaliacao" value="1">
                    <label for="n2-estrela1">&#9733;</label>
                </div>
            </div>
        </div>
        <br />
        <br />
        <div class="pergunta">
            <h2>Cordialidade</h2>
            <div class="estrelas-n3">
                <div>
                    <input type="radio" id="n3-estrela5" class="estrela-n3-click" name="avaliacao-n3" value="5">
                    <label for="n3-estrela5">&#9733;</label>
                    <input type="radio" id="n3-estrela4" class="estrela-n3-click" name="avaliacao-n3" value="4">
                    <label for="n3-estrela4">&#9733;</label>
                    <input type="radio" id="n3-estrela3" class="estrela-n3-click" name="avaliacao-n3" value="3">
                    <label for="n3-estrela3">&#9733;</label>
                    <input type="radio" id="n3-estrela2" class="estrela-n3-click" name="avaliacao-n3" value="2">
                    <label for="n3-estrela2">&#9733;</label>
                    <input type="radio" id="n3-estrela1" class="estrela-n3-click" name="avaliacao-n3" value="1">
                    <label for="n3-estrela1">&#9733;</label>
                </div>
            </div>
        </div>
        <br />
        <br />
        <div class="pergunta">
            <h2>Deixe um comentário</h2>
            <div class="input-comentario">
                <textarea name="comentario" id="comentario" cols="60" rows="8"></textarea>
            </div>
        </div>
        <br />
        <br />
        
        <div class="form-row right botao-avaliacao">
            <button type="button" class="btn btn-success btn-salvar-avaliacao" data-idObra="<?php echo $idObra; ?>">PRONTO</button>
        </div>
        <br />
    </div>


    <script src="../script/JQuery.js"></script>
    <script src="../script/avaliar.js"></script> 
    
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