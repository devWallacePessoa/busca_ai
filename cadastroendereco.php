<?php
require_once("./Dao.php");
 
date_default_timezone_set("America/Sao_Paulo");

$dao = new Dao();

session_start();

if(isset($_FILES['img']))
{
  $ext = strtolower(substr($_FILES['img']['name'],-4)); //Pegando extensão do arquivo
  $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
  $dir = './imagensLojas/'; //Diretório para uploads 
  move_uploaded_file($_FILES['img']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
  $caminho = $dir.$new_name;

  $credenciais['nome'] = $_POST['loja'];
  $credenciais['path_img'] = $caminho;
  $credenciais['descricao'] = $_POST['descricao'];
  $credenciais['cnpj'] = $_POST['cpf'];
  $credenciais['id_usuario_fk'] = $_SESSION['id'];

  if($dao->cadastroLoja($credenciais, $caminho)){
    $message = "Cadastrado com sucesso";
    echo "<script type='text/javascript'>alert('$message');</script>";  
 }
 else{

   header("Location: Cadastroloja.php");

  
}
}

?>
<html>
    <head>
    <title>ViaCEP Webservice</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php include "bootstrap.php"?>
    </head>

    <body id="bodycad">

  <nav class="navbar fixed-top navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" id="navlogo"><img src="imagens/buscaaiwhite.png" height="22,5" width="117"></a>
        <a class="navbar-brand" face="Malgun Gothic" href="#">Sobre nós</a>
      </div>
    </nav>

<div id="cadastro">
  <div class="row">
    <form method="Post" action="processaEndereco.php" enctype="multipart/form-data">   
      
      <h1><font size="6" face="Malgun Gothic" id="titulocad"><center>Cadastro de Endereço</center></font></h1><br>
      <h3><font size="6" face="Malgun Gothic" id="titulocad"><center>Loja ou proprietário</center></font></h3><br>
        <font face="Malgun Gothic" size="4">Rua: <br> </font><input type="text" placeholder="" name="rua" id="inputcadnome">
        <div class="row">
          <div class="col-6">
          <font face="Malgun Gothic" size="4">Bairro: <br> </font><input type="text" placeholder="" name="bairro" id="inputcadnome"> <br>
          <font face="Malgun Gothic" size="4">CEP: <br> </font><input type="text" placeholder="" name="cep" id="inputcadnome">
          </div>
          <div class="col-6">
          <font face="Malgun Gothic" size="4">UF: <br> </font><input type="text" placeholder="" name="uf" id="inputcadnome"><br>
          <font face="Malgun Gothic" size="4">Num: <br> </font><input type="text" placeholder="" name="numero" id="inputcadnome">
          </div>
        </div>
        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
        <br>
       
        <input type= "submit" value = "enviar">
        <?php echo $_SESSION['id_loja'];?>
      
     
      
    </form>
  </div>
</div>
     
    </body>
 
    </body>

    </html>
