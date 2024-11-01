<?php
$idCliente = $_GET["idCliente"];
$sql = "select * from tbclientes where idCliente = {$idCliente}";
$rs = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($rs);
?>
<div class="container">
<h3 class="mt-2 bi bi-person-circle">Editar Clientes</h2>

<div>
    <form action="index.php?menu=atualizar-clientes" method="post">
        <div class="mb-3 col-12 col-sm-3">
            <label class="form-label" for="idCliente">ID</label>
            <input class="form-control" type="text" name="idCliente" id="idCliente" value="<?=$dados["idCliente"]?>" readonly>
        </div>
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="nomeCliente">Nome do Cliente</label>
            <input class="form-control"t type="text" name="nomeCliente" id="nomeCliente" value="<?=$dados["nomeCliente"]?>" required>
        </div>
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="emailCliente">Email</label>
            <input class="form-control" type="email" name="emailCliente" id="emailCliente" value="<?=$dados["emailCliente"]?>" required>
        </div>
        <div class="mb-3 col-12 col-sm-3">
             <label class="form-label" for="telefoneCliente">Telefone</label>
             <input class="form-control" type="text" name="telefoneCliente" id="telefoneCliente" value="<?=$dados["telefoneCliente"]?>" required>
        </div>
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="enderecoCliente">Endereco</label>
            <input class="form-control" type="text" name="enderecoCliente" id="enderecoCliente" value="<?=$dados["enderecoCliente"]?>" required>
        </div>
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="bairroCliente">Bairro</label>
            <input class="form-control" type="text" name="bairroCliente" id="bairroCliente" value="<?=$dados["bairroCliente"]?>" required>
        </div>
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="cidadeCliente">Cidade</label>
            <input class="form-control" type="text" name="cidadeCliente" id="cidadeCliente" value="<?=$dados["cidadeCliente"]?>" required>
        </div>
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="estadoCliente">Estado</label>
            <select name="estadoCliente" id="estadoCliente" required>
                
                <option value="SP" <?php echo ($dados["estadoCliente"] === "SP")?"selected":"" ?>>São Paulo</option>
                <option value="PR" <?php echo ($dados["estadoCliente"] === "PR")?"selected":"" ?>>Paraná</option>
                <option value="RJ" <?php echo ($dados["estadoCliente"] === "RJ")?"selected":"" ?>>Rio de Janeiro</option>
                <option value="BH" <?php echo ($dados["estadoCliente"] === "BR")?"selected":"" ?>>Bahia</option>
            </select>
        </div>
        <div>
            <label class="form-label" for="cepCliente">cep</label>
            <input class="form-control" type="text" name="cepCliente" id="cepCliente" maxlength="10"  value="<?=$dados["cepCliente"]?>"  required>
        </div>
        <div>
            <label class="form-label" for="dataNascCliente">Data de Nasc.</label>
            <input class="form-control" type="date" name="dataNascCliente" id="dataNascCliente"  value="<?=$dados["dataNascCliente"]?>"  required>
        </div>
        <div>
            <button class=" btn btn-success bi bi-floppy-filltype="submit">
                Salvar Alterações
            </button>
        </div>
    </form>
</div>
</div>