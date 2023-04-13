<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Editar Produto</title>
</head>

<body>
<?php
//Dados para conexao ao MySQL → MySQL
$mysqlhostname = "144.22.244.104";
$mysqlport = "3306";
$mysqlpassword="CharlieB";
$mysqlusername = "CharlieB";
$mysqldatabase = "CharlieBookstore";

//Monta a String de Conexao ao MySQL → Criei a String de conexão e conectei ao banco (PDO)
$dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
$pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

//Coleta os dados do Administrador
$id = $_GET["id"];

//Realiza uam Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado p
$admin = $pdo->query("SELECT * FROM ENDERECO WHERE ENDERECO_ID=" . $id)->fetch();

//Se o retorno for vazio (0), então a senha ou email estão incorretos

$nome = $admin["ENDERECO_NOME"];
$logradouro = $admin["ENDERECO_LOGRADOURO"];
$numero = $admin["ENDERECO_NUMERO"];
$complemento=$admin["ENDERECO_COMPLEMENTO"];
$cep=$admin["ENDERECO_CEP"];
$cidade=$admin["ENDERECO_CIDADE"];
$estado=$admin["ENDERECO_ESTADO"];


?>
    <div class="containerLogin">
        <div class="form-box-login">
            <h1>Editar dados</h1>
            <form action="acessoEditarEndereco.php" method="POST">
                <div class="input-group-endereco">
                    <input type="hidden" name="id" id="id" value="<?php echo $id?>">
                    <label>Nome do Endereço</label>
                    <br>
                    <input type="text" name="nome" id="nome" value="<?php echo $nome?>">
                </div>
                <div class="input-group-endereco">
                    <label>Logradouro</label>
                    <br>
                    <textbox name="logradouro" id="logradouro" value="<?php echo $logradouro?>">
                </div>
                <div class="input-group-endereco">
                    <label>Número</label>
                    <br>
                    <input type="number" name="numero" id="numero" value="<?php echo $numero?>">
                </div>
                <div class="input-group-endereco">
                    <label>Complemento</label>
                    <br>
                    <input type="text" name="complemento" id="complemento" value="<?php echo $complemento?>">
                </div>
                <div class="input-group-endereco">
                    <label for="cep">CEP</label>
                    <input type="number" id="cep" name="cep"value="<?php echo $cep?>" >
                </div>

                <div class="input-group-endereco">
                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" value="<?php echo $cidade?>">
                </div>

                <div class="input-group-endereco">
                    <label for="estado">Estado</label>
                    <select id="estado" name="estado"value="<?php echo $estado?>" >
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
                <div class="input-button-login">
                    <button type="submit">Editar</button>
                </div>
        </div>
        </form>

    </div>
<?php

?>

</body>

</html>