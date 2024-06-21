<h2>Lista de Videos</h2>
<?php
if (isset($_POST["txtPesquisa"])) {
    $txtPesquisa = $_POST["txtPesquisa"];
} else {
    $txtPesquisa = "";
}



$sql = "SELECT 
idVideo,tituloVideo,duracaoVideo, valorLocacaoVideo,
nomeCategoria, 
CASE
    WHEN statusVideo = 1 THEN 'Disponível'
    WHEN statusVideo = 2 THEN 'Locado'
    WHEN statusVideo = 3 THEN 'Indisponivel'
END
AS statusVideo
 FROM tbvideos AS v left join tbcategorias AS c 
 ON v.idCategoria = c.idCategoria 
 WHERE tituloVideo LIKE '%{$txtPesquisa}%' 
 order by tituloVideo asc";
$rs = mysqli_query($conexao, $sql);

?>
<div>
    <a href="index.php?menu=cad-videos">Novo Video</a>
</div>
<div>
    <form action="index.php?menu=lista-videos" method="post">
        <label for="txtPesquisa">Pesquisar</label>
        <input type="search" name="txtPesquisa" id="txtPesquisa" value="<?php echo $txtPesquisa ?>">
        <button type="submit">OK</button>
    </form>
</div>
<table border="1">
    <thead>
        <tr>
            <th>Id </th>
            <th> Título </th>
            <th> Duração do Vídeo </th>
            <th> Valor da Locação </th>
            <th> Categoria </th>
            <th> Status </th>
            <th> Editar </th>
            <th> Excluir </th>
        </tr>
    </thead>

    <tbody>
        <?php
        while ($dados = mysqli_fetch_assoc($rs)) {

        ?>
            <tr>
                <td> <?= $dados["idVideo"] ?> </td>
                <td> <?= $dados["tituloVideo"] ?> </td>
                <td> <?= $dados["duracaoVideo"] ?> </td>
                <td> R$ <?= $dados["valorLocacaoVideo"] ?> </td>
                <td> <?= $dados["nomeCategoria"] ?> </td>
                <td> <?= $dados["statusVideo"] ?> </td>
                <td>
                    <a href="index.php?menu=editar-videos&idVideo=<?= $dados["idVideo"] ?>">Editar</a>
                </td>
                <td>
                    <a href="index.php?menu=excluir-videos&idVideo=<?= $dados["idVideo"] ?>">Excluir</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>

    <tfoot>
        <tr>
            <th>Id </th>
            <th> Título </th>
            <th> Duração do Vídeo </th>
            <th> Valor da Locação </th>
            <th> Categoria </th>
            <th> Status </th>
            <th> Editar </th>
            <th> Excluir </th>
        </tr>
    </tfoot>
</table>