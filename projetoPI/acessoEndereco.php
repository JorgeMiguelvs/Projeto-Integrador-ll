<html>
    <head>
    <title>Endereço</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    
<body>
    <h1>Confirmação de endereço</h1>
   
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
$nome = $_POST["nomeRua"];
$logradouro = $_POST["logradouro"];
$numero = $_POST["numero"];
$complemento = $_POST["complemento"];
$cep = $_POST["cep"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];



    
//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO ENDERECO (ENDERECO_NOME, ENDERECO_LOGRADOURO, ENDERECO_NUMERO , ENDERECO_COMPLEMENTO,
 ENDERECO_CEP,ENDERECO_CIDADE,ENDERECO_ESTADO) VALUES
('" . $nome . "','" . $logradouro . "','" .$numero . "','" .$complemento. "','".$cep.  "','".$cidade.  "','".$estado. "')" ;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "Endereço inserido com sucesso!";
} 
else {
    echo "Ocorreu um erro ao inserir";
}

?>
<br><br>
<a href=""></a>

</body>
</html>
