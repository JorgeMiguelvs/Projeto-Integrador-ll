
<html>
<head>
    <title>Excluir Categoria</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <h1>Excluir Categoria</h1>
<?php
//Dados para conexao ao MySQL → MySQL
$mysqlhostname = "144.22.244.104";
$mysqlport = "3306";
$mysqlpassword = "CharlieB";
$mysqlusername = "CharlieB";
$mysqldatabase = "CharlieBookstore";

//Monta a String de Conexao ao MySQL → Criei a String de conexão e conectei ao banco (PDO)
$dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
$pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

$nome=$_POST["nome"];
$id=$_POST["id"];

$cmdtext = "DELETE FROM CATEGORIA WHERE CATEGORIA_ID=$id";
$cmd= $pdo->prepare($cmdtext);

$status =$cmd->execute();
if ($status) {
    echo 'Categoria excluído com sucesso!!!';
} else{
    echo 'erro ao excluir a Categoria';
}
?>
<br><br>
<a href="listarCategoria.php">
    <button type="button" class="btn btn-secondary">Voltar para a página de Lista</button>
    </a>
</body>
</html>