

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
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$desconto = $_POST["desconto"]; 
$categoria = $_POST["categoria"];
$produtoAtivo=$_POST["produtoAtivo"];

session_start();

if($produtoAtivo == "true")
{
    $produto = true;
}
else{
    $produto = false;
 
}



//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO PRODUTO (PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO , PRODUTO_DESCONTO , CATEGORIA_ID, PRODUTO_ATIVO) VALUES
('" . $nome . "','" . $descricao . "','" .$preco. "','" .$desconto."','" .$categoria."',".$produtoAtivo.")" ;
$cmd = $pdo->prepare($cmdtext) ;

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>alert('Produto cadastrado com sucesso!!!');window.location
    .href='listarProduto.php';</script>";
    

} 
else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar produto, tente novamente');window.location
    .href='cadastraProduto.php';</script>";
}

?>
<br><br>
<a href="listarProduto.php">
    <button type="button" class="btn btn-secondary">Voltar para a página de Lista</button>
    </a>


