<h2>Atualização de Video</h2>
<?php
$idVideo = $_POST["idVideo"];
$tituloVideo = $_POST["tituloVideo"];
$duracaoVideo = $_POST["duracaoVideo"];
$valorLocacaoVideo = $_POST["valorLocacaoVideo"];
$idCategoria = $_POST["idCategoria"];
$statusVideo = $_POST["statusVideo"];

$sql = "UPDATE tbvideos SET 
tituloVideo = '{$tituloVideo}',
duracaoVideo = '{$duracaoVideo}',
valorLocacaoVideo = '{$valorLocacaoVideo}',
idCategoria = '{$idCategoria}',
statusVideo = '{$statusVideo}'
WHERE idVideo = {$idVideo}
";

$rs = mysqli_query($conexao,$sql);

if($rs){
    echo "<p>Registro atualizado com sucesso!</p>";
}else{
    echo "<p>Erro ao atualizar o registro.</p>";
}


?>