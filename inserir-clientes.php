<h2>Inserir Clientes</h2>
<?php

$nomeCliente = $_POST["nomeCliente"];
$emailCliente = $_POST["emailCliente"];
$telefoneCliente = $_POST["telefoneCliente"];
$enderecoCliente = $_POST["enderecoCliente"];
$bairroCliente = $_POST["bairroCliente"];
$cidadeCliente = $_POST["cidadeCliente"];
$estadoCliente = $_POST["estadoCliente"];
$cepCliente = $_POST["cepCliente"];
$dataNascCliente = $_POST["dataNascCliente"];


$sql = "INSERT INTO tbclientes 
(
nomeCliente,
emailCliente,
telefoneCliente,
enderecoCliente,
bairroCliente,
cidadeCliente,
estadoCliente,
cepCliente,
dataNascCliente
) values 
(
'{$nomeCliente}',
'{$emailCliente}',
'{$telefoneCliente}',
'{$enderecoCliente}',
'{$bairroCliente}',
'{$cidadeCliente}',
'{$estadoCliente}',
'{$cepCliente}',
'{$dataNascCliente}'
)";

$rs = mysqli_query($conexao, $sql);
if ($rs) {
    echo "<p>Registro inserido com sucesso!</p>";
} else {
    echo "<p>Erro ao inserir o registro</p>";
}
?>