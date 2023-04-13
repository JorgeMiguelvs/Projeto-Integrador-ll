<html>
    <head>
        <title>Listar os Administradores</title>
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
<h1>Listar os Administradores</h1>
<br>
<br>
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
$cmd = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_ATIVO=1");

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
<h2>Lista de adms ativos</h2>    
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Ativo</th>
            <th>Atualizar / Desativar</th>            
        </tr>
<?php
    //Lista os admins
    while($linha = $cmd->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha["ADM_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["ADM_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["ADM_EMAIL"];
                ?>
            </td>    
            <td>
                 <?php
                    echo $linha["ADM_SENHA"];
                ?>
            </td>    

            <td>
                 <?php
                    echo $linha["ADM_ATIVO"];
                ?>
            </td> 
            
            <td>
                <a href="editarAdm.php?id=<?php echo $linha["ADM_ID"] ?>">
                <button type="button" class="btn btn-primary">Atualizar</button>
            </a>
            </td>
                  
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>
    <br>
    <br>
    <?php
    $cmd2 = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_ATIVO=0");
    ?>
    <h2>Lista de adms inativos</h2>    
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Ativo</th>
            <th>Atualizar / Ativar</th>            
        </tr>
<?php
    //Lista os admins
    while($linha2 = $cmd2->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha2["ADM_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha2["ADM_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha2["ADM_EMAIL"];
                ?>
            </td>    
            <td>
                 <?php
                    echo $linha2["ADM_SENHA"];
                ?>
            </td>    

            <td>
                 <?php
                    echo $linha2["ADM_ATIVO"];
                ?>
            </td> 
            
            <td>
                <a href="editarAdm.php?id=<?php echo $linha2["ADM_ID"] ?>">
                <button type="button" class="btn btn-primary">Atualizar</button>
            </a>
            </td>
                  
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>
    <a href="cadastroAdm.php">
    <button type="button" class="btn btn-secondary">Voltar para tela de cadastro</button>
    </a>    
    </div>
    <br>
    </body>
    </html>