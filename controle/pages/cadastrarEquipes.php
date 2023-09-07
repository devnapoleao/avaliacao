    <form class="form-cadastro-equipes">
        <h1>Cadastro de Equipes </h1>
        <br />

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputVeiculo">Nome equipe</label>
                <input type="text" class="form-control" id="NOME" placeholder="Nome equipe" require />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputVeiculo">Integrantes</label>
                <input type="text" class="form-control" id="INTEGRANTES" placeholder="Integrantes da equipes, separar por (;)" require />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputMarca">Endereço</label>
                <input type="text" class="form-control" id="ENDERECO" placeholder="Endereço" require />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputAno">E-mail</label>
                <input type="email" class="form-control" id="EMAIL" placeholder="e-mail válido"  require/>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputAno">Telefone</label>
                <input type="text" class="form-control" id="TELEFONE" placeholder="(XX)XXXXX-XXXX" require />
            </div>
        </div>

        
        <div class="form-row">
            <button type="button" class="btn btn-success btn-salvar-equipe" data-idregistro="0">Salvar</button>
        </div>
        
    </form>

    <br />
    <br />
    <br />
    <br />

    <table class="table table-equipes">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Integrantes</th>
                <th scope="col">Endereço</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col" class="alinha-botoes">Ações</th>
            </tr>
        </thead>

        <tbody id="conteudo-tabela-equipes">
            
        </tbody>
        
    </table>