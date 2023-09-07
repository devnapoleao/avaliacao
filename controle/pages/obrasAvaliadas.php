<form class="form-cadastro-obras">
        <h1>Consultar avaliação obras </h1>
        <br />
        
        <div class="form-row">
            <div class="filtro-avaliacoes">

                <div class="col-10">
                    <label for="inputAno">Selecione uma equipe</label>
                    <select id="combo-equipes-avaliadas"></select>
                </div>

                <div class="col-2 div-btn-buscar">
                    <button type="button" class="btn btn-success btn-buscar">Buscar</button>
                </div>

            </div>
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
                <th scope="col">Equipe</th>
                <th scope="col">Nota 1</th>
                <th scope="col">Nota 2</th>
                <th scope="col">Nota 3</th>
                <th scope="col-4">Comentário</th>
            </tr>
        </thead>

        <tbody id="conteudo-tabela-obrasAvaliadas">
            
        </tbody>
        
    </table>