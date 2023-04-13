<html>
    <head>
    <title>Criaçao de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    
<body>
    <h1>Criação Usuário</h1>
   
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
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$cpf = $_POST["cpf"];
    
//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO USUARIO (USUARIO_NOME, USUARIO_EMAIL, USUARIO_SENHA,USUARIO_CPF) VALUES('" . $nome . "','" . $email . "','" .$senha . "','" .$cpf. "')" ;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "Criação do usuário com sucesso!";
    
    
} 
else {
    echo "Ocorreu um erro ao inserir";
}

?>
<br><br>
<a href="loginUsuario.php">Faça o Login</a>

</body>
</html>

