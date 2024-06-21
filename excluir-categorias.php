<h2>Excluir Categoria</h2>
<?php
$idCategoria = $_GET["idCategoria"];

$sql = "DELETE FROM tbCategorias WHERE idCategoria = {$idCategoria}";
$rs = mysqli_query($conexao, $sql);

if($rs){
    echo "<p>Registro excluido com sucesso!</p>";
}else{
    echo "<p>Erro ao excluir o registro.</p>";
}

?>