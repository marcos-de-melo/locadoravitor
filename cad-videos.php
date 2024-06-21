<h2>Cadastro de Novo Vídeo</h2>
<div>
    <form action="index.php?menu=inserir-videos" method="post">
        <div>
            <label for="tituloVideo">Título</label>
            <input type="text" name="tituloVideo" id="tituloVideo" required>
        </div>
        <div>
            <label for="duracaoVideo">Duração do Vídeo</label>
            <input type="text" name="duracaoVideo" id="duracaoVideo" required>
        </div>
        <div>
            <label for="valorLocacaoVideo">Valor da Locação</label>
            <input type="text" name="valorLocacaoVideo" id="valorLocacaoVideo" required>
        </div>
        <div>
            <label for="idCategoria">Categora</label>
            <select name="idCategoria" id="idCategoria" required>
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
        <div>
            <label for="statusVideo">Status</label>
            <select name="statusVideo" id="statusVideo" required>
                <option value="1">Disponível</option>
                <option value="3">Indisponível</option>
            </select>
        </div>
        <div>
            <button type="submit">
                Salvar
            </button>
        </div>
    </form>
</div>