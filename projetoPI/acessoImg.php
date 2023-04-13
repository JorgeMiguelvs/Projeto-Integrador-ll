
   
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



//
// Coloque aqui a chave do Serviço
//
$IMGUR_CLIENT_ID = "7dbd0f41f188b6e";

//
// Se nao nenhum arquivo for selecionado, entao informa que precisa selecionar um 
//
if(empty($_FILES["imagem"]["name"])){ 
 die('Selecione um arquivo para fazer o upload');
} 

//
// captura O nome e a extensao do arquivo
//
$fileName = basename($_FILES["imagem"]["name"]); 
$fileType = pathinfo($fileName, PATHINFO_EXTENSION); 

//
// Verifica os tipo de arquivo (extensao) são os mais adequados
//
$allowTypes = array('jpg','png','jpeg','gif'); 
if(in_array($fileType, $allowTypes)){ 

//
// Abre o arquivo 
//
$handle = fopen($_FILES['imagem']['tmp_name'], "rb");
$image_source = stream_get_contents($handle, filesize($_FILES['imagem']['tmp_name']));

 
//
// Post image to Imgur via Web Service API 
//


// Inicia o metodo para upload via POST do HTTP
$ch = curl_init(); 
//Configura a url de destino
curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json'); 
//Estabelece que sera via POST
curl_setopt($ch, CURLOPT_POST, TRUE); 
//Adiciona a Chave do servico ao cabecalho da requisicao
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $IMGUR_CLIENT_ID)); 
//Adiciona os campos 
curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => $image_source)); 
//Estabelece detalhes do processo
curl_setopt($ch, CURLOPT_VERBOSE, true);
//Informa que aguardara o retorno
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

//
// Inicia o upload
//
$response = curl_exec($ch); 

//
// Se ocorreu algum erro no processo de upload para o Servico IMGUR
//
if(curl_errno($ch)) {
    echo 'Curl erro: '.curl_error($ch);
    die();
}


//
// Captura a resposta do upload
//
curl_close($ch); 
$responseArr = json_decode($response); 

//
// Se o conteudo enviado nao for vazio, ou seja, tem um Link para a imagem, a exibe
//
if(!empty($responseArr->data->link)){ 
    //AQUI VOCE VAI INSERRIR NO BANCO O LINK ABAIXO

    // $responseArr->data->link retorna o Link da imagem
    // Exibe a imagem

   echo '<img src="' . $responseArr->data->link . '"</>';
    // Link para ir para o IMGUR
    echo "<br>";
    echo '<a href="' . $responseArr->data->link . '">Link para a imagem</a>';
}else{ 
    // Caso tenha algum erro         
    echo "<script language='javascript' type='text/javascript'>alert('ERRO: Imagem não foi inserida');window.location
    .href='cadastroImg.php';</script>";
} 
}else{ 
// Formato de imagem nao permitido

echo "<script language='javascript' type='text/javascript'>alert('Não é permitido esse formato de imagem');window.location
    .href='cadastroImg.php';</script>";
}  





//Captura os valores das variáveis
$imagemOrdem = $_POST["imagemOrdem"];
$produtoId = $_POST["produtoId"];
$imagem = $responseArr->data->link;


//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO PRODUTO_IMAGEM (IMAGEM_ORDEM, PRODUTO_ID,IMAGEM_URL) VALUES(" . $imagemOrdem . "," . $produtoId . ",'" .$imagem . "')" ;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>alert('Imagem cadastrada com sucesso');window.location
    .href='listarImg.php';</script>";
} 
else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar uma imagem, tente novamente');window.location
    .href='cadastroImg.php';</script>";
}


?>
<br><br>
<a href="listarImg.php">
    <button type="button" class="btn btn-secondary">Voltar para a página de Lista</button>
    </a> 

</body>
</html>
