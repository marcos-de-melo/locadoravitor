<div class="container">
    <h2>Cadastro de Novo Vídeo</h2>
    <div>
        <form action="index.php?menu=inserir-videos" method="post">
            <div class="mb-3 col-12 col-sm-6">
                <label class="form-label" for="tituloVideo">Título</label>
                <input class="form-control" type="text" name="tituloVideo" id="tituloVideo" required>
            </div>
            <div class="mb-3 col-6 col-sm-3">
                <label class="form-label" for="duracaoVideo">Duração do Vídeo</label>
                <input class="form-control" type="text" name="duracaoVideo" id="duracaoVideo" required>
            </div>
            <div class="mb-3 col-6 col-sm-3">
                <label class="form-label" for="valorLocacaoVideo">Valor da Locação</label>
                <input class="form-control" type="text" name="valorLocacaoVideo" id="valorLocacaoVideo" required>
            </div>
            <div class="mb-3 col-12 col-sm-6">
                <label class="form-label" for="idCategoria">Categora</label>
                <select class="form-select" name="idCategoria" id="idCategoria" required>
                    <option value="">Selecione uma categoria</option>
                    <?php
                    $sqlC = "SELECT * FROM tbcategorias ORDER BY nomeCategoria ASC";
                    $rs = mysqli_query($conexao, $sqlC);
                    while ($dadosC = mysqli_fetch_assoc($rs)) {
                        echo "<option value='$dadosC[idCategoria]'>$dadosC[nomeCategoria]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 col-6 col-sm-3">
                <label class="form-label" for="statusVideo">Status</label>
                <select class="form-select name=" statusVideo" id="statusVideo" required>
                    <option value="1">Disponível</option>
                    <option value="3">Indisponível</option>
                </select>
            </div>
            <div>
                <button class="btn btn-secondary" type="submit">
                    Salvar
                </button>
            </div>
        </form>
    </div>

</div>