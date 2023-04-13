

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
            $id=$_POST["id"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $cpf = $_POST["cpf"];
            
                
            //Monta o comando de Inserção no Banco
            $cmdtext = "UPDATE USUARIO set USUARIO_NOME ='{$nome}', USUARIO_EMAIL='{$email}', USUARIO_SENHA='{$senha}',USUARIO_CPF='{$cpf}' WHERE USUARIO_ID='{$id}'";
            
            $cmd = $pdo->prepare($cmdtext);

            //Executa o comando e verifica se teve sucesso
            $status = $cmd->execute();
            if($status){
                echo "Atualização do Usuario com sucesso!";
            } 
            else {
                echo "Ocorreu um erro ao atualizar";
            }

?>
<br><br>
    <a href="listarUsuario.php">
    <button type="button" class="btn btn-secondary">Voltar para a página de Lista</button>
    </a> 
            
        </body>
        </html>        
	