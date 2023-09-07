$(document).ready(function(){

    
    $(document).on('click','.btn-buscar', function(){
        let idEquipe = $("#combo-equipes-avaliadas").val();
        atualizarTabelaObraAvaliadas(idEquipe);
    });


});



function carregarComboEquipesAvaliadas(){
    $("#combo-equipes-avaliadas").html('');

    $.post(CURRENT_URL+"Controller/avaliacao/carregarEquipeController.php", function() {
    }).done(function(data) {
        
        let dados = JSON.parse(data);

        //Criando primeiro item do COMBO-BOX
        let itemEquipe = document.createElement("option");
        itemEquipe.value = 0;
        itemEquipe.innerText = "Todas";
        itemEquipe.setAttribute("selected", "");
        document.querySelector("#combo-equipes-avaliadas").appendChild(itemEquipe);
        
        for (const prop in dados) {    
            criarItemComboObras(dados[prop]);
        }

        $("#combo-equipes-avaliadas").selectize({
            plugins: ["remove_button"]
        });

    }).fail(function() {
    
        console.log( "carregarComboObras - erro ao realizar consulta");
    
    }).always(function() {
    });

}

function criarItemComboObras(data){
    let itemEquipe = document.createElement("option");
    itemEquipe.value = data.EQUIPE_ID
    itemEquipe.innerText = data.NOME_EQUIPE;
    document.querySelector("#combo-equipes-avaliadas").appendChild(itemEquipe);
}

function atualizarTabelaObraAvaliadas(idEquipe){
    $("#conteudo-tabela-obrasAvaliadas").html('');

    let obj = "{";
    obj += '"EQUIPE_ID":"'+idEquipe+'"'; 
    obj += "}";

    $.post(CURRENT_URL+"Controller/avaliacao/carregarObrasAvaliadasController.php",{data: obj}, function() {
    }).done(function(data) {
        
        let dados = JSON.parse(data);
        for (const prop in dados) {    
            criarLinhaTabelaObraAvaliada(dados[prop]);
        }

    }).fail(function() {
    
        console.log( "atualizarTabelaObraAvaliadas - erro ao realizar consulta");
    
    }).always(function() {
    });

}

function criarLinhaTabelaObraAvaliada(data){
    var linha = document.createElement('tr');
    
    let colunaId = document.createElement("td");
    colunaId.innerText = data.OBRAS_ID;
    linha.appendChild(colunaId);

    let colNomeCliente = document.createElement("td");
    colNomeCliente.innerText = data.NOME_EQUIPE;
    colNomeCliente.setAttribute("id","NOME_EQUIPE-"+data.OBRAS_ID);
    linha.appendChild(colNomeCliente);
    
    let colNota1 = document.createElement("td");
    colNota1.innerText = data.NOTA1;
    colNota1.setAttribute("id","NOTA1-"+data.OBRAS_ID);
    linha.appendChild(colNota1);
    
    let colNota2 = document.createElement("td");
    colNota2.innerText = data.NOTA2;
    colNota2.setAttribute("id","NOTA2-"+data.OBRAS_ID);
    linha.appendChild(colNota2);

    let colNota3 = document.createElement("td");
    colNota3.innerText = data.NOTA3;
    colNota3.setAttribute("id","NOTA3-"+data.OBRAS_ID);
    linha.appendChild(colNota3);

    let colComentario = document.createElement("td");
    colComentario.innerText = data.COMENTARIO;
    colComentario.setAttribute("id","COMENTARIO-"+data.OBRAS_ID);
    colComentario.setAttribute("class","col-4");
    colComentario.setAttribute("style","overflow: hidden;");
    linha.appendChild(colComentario);


    $("#conteudo-tabela-obrasAvaliadas").append(linha);
    
}