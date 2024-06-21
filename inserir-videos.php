<h2>Inserir Vídeo</h2>
<?php

$tituloVideo = $_POST["tituloVideo"];
$duracaoVideo = $_POST["duracaoVideo"];
$valorLocacaoVideo = $_POST["valorLocacaoVideo"];
$idCategoria = $_POST["idCategoria"];
$statusVideo = $_POST["statusVideo"];

$sql = "INSERT INTO tbvideos 
(
tituloVideo,
duracaoVideo,
valorLocacaoVideo,
idCategoria,
statusVideo
) values 
(
'{$tituloVideo}',
'{$duracaoVideo}',
'{$valorLocacaoVideo}',
'{$idCategoria}',
'{$statusVideo}'
)";

$rs = mysqli_query($conexao,$sql);
if($rs){
    echo "<p>Registro inserido com sucesso!</p>";
}else{
    echo "<p>Erro ao inserir o registro</p>";
}
?>