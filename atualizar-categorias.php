<h2>Atualização de Video</h2>
<?php
$idCategoria = $_POST["idCategoria"];
$nomeCategoria = $_POST["nomeCategoria"];


$sql = "UPDATE tbcategorias SET 
nomeCategoria = '{$nomeCategoria}' 
WHERE idCategoria = {$idCategoria}
";

$rs = mysqli_query($conexao,$sql);

if($rs){
    echo "<p>Registro atualizado com sucesso!</p>";
}else{
    echo "<p>Erro ao atualizar o registro.</p>";
}


?>