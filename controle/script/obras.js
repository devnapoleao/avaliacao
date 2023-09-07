$(document).ready( function(){

    
    $(document).on('click','.excluir-registro-obra',function(){
        let id = $(this).attr("data-idRegistroExcluir");
        excluirRegistroObra(id);
    });

    $(document).on('click','.editar-registro-obra',function(){

        limparForumularioObra();

        let id = $(this).attr("data-idRegistroEdit");
        $('#CLIENTE_ID').val($('#CLIENTE_ID-'+id).text()); 
        $('#NOME_CLIENTE').val($('#NOME_CLIENTE-'+id).text());
        $('#EMAIL').val($('#EMAIL-'+id).text());
        $('#CIDADE').val($('#CIDADE-'+id).text());
        $('#LINK_AVALIACAO').val($('#LINK-'+id).attr("href"));
        
        let idEquipe = $('#EQUIPE_ID-'+id).attr("data-idequipe").split('-')[1];
        $("#combo-equipes")[0].selectize.setValue([idEquipe]);
        
        $('.btn-salvar-Obra').attr("data-idregistro", id)

    });
});


function salvarObra(){
    
    let obj = "{";
    obj += '"ID":"'+$('.btn-salvar-Obra').attr("data-idregistro")                 +'",'; 
    obj += '"CLIENTE_ID":"'+ document.querySelector("#CLIENTE_ID").value          +'",';
    obj += '"NOME_CLIENTE":"'+ document.querySelector("#NOME_CLIENTE").value      +'",';
    obj += '"EMAIL":"'+ document.querySelector("#EMAIL").value                    +'",';
    obj += '"CIDADE":"'+ document.querySelector("#CIDADE").value                  +'",';
    obj += '"EQUIPE_ID":"'+ $("#combo-equipes").val()                             +'"';
    obj += "}";


    $.post(CURRENT_URL+"Controller/obra/salvarObraController.php", {data: obj}, function() {
    }).done(function(data) {
          
        alert(data);
        limparForumularioObra();
        atualizarTabelaObra();

    }).fail(function() {

        console.log("Salvar - Erro ao atualizar");

    }).always(function() {
    });

}


function atualizarTabelaObra(){
    document.querySelector("#conteudo-tabela-obras").innerHTML = '';

    $.post(CURRENT_URL+"Controller/obra/carregarObraController.php", function() {
    }).done(function(data) {

        let dados = JSON.parse(data);
        for (const prop in dados) {    
            criarLinhaTabelaObra(dados[prop]);
        }

    }).fail(function() {
    
        console.log( "AtualizarTabela - erro ao realizar consulta");
    
    }).always(function() {
    });

}


function criarLinhaTabelaObra(data){
    var linha = document.createElement('tr');
    
    let colunaId = document.createElement("td");
    colunaId.innerText = data.OBRAS_ID;
    linha.appendChild(colunaId);
    
    let colClienteId = document.createElement("td");
    colClienteId.innerText = data.CLIENTE_ID;
    colClienteId.setAttribute("id","CLIENTE_ID-"+data.OBRAS_ID);
    linha.appendChild(colClienteId);
    
    let colNomeCliente = document.createElement("td");
    colNomeCliente.innerText = data.NOME_CLIENTE;
    colNomeCliente.setAttribute("id","NOME_CLIENTE-"+data.OBRAS_ID);
    linha.appendChild(colNomeCliente);

    let colunaEmail = document.createElement("td");
    colunaEmail.innerText = data.EMAIL;
    colunaEmail.setAttribute("id","EMAIL-"+data.OBRAS_ID);
    linha.appendChild(colunaEmail);

    let colCidade = document.createElement("td");
    colCidade.innerText = data.CIDADE;
    colCidade.setAttribute("id","CIDADE-"+data.OBRAS_ID);
    linha.appendChild(colCidade);

    let colEquipe = document.createElement("td");
    colEquipe.innerText = data.NOME_EQUIPE;
    colEquipe.setAttribute("id","EQUIPE_ID-"+data.OBRAS_ID);
    colEquipe.setAttribute("data-idEquipe","EQUIPE_ID-"+data.EQUIPE_ID);
    linha.appendChild(colEquipe);

    let colLink = document.createElement("td");
    colLink.setAttribute("style","text-align:center;");

    let Link = document.createElement("a");
    Link.innerText = "Link"
    Link.setAttribute("style","display:block;");
    Link.setAttribute("href",CURRENT_URL+"pages/avaliarLogin.php?idObra="+data.OBRAS_ID);
    Link.setAttribute("target","_blank");
    Link.setAttribute("id","LINK-"+data.OBRAS_ID);
    colLink.appendChild(Link);
    linha.appendChild(colLink);

    let colunaBotoes = document.createElement("td");
    colunaBotoes.setAttribute("class","alinha-botoes");

    let buttonEditar = document.createElement('button');
    buttonEditar.setAttribute("class", "btn btn-primary editar-registro-obra");
    buttonEditar.setAttribute("type", "button");
    buttonEditar.setAttribute("data-idRegistroEdit", data.OBRAS_ID);
    buttonEditar.innerText = "Editar";

    let buttonExcluir = document.createElement('button');
    buttonExcluir.setAttribute("class", "btn btn-danger excluir-registro-obra");
    buttonExcluir.setAttribute("type", "button");
    buttonExcluir.setAttribute("data-idRegistroExcluir", data.OBRAS_ID);
    buttonExcluir.innerText = "Excluir";

    colunaBotoes.appendChild(buttonEditar);
    colunaBotoes.appendChild(buttonExcluir);

    linha.appendChild(colunaBotoes);
    document.querySelector("#conteudo-tabela-obras").append(linha);
    
}


function limparForumularioObra(){
    
    $("#CLIENTE_ID").val('');
    $("#NOME_CLIENTE").val('');
    $("#EMAIL").val('');
    $("#CIDADE").val('');
    $("#LINK_AVALIACAO").val('');
    $("#combo-equipes")[0].selectize.setValue([0]);
    $(".btn-salvar-Obra").attr("data-idregistro", "0");

}


function excluirRegistroObra(idRegistro){
        
    $.post(CURRENT_URL+"Controller/obra/excluirObraController.php", {data: idRegistro}, function() {
    }).done(function(data) {
          
        alert(data);
        limparForumularioObra();
        atualizarTabelaObra();

    }).fail(function() {

        console.log("Excluir - Erro ao atualizar");

    }).always(function() {
    });
}


function carregarComboEquipes(){
    document.querySelector("#combo-equipes").innerHTML = '';

    $.post(CURRENT_URL+"Controller/equipe/carregarEquipeController.php", function() {
    }).done(function(data) {
        
        let dados = JSON.parse(data);

        //Criando primeiro item do COMBO-BOX
        let itemEquipe = document.createElement("option");
        itemEquipe.value = 0;
        itemEquipe.innerText = "Selecione um item";
        itemEquipe.setAttribute("selected", "");
        document.querySelector("#combo-equipes").appendChild(itemEquipe);
        
        for (const prop in dados) {    
            criarItemComboEquipes(dados[prop]);
        }

        $("#combo-equipes").selectize({
            plugins: ["remove_button"]
        });

    }).fail(function() {
    
        console.log( "AtualizarTabela - erro ao realizar consulta");
    
    }).always(function() {
    });

}

function criarItemComboEquipes(data){
    let itemEquipe = document.createElement("option");
    itemEquipe.value = data.ID
    itemEquipe.innerText = data.NOME;
    document.querySelector("#combo-equipes").appendChild(itemEquipe);
}