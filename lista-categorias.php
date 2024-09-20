<div class="container">
    <h3 class="mt-2 bi bi-bookmark-plus"> Lista de Categorias</h3>
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
    <div class="mb-3">
        <a class="btn btn-secondary" href="index.php?menu=cad-categorias">Nova Categoria</a>
    </div>
    <div class="mb-3">
        <form action="index.php?menu=lista-categorias" method="post">
            <div class="input-group">
                <label class="input-group-text" for="txtPesquisa">Pesquisar</label>
                <input class="form-control" type="search" name="txtPesquisa" id="txtPesquisa"
                    value="<?php echo $txtPesquisa ?>">
                <button class="btn btn-secondary" type="submit">OK</button>
            </div>
        </form>
    </div>
    <table class="table table-dark table-striped table-hover">
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
                        <a class="btn btn-warning" href="index.php?menu=editar-categorias&idCategoria=<?= $dados["idCategoria"] ?>">
                           <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="index.php?menu=excluir-categorias&idCategoria=<?= $dados["idCategoria"] ?>">
                            <i class="bi bi-trash"></i>
                        </a>
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
</div>