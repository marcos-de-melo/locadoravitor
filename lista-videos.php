<div class="container">
    <h3 class="bi bi-film"> Lista de Videos</h3>
    <?php
    if (isset($_POST["txtPesquisa"])) {
        $txtPesquisa = $_POST["txtPesquisa"];
    } else {
        $txtPesquisa = "";
    }
    $quantidade = 10;
    $pagina = (isset($_GET["pagina"])) ? (int) $_GET["pagina"] : 1;
    $inicio = ($quantidade * $pagina) - $quantidade;

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
 order by tituloVideo asc LIMIT $inicio, $quantidade";

    $rs = mysqli_query($conexao, $sql);

    ?>
    <div class="mb-3">
        <a class="btn btn-secondary" href="index.php?menu=cad-videos">Novo Video</a>
    </div>
    <div class="mb-3">
        <form action="index.php?menu=lista-videos" method="post">
            <div class="input-group">
                <label class="input-group-text" for="txtPesquisa">Pesquisar</label>
                <input class="form-control" type="search" name="txtPesquisa" id="txtPesquisa"
                    value="<?php echo $txtPesquisa ?>">
                <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>
            </div>

        </form>
    </div>
    <table class="table table-dark table-striped">
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
                $corStatusVideo = "";
                if ($dados["statusVideo"] === "Disponível") {
                    $corStatusVideo = "text-bg-success";
                } elseif ($dados["statusVideo"] === "Locado") {
                    $corStatusVideo = "text-bg-warning";
                } else {
                    $corStatusVideo = "text-bg-danger";
                }
                ?>
                <tr>
                    <td> <?= $dados["idVideo"] ?> </td>
                    <td> <?= $dados["tituloVideo"] ?> </td>
                    <td> <?= $dados["duracaoVideo"] ?> </td>
                    <td> R$ <?= $dados["valorLocacaoVideo"] ?> </td>
                    <td> <?= $dados["nomeCategoria"] ?> </td>
                    <td><span class="badge <?= $corStatusVideo ?> w-100"> <?= $dados["statusVideo"] ?> </span></td>
                    <td>
                        <a class="btn btn-outline-warning"
                            href="index.php?menu=editar-videos&idVideo=<?= $dados["idVideo"] ?>">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-outline-danger"
                            href="index.php?menu=excluir-videos&idVideo=<?= $dados["idVideo"] ?>">
                            <i class="bi bi-trash3-fill"></i>
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
    <nav>
        <ul class="pagination justify-content-center">
            <?php

            $sql = "SELECT COUNT(idVideo) AS total FROM tbvideos";

            $result = mysqli_query($conexao, $sql);

            $dados = mysqli_fetch_assoc($result);
            $totalRegistros = $dados["total"];
            $quantidadePaginas = ceil($totalRegistros / $quantidade);
            echo "<li class='page-item'><span class='text-muted page-link'>Total de registros: $totalRegistros </span> </li>";
            echo "<li class='page-item'><a class='page-link' href='index.php?menu=lista-videos&pagina=1'> Primeira </a>";
            for ($i = 1; $i <= $quantidadePaginas; $i++) {
                if ($i == $pagina) {
                    echo "<li class='page-item active'><a class='page-link' href='index.php?menu=lista-videos&pagina=$i'> $i </a>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='index.php?menu=lista-videos&pagina=$i'> $i </a>";
                }
            }
            echo "<li class='page-item'><a class='page-link' href='index.php?menu=lista-videos&pagina=$quantidadePaginas'> Ultima </a>";

            ?>
        </ul>
    </nav>
</div>