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
<div>
    <a href="index.php?menu=cad-clientes">Novo Cliente</a>
</div>
<div>
    <form action="index.php?menu=lista-clientes" method="post">
        <label for="txtPesquisa">Pesquisar</label>
        <input type="search" name="txtPesquisa" id="txtPesquisa" value="<?php echo $txtPesquisa ?>">
        <button type="submit">OK</button>
    </form>
</div>
<table border="1">
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
                    <a href="index.php?menu=editar-clientes&idCliente=<?= $dados["idCliente"] ?>">Editar</a>
                </td>
                <td>
                    <a href="index.php?menu=excluir-clientes&idCliente=<?= $dados["idCliente"] ?>">Excluir</a>
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
             <th> Editar </th>
            <th> Excluir </th>
        </tr>
    </tfoot>
</table>