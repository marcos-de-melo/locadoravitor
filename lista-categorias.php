<h2>Lista de Categorias</h2>
<?php
if (isset($_POST["txtPesquisa"])) {
    $txtPesquisa = $_POST["txtPesquisa"];
} else {
    $txtPesquisa = "";
}



$sql = "SELECT * FROM tbcategorias
WHERE nomeCategoria LIKE '%{$txtPesquisa}%' 
 order by nomeCategoria asc";
$rs = mysqli_query($conexao, $sql);

?>
<div>
    <a href="index.php?menu=cad-categorias">Nova Categoria</a>
</div>
<div>
    <form action="index.php?menu=lista-categorias" method="post">
        <label for="txtPesquisa">Pesquisar</label>
        <input type="search" name="txtPesquisa" id="txtPesquisa" value="<?php echo $txtPesquisa ?>">
        <button type="submit">OK</button>
    </form>
</div>
<table border="1">
    <thead>
        <tr>
            <th>Id </th>
            <th> Categoria </th>
             <th> Editar </th>
            <th> Excluir </th>
        </tr>
    </thead>

    <tbody>
        <?php
        while ($dados = mysqli_fetch_assoc($rs)) {

        ?>
            <tr>
                <td> <?= $dados["idCategoria"] ?> </td>
                <td> <?= $dados["nomeCategoria"] ?> </td>
               
                <td>
                    <a href="index.php?menu=editar-categorias&idCategoria=<?= $dados["idCategoria"] ?>">Editar</a>
                </td>
                <td>
                    <a href="index.php?menu=excluir-categorias&idCategoria=<?= $dados["idCategoria"] ?>">Excluir</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

    <tfoot>
    <tr>
            <th>Id </th>
            <th> Categoria </th>
             <th> Editar </th>
            <th> Excluir </th>
        </tr>
    </tfoot>
</table>