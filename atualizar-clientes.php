<h2>Atualizar Cliente</h2>

<?php
$idCliente = $_POST["idCliente"];
$nomeCliente = $_POST["nomeCliente"];
$emailCliente = $_POST["emailCliente"];
$telefoneCliente = $_POST["telefoneCliente"];
$enderecoCliente = $_POST["enderecoCliente"];
$bairroCliente = $_POST["bairroCliente"];
$cidadeCliente = $_POST["cidadeCliente"];
$estadoCliente = $_POST["estadoCliente"];
$cepCliente = $_POST["cepCliente"];
$dataNascCliente = $_POST["dataNascCliente"];


$sql = "UPDATE tbclientes SET
nomeCliente = '{$nomeCliente}',
emailCliente = '{$emailCliente}',
telefoneCliente = '{$telefoneCliente}',
enderecoCliente = '{$enderecoCliente}',
bairroCliente = '{$bairroCliente}',
cidadeCliente = '{$cidadeCliente}',
estadoCliente = '{$estadoCliente}',
cepCliente = '{$cepCliente}',
dataNascCliente = '{$dataNascCliente}'
WHERE idCliente = '{$idCliente}';
";

$rs = mysqli_query($conexao,$sql);

if($rs){
    echo "<p>Registro atualizado com sucesso!</p>";
}else{
    echo "<p>Erro ao atualizar o registro.</p>";
}


?>