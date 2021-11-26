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
}

?>