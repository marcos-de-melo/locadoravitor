<h2>Cadastro de Clientes</h2>

<div>
    <form action="index.php?menu=inserir-clientes" method="post">
        <div>
            <label for="nomeCliente">Nome do Cliente</label>
            <input type="text" name="nomeCliente" id="nomeCliente" required>
        </div>
        <div>
            <label for="emailCliente">Email</label>
            <input type="email" name="emailCliente" id="emailCliente" required>
        </div>
        <div>
            <label for="telefoneCliente">Telefone</label>
            <input type="text" name="telefoneCliente" id="telefoneCliente">
        </div>
        <div>
            <label for="enderecoCliente">Endereco</label>
            <input type="text" name="enderecoCliente" id="enderecoCliente" required>
        </div>
        <div>
            <label for="bairroCliente">Bairro</label>
            <input type="text" name="bairroCliente" id="bairroCliente" required>
        </div>
        <div>
            <label for="cidadeCliente">Cidade</label>
            <input type="text" name="cidadeCliente" id="cidadeCliente" required>
        </div>
        <div>
            <label for="estadoCliente">Estado</label>
            <select name="estadoCliente" id="estadoCliente" required>
                <option value=""></option>
                <option value="SP">São Paulo</option>
                <option value="PR">Paraná</option>
                <option value="RJ">Rio de Janeiro</option>
                <option value="BH">Bahia</option>
            </select>
        </div>
        <div>
            <label for="cepCliente">cep</label>
            <input type="text" name="cepCliente" id="cepCliente" maxlength="10" required>
        </div>
        <div>
            <label for="dataNascCliente">Data de Nasc.</label>
            <input type="date" name="dataNascCliente" id="dataNascCliente" required>
        </div>
        <div>
            <button type="submit">
                Salvar
            </button>
        </div>
    </form>
</div>