<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login Adm</title>
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
$desativado = 0;

  // Inicia a sessao
  session_start();//area de memoria do servidor
    
//Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo Usuario
$admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL='" . $email . "' AND ADM_SENHA='" . $senha . "'")->fetchAll();
//Realiza uma Query SQL para buscar o administrador está desativado
$consultaDesativo = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL='" . $email . "' AND ADM_SENHA='" . $senha . "'AND ADM_ATIVO='" . $desativado ."'")->fetchAll();

if ($consultaDesativo==true) {
    echo "<script language='javascript' type='text/javascript'>alert('Usuário inativo no momento');window.location
    .href='loginAdm.php';</script>";
}
else
{
    if(count($admin)==0){
        echo "<script language='javascript' type='text/javascript'>alert('Usuário ou senha inválidos');window.location
        .href='loginAdm.php';</script>";
        
    
    }
     else {
        echo "<script language='javascript' type='text/javascript'>alert('Login efetuado com sucesso!');window.location
        .href='menuAdm.php?id=". $admin[0]["ADM_ID"]. "';</script>";
    
        $_SESSION["logado"] = true;
        $_SESSION["id"]=$admin[0]["ADM_ID"];
      
    }
}


?>
<br>
<br>
<a href="loginAdm.php">
    <button type="button" class="btn btn-secondary">Voltar</button>
    </a>

</body>
</html>