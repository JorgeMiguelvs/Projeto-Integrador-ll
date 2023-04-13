<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Cadastre seu Endereço</title>
</head>

<body>

    <div class="containerEndereço">
        <div class="form-box-endereco">
            <h1>Cadastre seu Endereço</h1>
            <form action="acessoEndereco.php" method="POST">
                <div class="input-group-endereco">
                    <label for="nome"> Nome da Rua</label>
                    <input type="text" id="nomeRua" name="nomeRua" placeholder="Digite o nome da rua" required>
                </div>
                <div class="input-group-endereco">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" id="logradouro" name="logradouro" placeholder="Digite seu logradouro" required>
                </div>
                <div class="input-group-endereco">
                    <label for="numero">Número</label>
                    <input type="number" id="numero" name="numero" placeholder="Digite o número da casa" required>
                </div>
                <div class="input-group-endereco">
                    <label for="complemento">Complemento</label>
                    <input type="text" id="complemento"name="complemento" placeholder="Digite o complemento" required>
                </div>

                <div class="input-group-endereco">
                    <label for="cep">CEP</label>
                    <input type="number" id="cep" name="cep" placeholder="Digite seu CEP" required>
                </div>

                <div class="input-group-endereco">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" placeholder="Digite sua Cidade" required>
                </div>

                <div class="input-group-endereco">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" required>
                        <option selected disabled value="">Escolha</option>
                        <option>AC</option>
                        <option>AL</option>
                        <option>AP</option>
                        <option>AM</option>
                        <option>BA</option>
                        <option>CE</option>
                        <option>DF</option>
                        <option>ES</option>
                        <option>GO</option>
                        <option>MA</option>
                        <option>MT</option>
                        <option>MS</option>
                        <option>MG</option>
                        <option>PA</option>
                        <option>PB</option>
                        <option>PR</option>
                        <option>PE</option>
                        <option>PI</option>
                        <option>RJ</option>
                        <option>RN</option>
                        <option>RS</option>
                        <option>RO</option>
                        <option>RR</option>
                        <option>SC</option>
                        <option>SP</option>
                        <option>SE</option>
                        <option>TO</option>
                    </select>
                </div>
                <div class="input-button-endereco">
                    <button type="submit" class="btn btn-light">Cadastrar</a></button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>