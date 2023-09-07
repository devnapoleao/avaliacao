let protocolo = window.location.href.split('#')[0].split('?')[0].split('/')[0];
let servidor = window.location.href.split('#')[0].split('?')[0].split('/')[2];
let dominio = window.location.href.split('#')[0].split('?')[0].split('/')[3];
var CURRENT_URL = protocolo+'//'+servidor+'/'+dominio+'/';
var nota1 = 0;
var nota2 = 0;
var nota3 = 0;

$(document).ready(function(){

    $(document).keypress(function(e) {
        if(e.which == 13){
            $('.btn-login-cliente').click();
        } 
    });

    $(".btn-login-cliente").on("click", function(){
        let idObra = $(".btn-login-cliente").attr("data-idobra");
        let codUsuario = $("#usuario").val();
        validarCLiente(idObra, codUsuario);
    });

    $(".btn-salvar-avaliacao").on("click", function(){
        let idObra = $(".btn-salvar-avaliacao").attr("data-idobra");
        let comentario = $("#comentario").val();
        salvarAvaliacao(idObra,nota1,nota2,nota3,comentario);
    });

    $('.estrela-n1-click').on("click", function(){
        nota1 = $(this).val();
    });

    $('.estrela-n2-click').on("click", function(){
        nota2 = $(this).val();
    });

    $('.estrela-n3-click').on("click", function(){
        nota3 = $(this).val();
    });
});


function validarCLiente(idObra, idCliente){
    
    let obj = "{";
    obj += '"ID":"'+idObra              +'",'; 
    obj += '"CLIENTE":"'+ idCliente     +'"';
    obj += "}";

    $.post(CURRENT_URL+"Controller/avaliacao/loginClienteController.php", {data: obj}, function() {
    }).done(function(data) {
        
        window.location.href = CURRENT_URL+data;

    }).fail(function() {
    
        console.log( "AtualizarTabela - erro ao realizar consulta");
    
    }).always(function() {
    });

}

function salvarAvaliacao(idObra, nota1, nota2, nota3, comentario){

    let obj = "{";
    obj += '"OBRAS_ID":"'+idObra        +'",'; 
    obj += '"NOTA1":"'+ nota1           +'",';
    obj += '"NOTA2":"'+ nota2           +'",';
    obj += '"NOTA3":"'+ nota3           +'",';
    obj += '"COMENTARIO":"'+ comentario +'"';
    obj += "}";

    $.post(CURRENT_URL+"Controller/avaliacao/salvarAvaliacaoControoler.php", {data: obj}, function() {
    }).done(function(data) {
        
        alert(data);
        location.reload();

    }).fail(function() {
    
        console.log( "AtualizarTabela - erro ao realizar consulta");
    
    }).always(function() {
    });   
}

