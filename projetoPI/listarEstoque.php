<html>
    <head>
        <title>Listar Estoque</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="lista.css">
    </head>
    <body>
    <?php
//Dados para conexao ao MySQL → MySQL
$mysqlhostname = "144.22.244.104";
$mysqlport = "3306";
$mysqlpassword="CharlieB";
$mysqlusername = "CharlieB";
$mysqldatabase = "CharlieBookstore";

//Mostra a String de Conexao ao MySQL → Criei a String de conexão e conectei ao banco (PDO)
$dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
$pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT pe.PRODUTO_QTD,p.PRODUTO_NOME,pe.PRODUTO_ID,p.PRODUTO_ID,p.PRODUTO_ATIVO
FROM PRODUTO_ESTOQUE  pe 
INNER JOIN PRODUTO  p 
ON pe.PRODUTO_ID=p.PRODUTO_ID");

// Inicia a sessao
session_start();

// Se existir a marcacao de estar logado
if(isset($_SESSION["logado"]) == true) {
    //Se a maracacao esta True

 
} else {
    // Se a marcacao nao existir ou for falsa

    // Direciona paga a pagina de login com a mensagem de erro
    header("location:loginAdm.php?msg=Necessário realizar o login!");
}

?> 

    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbarTeste">
<div class="containerLoginAdm">
    <div class="logo">
    <img src="imagens/logo5.png" width='100' height='60' >
    </div>
</div> 
<a class="navbar-brand" href='menuAdm.php?id=<?php echo $_SESSION["id"] ?>'>Menu Administrador</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="cadastroAdm.php">Administrador<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastroProduto.php">Produto<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastroCategoria.php">Categoria<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastroEstoque.php">Estoque<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastroImg.php">Imagem<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
      
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Outras ações
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="listarProdutoCompleto.php">Lista produtos</a>
          <a class="dropdown-item" href='menuAdm.php?id=<?php echo $_SESSION["id"] ?>'> Menu</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Sair</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<br>

        <div class="container">
        <h1>Listar Estoque</h1>
        
     
    <table class="table table-striped">
        <tr>
            <th>Nome do Livro</th>
            <th>quantidade</th>
            <th>Atualizar</th>     
        </tr>

<?php
    //Lista os admins
    while($linha = $cmd->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha["PRODUTO_NOME"];
                ?>
            </td>
         
            <td>
                <?php
                    echo $linha["PRODUTO_QTD"];
                ?>
            </td>    
        
            
            <td>
                <a href="editarEstoque.php?id=<?php echo $linha["PRODUTO_ID"] ?>">
                <button type="button" class="btn btn-primary">Atualizar</button>
            </a>
            </td>       
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>
    <br>
    <a href="cadastroEstoque.php">
    <button type="button" class="btn btn-secondary">Voltar para tela de cadastro</button>
    </a> 
</div>   
<br>
    </body>
    </html>


   