<html>
    <head>
        <title>Listar os Usuarios</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
        <h1>Listar os Usuarios</h1>
        
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
$cmd = $pdo->query("SELECT * FROM USUARIO");
?>      
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CPF</th>
            <th>Senha</th>
            <th>Atualizar</th>
            <th>Excluir</th>            
        </tr>
<?php
    //Lista os admins
    while($linha = $cmd->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha["USUARIO_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["USUARIO_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["USUARIO_EMAIL"];
                ?>
            </td>    
            <td>
                 <?php
                    echo $linha["USUARIO_CPF"];
                ?>
            </td> 
            <td>
                 <?php
                    echo $linha["USUARIO_SENHA"];
                ?>
            </td>    
            
            <td>
                <a href="editarUsuario.php?id=<?php echo $linha["USUARIO_ID"] ?>">
                <button type="button" class="btn btn-primary">Atualizar</button>
            </a>
            </td>
            <td>
                <a href="excluirUsuario.php?id=<?php echo $linha["USUARIO_ID"] ?>">
                <button type="button" class="btn btn-danger">Deletar</button>
            </a>
            </td>        
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>
    
    <a href="menuAdm.php">
    <button type="button" class="btn btn-secondary">Voltar para o Menu</button>
    
    </a> 
    
    </div>
    <br>
    </body>
    </html>