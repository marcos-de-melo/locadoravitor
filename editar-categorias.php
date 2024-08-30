<?php
$idCategoria = $_GET["idCategoria"];
$sql = "select * from tbcategorias where idCategoria = {$idCategoria}";

$rs = mysqli_query($conexao, $sql);

$dados = mysqli_fetch_assoc($rs)


?>
<h2>Edição de Categorias</h2>
<div>
    <form action="index.php?menu=atualizar-categorias" method="post">
        <div>
            <label for="idCategoria">id</label>
            <input type="text" name="idCategoria" id="idCategoria" value="<?=$dados["idCategoria"]?>" readonly>
        </div>
        <div>
            <label for="nomeCategoria">Nome da Categoria</label>
            <input type="text" name="nomeCategoria" id="nomeCategoria" value="<?=$dados["nomeCategoria"]?>" required>
        </div>

        <div>
            <button type="submit">
                Salvar
            </button>
        </div>
    </form>
</div>