<!DOCTYPE html>
<html lang="pt-br">

<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Excluir Usuario</title>
</head>

<body>

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

//Coleta os dados do Administrador
$id = $_GET["id"];

//Realiza uam Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado p
$admin = $pdo->query("SELECT * FROM USUARIO WHERE USUARIO_ID=" . $id)->fetch();

//Se o retorno for vazio (0), então a senha ou email estão incorretos
$nome = $admin["USUARIO_NOME"];
$email = $admin["USUARIO_EMAIL"];
$id=$admin["USUARIO_ID"];
$cpf = $admin["USUARIO_CPF"];

?>
  <div class="container">
   <div class="row">
    <div class="col">
    <h1>Excluir Usuário</h1>
    <form action="acessoExcluirForm.php" method="POST">
  <div>
    <input type="hidden" name="id" value="<?php echo $nome ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nome Completo</label>
    <input type="text" class="form-control" name="nome" aria-describedby="emailHelp" value="<?php echo $nome ?>" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $email ?>" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">CPF</label>
    <input type="number" class="form-control" name="cpf" aria-describedby="emailHelp" value="<?php echo $cpf ?>" required>
  </div>
  <button type="submit" class="btn btn-light">Excluir</button>
</form>
    </div>
   </div>
    </div>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>

</html>