<?php

//efetua o cadastro do usuario no banco de dados
 require_once("./Dao.php");
 
 date_default_timezone_set("America/Sao_Paulo");
 
 $dao = new Dao();

 $credenciais['titulo'] = $_POST['titulo'];
 $credenciais['preco'] = $_POST['preco'];
 $credenciais['categoria'] = $_POST['categoria'];
 $credenciais['descricao'] = $_POST['descricao'];
 $credenciais['hora'] = date("H:i:s");
 $credenciais['datap'] =date("Y-m-d");

 
 if($dao->cadastroProdutos($credenciais)){
    $message = "Cadastrado com sucesso";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
    header('Location: ./principal.php');
    

 }
 else{

   header("Location: CadastroProduto.php");

   if(isset($_FILES['pic']))
 {
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './imagensProduto'; //Diretório para uploads 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo("Imagem enviada com sucesso!"); 
    echo "</br>";
    $caminho = $dir.$new_name;
    $id= $this->dao->lastInsertId();
    if($dao->Inserirfoto($caminho, $id)){
      echo "Arquivo enviado com sucesso";
      header('Location: ./principal.php');
    }else {
      echo "falha ao enviar aquivo";
    }
  }
}

?>