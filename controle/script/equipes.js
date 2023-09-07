$(document).ready( function(){

    
    $(document).on('click','.excluir-registro-equipe',function(){
        let id = $(this).attr("data-idRegistroExcluir");
        excluirRegistroEquipe(id);
    });

    $(document).on('click','.editar-registro-equipe',function(){

        limparForumularioEquipe();

        let id = $(this).attr("data-idRegistroEdit");
        document.querySelector('#NOME').value = document.querySelector('#NOME-'+id).textContent; 
        document.querySelector('#INTEGRANTES').value = document.querySelector('#INTEGRANTES-'+id).textContent;
        document.querySelector('#ENDERECO').value = document.querySelector('#ENDERECO-'+id).textContent;
        document.querySelector('#EMAIL').value = document.querySelector('#EMAIL-'+id).textContent;
        document.querySelector('#TELEFONE').value = document.querySelector('#TELEFONE-'+id).textContent;

        document.querySelector('.btn-salvar-equipe').setAttribute("data-idregistro", id)

    });
});


function salvarEquipe(){
    
    let obj = "{";
    obj += '"ID":"'+$('.btn-salvar-equipe').attr("data-idregistro")          +'",'; 
    obj += '"NOME":"'+ document.querySelector("#NOME").value                 +'",';
    obj += '"INTEGRANTES":"'+ document.querySelector("#INTEGRANTES").value   +'",';
    obj += '"ENDERECO":"'+ document.querySelector("#ENDERECO").value         +'",';
    obj += '"EMAIL":"'+ document.querySelector("#EMAIL").value               +'",';
    obj += '"TELEFONE":"'+ document.querySelector("#TELEFONE").value         +'"';
    obj += "}";

    $.post(CURRENT_URL+"Controller/equipe/salvarEquipeController.php", {data: obj}, function() {
    }).done(function(data) {
          
        alert(data);
        limparForumularioEquipe();
        atualizarTabelaEquipes();

    }).fail(function() {

        console.log("Salvar - Erro ao atualizar");

    }).always(function() {
    });

}


function atualizarTabelaEquipes(){
    document.querySelector("#conteudo-tabela-equipes").innerHTML = '';

    $.post(CURRENT_URL+"Controller/equipe/carregarEquipeController.php", function() {
    }).done(function(data) {
        
        let dados = JSON.parse(data);
        for (const prop in dados) {    
            criarLinhaTabelaEquipe(dados[prop]);
        }

    }).fail(function() {
    
        console.log( "AtualizarTabela - erro ao realizar consulta");
    
    }).always(function() {
    });

}


function criarLinhaTabelaEquipe(data){
    var linha = document.createElement('tr');
    
    let colunaId = document.createElement("td");
    colunaId.innerText = data.ID;
    linha.appendChild(colunaId);
    
    let colNome = document.createElement("td");
    colNome.innerText = data.NOME;
    colNome.setAttribute("id","NOME-"+data.ID);
    linha.appendChild(colNome);
    
    let colunaIntegrantes = document.createElement("td");
    colunaIntegrantes.innerText = data.INTEGRANTES;
    colunaIntegrantes.setAttribute("id","INTEGRANTES-"+data.ID);
    linha.appendChild(colunaIntegrantes);

    let colunaEndereco = document.createElement("td");
    colunaEndereco.innerText = data.ENDERECO;
    colunaEndereco.setAttribute("id","ENDERECO-"+data.ID);
    linha.appendChild(colunaEndereco);

    let colunaEmail = document.createElement("td");
    colunaEmail.innerText = data.EMAIL;
    colunaEmail.setAttribute("id","EMAIL-"+data.ID);
    linha.appendChild(colunaEmail);

    let colunaTelefone = document.createElement("td");
    colunaTelefone.innerText = data.TELEFONE;
    colunaTelefone.setAttribute("id","TELEFONE-"+data.ID);
    linha.appendChild(colunaTelefone);

    let colunaBotoes = document.createElement("td");
    colunaBotoes.setAttribute("class", "alinha-botoes");
    
    let buttonEditar = document.createElement('button');
    buttonEditar.setAttribute("class", "btn btn-primary editar-registro-equipe");
    buttonEditar.setAttribute("type", "button");
    buttonEditar.setAttribute("data-idRegistroEdit", data.ID);
    buttonEditar.innerText = "Editar";

    let buttonExcluir = document.createElement('button');
    buttonExcluir.setAttribute("class", "btn btn-danger excluir-registro-equipe");
    buttonExcluir.setAttribute("type", "button");
    buttonExcluir.setAttribute("data-idRegistroExcluir", data.ID);
    buttonExcluir.innerText = "Excluir";

    colunaBotoes.appendChild(buttonEditar);
    colunaBotoes.appendChild(buttonExcluir);

    linha.appendChild(colunaBotoes);
    document.querySelector("#conteudo-tabela-equipes").append(linha);
    
}


function limparForumularioEquipe(){
    document.querySelector("#NOME").value = '';
    document.querySelector("#INTEGRANTES").value = '';
    document.querySelector("#ENDERECO").value = '';
    document.querySelector("#EMAIL").value = '';
    document.querySelector("#TELEFONE").value = '';

    document.querySelector(".btn-salvar-equipe").setAttribute("data-idregistro", "0");
}


function excluirRegistroEquipe(idRegistro){
        
    $.post(CURRENT_URL+"Controller/equipe/ExcluirEquipeController.php", {data: idRegistro}, function() {
    }).done(function(data) {
          
        alert(data);
        limparForumularioEquipe();
        atualizarTabelaEquipes();

    }).fail(function() {

        console.log("Excluir - Erro ao atualizar");

    }).always(function() {
    });
}
