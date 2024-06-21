<h2>Inserir Categorias</h2>
<?php

$nomeCategoria = $_POST["nomeCategoria"];


$sql = "INSERT INTO tbcategorias 
(
nomeCategoria
) values 
(
'{$nomeCategoria}'
)";

$rs = mysqli_query($conexao, $sql);
if ($rs) {
    echo "<p>Registro inserido com sucesso!</p>";
} else {
    echo "<p>Erro ao inserir o registro</p>";
}
?>