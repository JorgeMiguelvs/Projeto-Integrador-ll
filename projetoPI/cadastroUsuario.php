<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Cadastrar Usuario</title>
   
      
			
      
    </script>
  </head>
  <body>


    <div class="container">
   <div class="row">
    <div class="col">
    <h1>Criar conta</h1>
    <h2>Já é um membro? <a href="loginUsuario.php">Login</a></h2>
    <form action="acessoUsuario.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome Completo</label>
    <input type="text" class="form-control" name="nome" aria-describedby="emailHelp" placeholder="Digite seu nome completo" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Digite seu email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">CPF</label>
    <input type="text" class="form-control"  maxlength=11 name="cpf" onkeypress="return semLetra(event)" aria-describedby="emailHelp" placeholder="Digite seu CPF" required>
    <script type="text/javascript">
      function semLetra(a){
        var x= a.which || e.keycode;
        if ((x>=48 && x<=57))
        {
          return true;
        }else{
          return false;
        }
      }
      </script>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
  </div>
  <button type="submit" class="btn btn-light">Cadastrar</button>
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