<html>
        <head>
            <title>Processamento de Atualizacao Usuário</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        </head>
        <body>
            <h1>Atualização de Endereço</h1>

            <?php
            //Dados para conexao ao MySQL → MySQL
            $mysqlhostname = "144.22.244.104";
            $mysqlport = "3306";
            $mysqlpassword = "CharlieB";
            $mysqlusername = "CharlieB";
            $mysqldatabase = "CharlieBookstore";

            //Mostra a String de Conexao ao MySQL → Criei a String de conexão e conectei ao banco (PDO)
            $dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
            $pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

            //Captura os valores das variáveis
            $id=$_POST["id"];
            $iduser=$_POST["iduser"];
            $nome = $_POST["nome"];
            $logradouro = $_POST["logradouro"];
            $numero = $_POST["numero"];
            $complemento = $_POST["complemento"];
            $cep = $_POST["cep"];
            $cidade = $_POST["cidade"];
            $estado = $_POST["estado"];
           
            
                
            //Monta o comando de Inserção no Banco
            $cmdtext = "UPDATE ENDERECO set ENDERECO_NOME ='{$nome}', ENDERECO_LOGRADOURO='{$logradouro}', ENDERECO_NUMERO='{$numero}',
             ENDERECO_COMPLEMENTO='{$complemento}',ENDERECO_CEP='{$cep}',ENDERECO_CIDADE='{$cidade}',
             ENDERECO_ESTADO='{$estado}' WHERE ENDERECO_ID='{$id}' AND USUARIO_ID{$iduser}";
            
            $cmd = $pdo->prepare($cmdtext);

            //Executa o comando e verifica se teve sucesso
            $status = $cmd->execute();
            if($status){
                echo "Endereço atualizado com sucesso!";
            } 
            else {
                echo "Ocorreu um erro ao atualizar";
            }

?>
<br><br>
<a href="listarEndereco.php">
    <button type="button" class="btn btn-secondary">Voltar para a página de Lista</button>
    </a>
        </body>
        </html>   