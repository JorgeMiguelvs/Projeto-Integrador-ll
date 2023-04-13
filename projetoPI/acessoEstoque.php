
    

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


$produto = $_POST["produto"];
$qtd=$_POST["qtdEstoque"];



$cmdtext= "INSERT INTO PRODUTO_ESTOQUE(PRODUTO_ID,PRODUTO_QTD) VALUES('" .$produto. "','" .$qtd. "')";
$cmd= $pdo->prepare($cmdtext);

$status= $cmd->execute();

session_start();

if($status){
    echo "<script language='javascript' type='text/javascript'>alert('Estoque Cadastrado com sucesso');window.location
    .href='listarEstoque.php';</script>";
} 
else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao Cadastrar o estoque de algum produto, tente novamente');window.location
    .href='cadastroEstoque.php';</script>";
}


?>
</body>
</html>