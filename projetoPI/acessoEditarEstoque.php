

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
            $qtd=$_POST["qtdEstoque"];

        
            
            //Monta o comando de Inserção no Banco
            $cmdtext = "UPDATE PRODUTO_ESTOQUE set PRODUTO_QTD ='{$qtd}' WHERE PRODUTO_ID='{$id}'";
            
            $cmd = $pdo->prepare($cmdtext);

            session_start();

            //Executa o comando e verifica se teve sucesso
            $status = $cmd->execute();
            if($status){
                echo "<script language='javascript' type='text/javascript'>alert('Estoque atualizado com sucesso');window.location
                .href='listarEstoque.php';</script>";
            } 
            else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar um estoque, tente novamente');window.location
                .href='editarEstoque.php';</script>";
            }


?>
<br><br>
    <a href="listarEstoque.php">
    <button type="button" class="btn btn-secondary">Voltar para a página de Lista</button>
    </a> 
            
        </body>
        </html>   