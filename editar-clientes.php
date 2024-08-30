<?php
$idCliente = $_GET["idCliente"];
$sql = "select * from tbclientes where idCliente = {$idCliente}";
$rs = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($rs);
?>
<h2>Editar Clientes</h2>

<div>
    <form action="index.php?menu=atualizar-clientes" method="post">
        <div>
            <label for="idCliente">ID</label>
            <input type="text" name="idCliente" id="idCliente" value="<?=$dados["idCliente"]?>" readonly>
        </div>
        <div>
            <label for="nomeCliente">Nome do Cliente</label>
            <input type="text" name="nomeCliente" id="nomeCliente" value="<?=$dados["nomeCliente"]?>" required>
        </div>
        <div>
            <label for="emailCliente">Email</label>
            <input type="email" name="emailCliente" id="emailCliente" value="<?=$dados["emailCliente"]?>" required>
        </div>
        <div>
            <label for="telefoneCliente">Telefone</label>
             <input type="text" name="telefoneCliente" id="telefoneCliente" value="<?=$dados["telefoneCliente"]?>" required>
        </div>
        <div>
            <label for="enderecoCliente">Endereco</label>
            <input type="text" name="enderecoCliente" id="enderecoCliente" value="<?=$dados["enderecoCliente"]?>" required>
        </div>
        <div>
            <label for="bairroCliente">Bairro</label>
            <input type="text" name="bairroCliente" id="bairroCliente" value="<?=$dados["bairroCliente"]?>" required>
        </div>
        <div>
            <label for="cidadeCliente">Cidade</label>
            <input type="text" name="cidadeCliente" id="cidadeCliente" value="<?=$dados["cidadeCliente"]?>" required>
        </div>
        <div>
            <label for="estadoCliente">Estado</label>
            <select name="estadoCliente" id="estadoCliente" required>
                
                <option value="SP" <?php echo ($dados["estadoCliente"] === "SP")?"selected":"" ?>>São Paulo</option>
                <option value="PR" <?php echo ($dados["estadoCliente"] === "PR")?"selected":"" ?>>Paraná</option>
                <option value="RJ" <?php echo ($dados["estadoCliente"] === "RJ")?"selected":"" ?>>Rio de Janeiro</option>
                <option value="BH" <?php echo ($dados["estadoCliente"] === "BR")?"selected":"" ?>>Bahia</option>
            </select>
        </div>
        <div>
            <label for="cepCliente">cep</label>
            <input type="text" name="cepCliente" id="cepCliente" maxlength="10"  value="<?=$dados["cepCliente"]?>"  required>
        </div>
        <div>
            <label for="dataNascCliente">Data de Nasc.</label>
            <input type="date" name="dataNascCliente" id="dataNascCliente"  value="<?=$dados["dataNascCliente"]?>"  required>
        </div>
        <div>
            <button type="submit">
                Salvar Alterações
            </button>
        </div>
    </form>
</div>