

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
            $admAtivo=$_POST["admAtivo"];

            session_start();
           
            
                
            //Monta o comando de Inserção no Banco
            $cmdtext = "UPDATE ADMINISTRADOR set ADM_NOME ='{$nome}', ADM_EMAIL='{$email}', ADM_SENHA='{$senha}',ADM_ATIVO={$admAtivo} WHERE ADM_ID='{$id}'";
            
            $cmd = $pdo->prepare($cmdtext);

            //Executa o comando e verifica se teve sucesso
            $status = $cmd->execute();
            if($status){
                echo "<script language='javascript' type='text/javascript'>alert('Administrador atualizado com sucesso');window.location
                .href='listarAdm.php';</script>";
            } 
            else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar um administrador, tente novamente');window.location
                .href='editarAdm.php';</script>";
            }

?>
<br><br>
    <a href="listarAdm.php">
    <button type="button" class="btn btn-secondary">Voltar para a página de Lista</button>
    </a> 
            
        </body>
        </html>   