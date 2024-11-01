<div class="container">
<h3 class="mt-2 bi bi-person-circle"> Cadastro de Clientes</h3>

<div>
    <form action="index.php?menu=inserir-clientes" method="post">
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="nomeCliente">Nome do Cliente</label>
            <input class="form-control" type="text" name="nomeCliente" id="nomeCliente" required>
        </div>
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="emailCliente">Email</label>
            <input class="form-control" type="email" name="emailCliente" id="emailCliente" required>
        </div>
        <div class="mb-3 col-12 col-sm-3">
            <label class="form-label" for="telefoneCliente">Telefone</label>
            <input class="form-control" type="text" name="telefoneCliente" id="telefoneCliente">
        </div>
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="enderecoCliente">Endereco</label>
            <input class="form-control" type="text" name="enderecoCliente" id="enderecoCliente" required>
        </div>
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="bairroCliente">Bairro</label>
            <input class="form-control" type="text" name="bairroCliente" id="bairroCliente" required>
        </div>
        <div class="mb-3 col-12 col-sm-6">
            <label class="form-label" for="cidadeCliente">Cidade</label>
            <input class="form-control" type="text" name="cidadeCliente" id="cidadeCliente" required>
        </div>
        <div class="mb-3 col-12 col-sm-3">
            <label for="estadoCliente">Estado</label>
            <select class="form-select" name="estadoCliente" id="estadoCliente" required>
                <option value=""></option>
                <option value="SP">São Paulo</option>
                <option value="PR">Paraná</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="BH">Bahia</option>
            </select>
        </div>
        <div class="mb-3 col-12 col-sm-3">
            <label class="form-label" for="cepCliente">cep</label>
            <input class="form-control" type="text" name="cepCliente" id="cepCliente" maxlength="10" required>
        </div>
        <div class="mb-3 col-12 col-sm-3">
            <label class="form-label" for="dataNascCliente">Data de Nasc.</label>
            <input class="form-control" type="date" name="dataNascCliente" id="dataNascCliente" required>
        </div>
        <div class="mb-3">
            <button class="btn btn-success bi bi-floppy-fill" type="submit">
                Salvar
            </button>
        </div>
    </form>
</div>
</div>