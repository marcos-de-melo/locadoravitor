<div class="container">
    <h3 class="mt-2 bi bi-person-circle">Lista de Clientes</h3>
<h2>Lista de Clientes</h2>

<?php
if (isset($_POST["txtPesquisa"])) {
    $txtPesquisa = $_POST["txtPesquisa"];
} else {
    $txtPesquisa = "";
}



$sql = "SELECT *, date_format( dataNascCliente,'%d/%m/%Y') as dataNascClienteBr  FROM tbclientes
WHERE nomeCliente LIKE '%{$txtPesquisa}%' 
 order by nomeCliente asc";
$rs = mysqli_query($conexao, $sql);

?>
<div class="mb-3">
    <a class="btn btn-secondary" href="index.php?menu=cad-clientes">Novo Cliente</a>
</div>
    <div class="mb-3">
        <form action="index.php?menu=lista-clientes" method="post">
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
            <th> Cliente </th>
            <th> E-mail </th>
            <th> Telefone </th>
            <th> Data de Nasc. </th>
             <th> Editar </th>
            <th> Excluir </th>
        </tr>
    </thead>

    <tbody>
        <?php
        while ($dados = mysqli_fetch_assoc($rs)) {
            
        ?>
            <tr>
                <td> <?= $dados["idCliente"] ?> </td>
                <td> <?= $dados["nomeCliente"] ?> </td>
                <td> <?= $dados["emailCliente"] ?> </td>
                <td> <?= $dados["telefoneCliente"] ?> </td>
               
                <td> <?= $dados["dataNascClienteBr"]  ?> </td>
               
                <td>
                    <a class="btn btn-warning" href="index.php?menu=editar-clientes&idCliente=<?= $dados["idCliente"] ?>">
                    <i class="bi bi-pencil-square"></i>
                </a>
                </td>
                <td>
                    <a class="btn btn-danger" href="index.php?menu=excluir-clientes&idCliente=<?= $dados["idCliente"] ?>">
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
            <th> Cliente </th>
            <th> E-mail </th>
            <th> Telefone </th>
            <th> Data de Nasc. </th>
            <th> Editar </th>
            <th> Excluir </th>
        </tr>
    </tfoot>
</table>
</div>