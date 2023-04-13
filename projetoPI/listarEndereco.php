<html>
    <head>
        <title>Listar os Produtos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <h1>Listar os endereços</h1>
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
$cmd = $pdo->query("SELECT * FROM ENDERECO");
?>      
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Id do Usuário</th>
            <th>Nome</th>
            <th>logradouro</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Cep</th>
            <th>Cidade</th>      
            <th>Estado</th>            
        </tr>
<?php
    //Lista os admins
    while($linha = $cmd->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha["ENDERECO_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["USUARIO_ID"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["ENDERECO_NOME"];
                ?>
            </td>    
            <td>
                 <?php
                    echo $linha["ENDERECO_LOGRADOURO"];
                ?>
            </td>  
            <td>
                 <?php
                    echo $linha["ENDERECO_NUMERO"];
                ?>
            </td>  
            <td>
                 <?php
                    echo $linha["ENDERECO_COMPLEMENTO"];
                ?>
            </td>    
            <td>
                 <?php
                    echo linha["ENDERECO_CEP"];
                ?>
            </td>  
            <td>
                 <?php
                    echo linha["ENDERECO_CIDADE"];
                ?>
            </td>  
            <td>
                 <?php
                    echo linha["ENDERECO_ESTADO"];
                ?>
            </td>  
            
            <td>
                <a href="editarEndereco.php?id=<?php echo $linha["PRODUTO_ID"] ?>">Atualizar</a>
            </td>
            <td>
                <a href="excluirEndereco.php?id=<?php echo $linha["PRODUTO_ID"] ?>">Excluir</a>
            </td>        
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>
    <br>
    <a href="menuPrincipal.php">Voltar para a Pagina Principal</a>    
    </body>
    </html>