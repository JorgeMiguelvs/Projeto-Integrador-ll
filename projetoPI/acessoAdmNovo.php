
   
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
$admAtivo = $_POST["admAtivo"];
if ($admAtivo == "true") {
    
    $adm=true;
}
else{

    $adm=false;
}



//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO ADMINISTRADOR (ADM_NOME,ADM_EMAIL,ADM_SENHA,ADM_ATIVO) VALUES('" . $nome . "','" . $email . "','" .$senha . "'," .$admAtivo . ")" ;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>alert('administrador cadastrado com sucesso');window.location
    .href='loginAdm.php';</script>";
} 
else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar um administrador, tente novamente');window.location
    .href='CadastroAdm.php';</script>";
}
?>
<br><br>
<a href="listarAdm.php">

<button type="button" class="btn btn-secondary">Voltar para a página de Lista</button>

</a> 

</body>
</html>