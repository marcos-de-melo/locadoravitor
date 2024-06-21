<h2>Excluir Video</h2>
<?php
$idVideo = $_GET["idVideo"];

$sql = "DELETE FROM tbvideos WHERE idVideo = {$idVideo}";
$rs = mysqli_query($conexao, $sql);

if($rs){
    echo "<p>Registro excluido com sucesso!</p>";
}else{
    echo "<p>Erro ao excluir o registro.</p>";
}

?>