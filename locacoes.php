<?php
// Seleciona o id do cliente pesquisado ---------------------------------
$idCliente = (isset($_GET["idCliente"])) ? $_GET["idCliente"] : 0;
// ----------------------------------------------------------------------

//  Seleciona o id da locação selecionada--------------------------------
$idLocacao = (isset($_GET["idLocacao"])) ? $_GET["idLocacao"] : 0;
// ----------------------------------------------------------------------

// Seleciona o Video locado ---------------------------------------------
$idVideo = (isset($_GET["idVideo"])) ? $_GET["idVideo"] : 0;
// ----------------------------------------------------------------------

// Selecioana opção de locação
$menuOpLocacao = (isset($_GET["menuOpLocacao"])) ? $_GET["menuOpLocacao"] : "";
// ----------------------------------------------------------------------

// Seleciona a data atual do servidor
$dataAtual = date('Y-m-d');
// ----------------------------------------------------------------------

// Seleciona a data de entrega
if (isset($_GET["dataDeEntrega"])) {
    $dataDeEntrega = $_GET["dataDeEntrega"];
} else {
    $dataDeEntrega = date("Y-m-d", strtotime($dataAtual . '+ 5 days'));
}
// ----------------------------------------------------------------------

// Insere nova locação para o cliente selecionado e mostra o id da locação

if ($menuOpLocacao === "addLocacao") {

    $sql = "INSERT INTO tblocacao (idCliente,dataLocacao,statusLocacao) 
        VALUES ('{$idCliente}','{$dataAtual}',0)";
    mysqli_query($conexao, $sql) or die("Erro:" . mysqli_error($conexao));

    $idLocacao = mysqli_insert_id($conexao);
    header('Location:index.php?menu=locacoes&idCliente=' . $idCliente);
}
// ----------------------------------------------------------------------

// Insere novo video na locação selecionada

if ($menuOpLocacao === "addVideo") {
    // Insere o video na locação
    $sql = "INSERT INTO tbitenslocados(idLocacao, idVideo, dataDeEntrega) 
    VALUES ('{$idLocacao}','{$idVideo}','{$dataDeEntrega}')";
    mysqli_query($conexao, $sql);
    // Atualiza o status na tabela tbvideos para 2 -> Locado
    $sql = "UPDATE tbvideos SET statusVideo = 2 WHERE idVideo = '{$idVideo}'";
    mysqli_query($conexao, $sql);
}
// ----------------------------------------------------------------------

// Remove video na lista de itens locados caso o video tenha sido colocado por engano na locação
if ($menuOpLocacao === "removeVideo") {
    // Remove o video que foi colocado por engano na locação
    $sql = "DELETE FROM tbitenslocados WHERE idLocacao = '{$idLocacao}' and idVideo = '{$idVideo}'";
    mysqli_query($conexao, $sql);
    // Atualiza o status na tabela tbvideos para 1 -> Disponivel
    $sql = "UPDATE tbvideos SET statusVideo = 1 WHERE idVideo = '{$idVideo}'";
    mysqli_query($conexao, $sql);
}
// ----------------------------------------------------------------------

// Baixa video na lista de itens locados caso o video tenha sido entregue
if ($menuOpLocacao === "baixaVideo") {
    // Atualiza o status do video na lista da locação
    $sql = "UPDATE tbitenslocados SET statusItemLocado = 1 
    WHERE idLocacao = '{$idLocacao}' and idVideo = '{$idVideo}'";
    mysqli_query($conexao, $sql);
    // Atualiza o status na tabela tbvideos para 0 -> Disponivel
    $sql = "UPDATE tbvideos SET statusVideo = 0 WHERE idVideo = '{$idVideo}'";
    mysqli_query($conexao, $sql);
}
// ----------------------------------------------------------------------

// Baixa geral da Locação -----------------------------------------------

$sql = "SELECT * FROM tbitenslocados where idLocacao = {$idLocacao}";
$rs = mysqli_query($conexao, $sql);
$linha = mysqli_num_rows($rs);
if ($linha > 0) {
    $sql = "SELECT * FROM tbitenslocados 
        where idLocacao = $idLocacao and statusItemLocado = 0";
    $rs = mysqli_query($conexao, $sql);
    $linha = mysqli_num_rows($rs);
    if ($linha == 0) {
        $sql = "UPDATE tblocacao SET statusLocacao = 1 where idLocacao = {$idLocacao}";

        mysqli_query($conexao, $sql);
    }
}
//-----------------------------------------------------------------------

?>

