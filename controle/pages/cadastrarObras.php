<form class="form-cadastro-obras">
        <h1>Cadastro de Obras </h1>
        <br />
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputVeiculo">Código cliente</label>
                <input type="text" class="form-control" id="CLIENTE_ID" placeholder="Código do cliente" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputMarca">Nome Cliente</label>
                <input type="text" class="form-control" id="NOME_CLIENTE" placeholder="Nome completo do cliente" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputAno">E-mail</label>
                <input type="email" class="form-control" id="EMAIL" placeholder="e-mail válido" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputAno">Cidade</label>
                <input type="text" class="form-control" id="CIDADE" placeholder="Cidade" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputAno">Link avaliação</label>
                <input type="text" class="form-control" id="LINK_AVALIACAO" placeholder="https://...." disabled  />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="inputAno">Equipes</label>
                <select id="combo-equipes"></select>
            </div>
        </div>
        
        <div class="form-row">
            <button type="button" class="btn btn-success btn-salvar-Obra" data-idregistro="0">Salvar</button>
        </div>
        
    </form>

    <br />
    <br />
    <br />
    <br />

    <table class="table table-Obras">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Cód Cliente</th>
                <th scope="col">Nome cliente</th>
                <th scope="col">E-mail</th>
                <th scope="col">Cidade</th>
                <th scope="col">Equipe</th>
                <th scope="col" style="text-align:center;">Avaliação</th>
                <th scope="col" class="alinha-botoes">Açoes</th>
            </tr>
        </thead>

        <tbody id="conteudo-tabela-obras">
            
        </tbody>
        
    </table>