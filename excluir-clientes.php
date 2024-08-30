<h2>Excluir Cliente</h2>
<?php
$idCliente = $_GET["idCliente"];

$sql = "DELETE FROM tbclientes WHERE idCliente = {$idCliente}";
$rs = mysqli_query($conexao, $sql);

if($rs){
    echo "<p>Registro excluido com sucesso!</p>";
}else{
    echo "<p>Erro ao excluir o registro.</p>";
}

?>