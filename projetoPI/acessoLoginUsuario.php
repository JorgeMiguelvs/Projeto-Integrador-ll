<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login Usuário</title>
</head>
<body>
    

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

//Captura o post do Usuario
$email = $_POST["email"];
$senha = $_POST["senha"];

//Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo Usuario
$admin = $pdo->query("SELECT * FROM USUARIO WHERE USUARIO_EMAIL='" . $email . "' AND USUARIO_SENHA='" . $senha . "'")->fetchAll();

//Se o retorno for vazio (0), então a senha ou email estão incorretos
if(count($admin)==0){
    echo "Usuario ou senha invalidos";
    
} else {
    echo "Login Efetuado com Sucesso";
    header("location:paginaPrincipal.php");
}



?>
<br>
<br>
<a href="loginUsuario.php">
    <button type="button" class="btn btn-secondary">Voltar para Login</button>
    </a>



</body>
</html>