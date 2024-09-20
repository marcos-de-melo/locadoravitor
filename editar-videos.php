<?php
$idVideo = $_GET["idVideo"];
$sqlV = "SELECT * FROM tbvideos WHERE idVideo = {$idVideo}";
$rs = mysqli_query($conexao, $sqlV);
$dadosV = mysqli_fetch_assoc($rs);

?>
<div class="container">

    <h2>Edição de Vídeo</h2>
    <div>
        <form action="index.php?menu=atualizar-videos" method="post">
            <div class="mb-3">
                <label class="form-label" for="idVideo">ID</label>
                <input class="form-control" type="text" name="idVideo" id="idVideo" value="<?= $dadosV["idVideo"] ?>"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="tituloVideo">Título</label>
                <input class="form-control" type="text" name="tituloVideo" id="tituloVideo"
                    value="<?= $dadosV["tituloVideo"] ?>" required>
            </div>
            <div class="mb-3 col-6 col-sm-3">
                <label class="form-label" for="duracaoVideo">Duração do Vídeo</label>
                <input class="form-control" type="text" name="duracaoVideo" id="duracaoVideo"
                    value="<?= $dadosV["duracaoVideo"] ?>" required>
            </div>
            <div class="mb-3 col-6 col-sm-3">
                <label class="form-label" for="valorLocacaoVideo">Valor da Locação</label>
                <input class="form-control" type="text" name="valorLocacaoVideo" id="valorLocacaoVideo"
                    value="<?= $dadosV["valorLocacaoVideo"] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="idCategoria">Categora</label>
                <select class="form-select" name="idCategoria" id="idCategoria" required>
                    <option value="">Selecione uma categoria</option>
                    <?php
                    $sqlC = "SELECT * FROM tbcategorias ORDER BY nomeCategoria ASC";
                    $rs = mysqli_query($conexao, $sqlC);

                    while ($dadosC = mysqli_fetch_assoc($rs)) {
                        $selecao = ($dadosV["idCategoria"] == $dadosC["idCategoria"]) ? "selected" : "";
                        echo "<option {$selecao} value='$dadosC[idCategoria]'>$dadosC[nomeCategoria]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3 col-6 col-sm-3">
                <label class="form-label" for="statusVideo">Status</label>
                <select class="form-select" name="statusVideo" id="statusVideo" required>
                    <option value="">Selecione um status</option>
                    <option <?= ($dadosV["statusVideo"] == 1) ? "selected" : "" ?> value="1">Disponível</option>
                    <option <?= ($dadosV["statusVideo"] == 2) ? "selected" : "" ?> value="2">Locado</option>
                    <option <?= ($dadosV["statusVideo"] == 3) ? "selected" : "" ?> value="3">Indisponível</option>
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