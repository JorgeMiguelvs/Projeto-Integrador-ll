
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
            $descricao = $_POST["descricao"];
            $preco = $_POST["preco"];
            $desconto = $_POST["desconto"];
            $categoria = $_POST["categoria"];
            $produtoAtivo=$_POST["produtoAtivo"];

            if($produtoAtivo == "true")
            {
                $produto = true;
            }
            else{
                $produto = false;
            
            }
           
            
                
            //Monta o comando de Inserção no Banco
            $cmdtext = "UPDATE PRODUTO set PRODUTO_NOME ='{$nome}', PRODUTO_DESC='{$descricao}', PRODUTO_PRECO='{$preco}', CATEGORIA_ID='{$categoria}',PRODUTO_DESCONTO='{$desconto}',PRODUTO_ATIVO={$produtoAtivo} WHERE PRODUTO_ID='{$id}'";
            
            $cmd = $pdo->prepare($cmdtext);

            //Executa o comando e verifica se teve sucesso
            $status = $cmd->execute();
            if($status){
                echo "<script language='javascript' type='text/javascript'>alert('Produto atualizado com sucesso');window.location
                .href='listarProduto.php';</script>";
            } 
            else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar um produto, tente novamente');window.location
                .href='editarProduto.php';</script>";
            }


?>
<br><br>
    <a href="listarProduto.php">
    <button type="button" class="btn btn-secondary">Voltar para a página de Lista</button>
    </a> 
           
        </body>
        </html>   