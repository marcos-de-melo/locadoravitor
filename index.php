<?php
// Conexão com o servidor de bamco de dados
include("./db/conexao.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOCADORA VITOR</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/estilo.css">
</head>

<body style="background-color: #8d99ae;">
    <header class="container-fluid bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a href="index.php" class="navbar-brand bi bi-camera-reels-fill">
                    LOCADORA VITOR
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-center">
                        <li class="nav-item"> <a class="nav-link bi bi-house" href="index.php?menu=home"> Home</a> </li>
                        <li class="nav-item"> <a class="nav-link bi bi-film" href="index.php?menu=lista-videos">
                                Vídeos</a> </li>
                        <li class="nav-item"> <a class="nav-link bi bi-bookmark-plus"
                                href="index.php?menu=lista-categorias"> Categorias</a> </li>
                        <li class="nav-item"> <a class="nav-link bi bi-people" href="index.php?menu=lista-clientes">
                                Clientes</a> </li>
                        <li class="nav-item"> <a class="nav-link bi bi-bag-plus" href="index.php?menu=locacoes">
                                Locações</a> </li>
                    </ul>
                </div>

            </nav>
        </div>
    </header>
    <main>
        <?php
        if (isset($_GET["menu"])) {
            $menu = $_GET["menu"];
        } else {
            $menu = "";
        }
        switch ($menu) {
            case "home":
                include("home.php");
                break;
            case "lista-videos":
                include("lista-videos.php");
                break;
            case "cad-videos":
                include("cad-videos.php");
                break;
            case "inserir-videos":
                include("inserir-videos.php");
                break;
            case "editar-videos":
                include("editar-videos.php");
                break;
            case "atualizar-videos":
                include("atualizar-videos.php");
                break;
            case "excluir-videos":
                include("excluir-videos.php");
                break;
            case "lista-categorias":
                include("lista-categorias.php");
                break;
            case "cad-categorias":
                include("cad-categorias.php");
                break;
            case "inserir-categorias":
                include("inserir-categorias.php");
                break;
            case "excluir-categorias":
                include("excluir-categorias.php");
                break;
            case "editar-categorias":
                include("editar-categorias.php");
                break;
            case "atualizar-categorias":
                include("atualizar-categorias.php");
                break;
            case "lista-clientes":
                include("lista-clientes.php");
                break;
            case "cad-clientes":
                include("cad-clientes.php");
                break;
            case "inserir-clientes":
                include("inserir-clientes.php");
                break;
            case "editar-clientes":
                include("editar-clientes.php");
                break;
            case "atualizar-clientes":
                include("atualizar-clientes.php");
                break;
            case "excluir-clientes":
                include("excluir-clientes.php");
                break;
            case "locacoes":
                include("locacoes.php");
                break;
            default:
                include("home.php");
        }
        ?>
    </main>
    <script src="./js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>