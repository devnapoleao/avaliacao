let protocolo = window.location.href.split('#')[0].split('?')[0].split('/')[0];
let servidor = window.location.href.split('#')[0].split('?')[0].split('/')[2];
let dominio = window.location.href.split('#')[0].split('?')[0].split('/')[3];
var CURRENT_URL = protocolo+'//'+servidor+'/'+dominio+'/';

$(document).ready( function(){

    $("#CadastroEquipes").on('click', function(){
        $("#main-conteudo").html("");
        $("#main-conteudo").load("./pages/cadastrarEquipes.php", function() {
            atualizarTabelaEquipes();    
        });
        
        $(document).on('click','.btn-salvar-equipe',function(){
            salvarEquipe();
        });

    });

    $("#CadastroObras").on('click', function(){
        $("#main-conteudo").html("");
        $("#main-conteudo").load("./pages/cadastrarObras.php", function() {
                     

            atualizarTabelaObra();
            carregarComboEquipes();

        });

        $(document).on('click','.btn-salvar-Obra',function(){
            salvarObra();
        });
    });


    $("#AvaliarObras").on('click', function(){
        $("#main-conteudo").html("");
        $("#main-conteudo").load("./pages/obrasAvaliadas.php", function(){

            carregarComboEquipesAvaliadas();
            atualizarTabelaObraAvaliadas(0);

        });
    });
    

});

