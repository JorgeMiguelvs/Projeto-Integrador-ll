

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
            $categoriaAtivo=$_POST["categoriaAtivo"];
            if ($categoriaAtivo=="true") {
                
                $categoria=true;
            }
            else{
                $categoria=false;
            }
            
           session_start();
            
                
            //Monta o comando de Inserção no Banco
            $cmdtext = "UPDATE CATEGORIA set CATEGORIA_NOME ='{$nome}', CATEGORIA_DESC='{$descricao}',CATEGORIA_ATIVO={$categoriaAtivo} WHERE CATEGORIA_ID='{$id}'";
            
            $cmd = $pdo->prepare($cmdtext);

            //Executa o comando e verifica se teve sucesso
            $status = $cmd->execute();
            if($status){
                echo "<script language='javascript' type='text/javascript'>alert('Categoria atualizada com sucesso');window.location
                .href='listarCategoria.php';</script>";
            } 
            else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar uma categoria, tente novamente');window.location
                .href='editarCategoria.php';</script>";
            }

?>
<br><br>
    <a href="listarCategoria.php">
    <button type="button" class="btn btn-secondary">Voltar para a página de Lista</button>
    </a> 
            
        </body>
        </html>   