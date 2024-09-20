<?php
$idCategoria = $_GET["idCategoria"];
$sql = "select * from tbcategorias where idCategoria = {$idCategoria}";

$rs = mysqli_query($conexao, $sql);

$dados = mysqli_fetch_assoc($rs)


?>
<div class="container">
<h3 class="mt-2 bi bi-bookmark-plus">Edição de Categorias</h3>
<div class="mt-3">
    <form action="index.php?menu=atualizar-categorias" method="post">
        <div class="mb-3">
            <label class="form-label" for="idCategoria">id</label>
            <input class="form-control" type="text" name="idCategoria" id="idCategoria" value="<?=$dados["idCategoria"]?>" readonly>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomeCategoria">Nome da Categoria</label>
            <input class="form-control" type="text" name="nomeCategoria" id="nomeCategoria" value="<?=$dados["nomeCategoria"]?>" required>
        </div>

        <div>
            <button class="btn btn-success bi bi-floppy-fill" type="submit">
                Salvar
            </button>
        </div>
    </form>
</div>

</div>