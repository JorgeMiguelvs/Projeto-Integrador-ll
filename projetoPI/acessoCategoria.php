

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
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$categoriaAtivo=$_POST["categoriaAtivo"];

if($categoriaAtivo == "true")
{
    $categoria = true;
}
else{
    $categoria = false;
 
}

session_start();


$cmdtext = "INSERT INTO CATEGORIA (CATEGORIA_NOME, CATEGORIA_DESC,CATEGORIA_ATIVO) VALUES('" .$nome. "','" .$descricao. "'," .$categoriaAtivo. ")";
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>alert('Categoria cadastrada com sucesso');window.location
    .href='listarCategoria.php';</script>";
} 
else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar uma categoria, tente novamente');window.location
    .href='cadastroCategoria.php';</script>";
}

?>
</body>
</html>

