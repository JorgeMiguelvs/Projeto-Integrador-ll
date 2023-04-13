<html>
    <head>
        <title>Listar Imagens</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="lista.css">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="logo">
    <img src="imagens/logo5.png" width='100' height='60' >
    </div>
<a class="navbar-brand">Menu Administrador</a>
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
    
    </ul>
  </div>
</nav>
<br>

        <div class="container">
        <h1>Listar Imagens</h1>
        
<?php
//Dados para conexao ao MySQL → MySQL
$mysqlhostname = "144.22.244.104";
$mysqlport = "3306";
$mysqlpassword="CharlieB";
$mysqlusername = "CharlieB";
$mysqldatabase = "CharlieBookstore";

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


//Mostra a String de Conexao ao MySQL → Criei a String de conexão e conectei ao banco (PDO)
$dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
$pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT pimg.IMAGEM_ID,pimg.IMAGEM_ORDEM,pimg.PRODUTO_ID,p.PRODUTO_ID,p.PRODUTO_NOME,pimg.IMAGEM_URL 
FROM PRODUTO_IMAGEM pimg 
INNER JOIN 
PRODUTO p ON pimg.PRODUTO_ID = p.PRODUTO_ID");
?>      
    
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Ordem da Imagem</th>
            <th>Livro</th>
            <th>Imagem</th>
            <th>Editar</th>
          
                 
        </tr>
<?php
    //Lista os admins
    while($linha = $cmd->fetch()){
      $imagem=$linha["IMAGEM_URL"];
?>
        <tr>
            <td>
                <?php
                    echo $linha["IMAGEM_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["IMAGEM_ORDEM"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_NOME"];
                ?>
            </td>    
            <td>
            <?php
                  echo "<a href=''><img src='$imagem' width='100' height='100' /></a>";
                ?>
            </td> 

        
            
            <td>
                <a href="editarImg.php?id=<?php echo $linha["IMAGEM_ID"] ?>">
                <button type="button" class="btn btn-primary">Atualizar</button>
            </a>
            </td>
              
        </tr>
    <?php
    } 
?>
    </table>
    <br>
    <a href="cadastroImg.php">
    <button type="button" class="btn btn-secondary">Voltar para tela de cadastro</button>
    </a> 
</div>   
<br>
    </body>
    </html>