<div class="container">
    <h3 class="bi bi-bag-plus">Locação</h3>
    <div>
        <form action="" method="get">
            <input type="hidden" name="menu" value="locacoes">
            <div class="input-group">
                <div class="input-group-text">ID do Cliente</div>
                <select class="form-select" name="idCliente" id="idCliente">
                    <?php
                    $sql = "SELECT * FROM tbclientes where statusCliente = 0";
                    $rs = mysqli_query($conexao, $sql);
                    while ($dados = mysqli_fetch_assoc($rs)) {
                        ?>
                        <option <?php echo ($idCliente == $dados["idCliente"]) ? "selected" : "" ?>
                            value="<?= $dados['idCliente'] ?>">
                            <?= $dados['idCliente'] ?> - <?= $dados['nomeCliente'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <button class="btn btn-success bi bi-search" type="submit"> Listar locações para este cliente</button>
            </div>
        </form>
    </div>

    <?php
    if ($idCliente > 0) {
        ?>
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <h3>Lista de Locações</h3>
                <div class="mb-3">
                    <a class="btn btn-success"
                        href="index.php?menu=locacoes&idCliente=<?= $idCliente ?>&menuOpLocacao=addLocacao">Nova locação</a>
                </div>

                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>id locação</th>
                            <th>Data da Locacão</th>
                            <th>Status</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql = "SELECT 
                    idLocacao, 
                    date_format(dataLocacao,'%d/%m/%Y') as dataLocacao, 
                    CASE
                    WHEN statusLocacao = 0 THEN 'Em locação'
                    WHEN statusLocacao = 1 THEN 'Finalizada'
                    END
                    AS statusLocacao,
                    cli.idCliente
                      FROM tblocacao as loc 
            inner join tbclientes as cli on loc.idCliente = cli.idCliente 
            WHERE cli.idCliente = {$idCliente} order by statusLocacao asc,dataLocacao desc, idLocacao desc";
                        $rs = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_assoc($rs)) {
                            $bgStatusLocacao = ($dados["statusLocacao"] == "Em locação") ? "bg-warning" : "bg-success";
                            ?>
                            <tr>
                                <td><?= $dados["idLocacao"] ?></td>
                                <td><?= $dados["dataLocacao"] ?></td>
                                <td><span class="badge <?= $bgStatusLocacao ?>"><?= $dados["statusLocacao"] ?></span></td>
                                <td><a class="btn btn-outline-secondary"
                                        href="index.php?menu=locacoes&idCliente=<?= $dados["idCliente"] ?>&idLocacao=<?= $dados["idLocacao"] ?>"><i
                                            class="ph-duotone ph-link"></i></a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
            if ($idLocacao > 0) {
                ?>
                <div class="col-12 col-lg-8">
                    <div class="mb-3">
                        <!-- area locação atual -->
                        <h3>Locação selecionada: <?= $idLocacao ?></h3>
                        <form action="" method="get">
                            <input type="hidden" name="menu" value="locacoes">
                            <input type="hidden" name="idLocacao" value="<?= $idLocacao ?>">
                            <input type="hidden" name="idCliente" value="<?= $idCliente ?>">
                            <input type="hidden" name="menuOpLocacao" value="addVideo">
                            <div class="input-group">
                                <div class="input-group-text">ID do Video:</div>
                                <select class="form-select" name="idVideo" id="idVideo" required>
                                    <option value="">Selecione o video</option>
                                    <?php
                                    $sql = "SELECT * FROM tbvideos  
                            where statusVideo = 1";
                                    $rs = mysqli_query($conexao, $sql);
                                    while ($dados = mysqli_fetch_assoc($rs)) {
                                        ?>
                                        <option value="<?= $dados["idVideo"] ?>"><?= $dados["idVideo"] ?> -
                                            <?= $dados["tituloVideo"] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <input class="form-control" type="date" name="dataDeEntrega" id="dataDeEntrega"
                                    value="<?= $dataDeEntrega ?>">
                                <button class="btn btn-success" type="submit"><i class="ph-duotone ph-video"></i> Add
                                    Vídeo</button>
                            </div>
                        </form>
                    </div>

                    <table class="table table-dark table-striped table-hover">

                        <thead>
                            <tr>
                                <th>id Video</th>
                                <th>Titulo Video</th>
                                <th>Data de Entrega</th>
                                <th>Status</th>
                                <th>Baixar</th>
                                <th>Remover</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT f.idVideo,f.tituloVideo,
                        date_format(dataDeEntrega,'%d/%m/%Y') as dataDeEntrega, 
                        CASE 
                            WHEN statusItemLocado = 0 THEN 'Locado'
                            WHEN statusItemLocado = 1 THEN 'Devolvido'
                            WHEN statusItemLocado = 2 THEN 'Em atraso'
                        END
                        as statusItemLocado    
                            FROM tblocacao as loc 
                                    inner join tbitenslocados as iloc
                                    inner join tbvideos as f on loc.idLocacao = iloc.idLocacao 
                                    and iloc.idVideo = f.idVideo
                                    WHERE loc.idLocacao = {$idLocacao}";

                            $rs = mysqli_query($conexao, $sql);
                            while ($dados = mysqli_fetch_assoc($rs)) {
                                $bgStatusItemLocado = ($dados["statusItemLocado"] == "Locado") ? "bg-primary" : "bg-success";
                                ?>
                                <tr>
                                    <td><?= $dados["idVideo"] ?></td>
                                    <td><?= $dados["tituloVideo"] ?></td>
                                    <td><?= $dados["dataDeEntrega"] ?></td>
                                    <td><span class="badge <?= $bgStatusItemLocado ?>"><?= $dados["statusItemLocado"] ?></span></td>

                                    <td><a class="btn btn-outline-success"
                                            href="index.php?menu=locacoes&idCliente=<?= $idCliente ?>&idLocacao=<?= $idLocacao ?>&menuOpLocacao=baixaVideo&idVideo=<?= $dados["idVideo"] ?>"><i
                                                class="ph-duotone ph-check-fat"></i></a></td>
                                    <td><a class="btn btn-outline-danger"
                                            href="index.php?menu=locacoes&idCliente=<?= $idCliente ?>&idLocacao=<?= $idLocacao ?>&menuOpLocacao=removeVideo&idVideo=<?= $dados["idVideo"] ?>"><i
                                                class="ph-duotone ph-trash"></i></a></td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div>
                        <a class="btn btn-secondary" target="_blank"
                            href="recibo-locacao.php?idCliente=<?= $idCliente ?>&idLocacao=<?= $idLocacao ?>&menuOpLocacao=imprimirLocacao">
                            Imprimir Recibo de Locação
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
    }
    ?>