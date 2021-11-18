<?php

//efetua o cadastro do usuario no banco de dados
 require_once("./Dao.php");
 
 
 $db = new Dao();

 $credenciais['nome'] = $_POST['nome'];
 $credenciais['cpf'] = $_POST['cpf'];
 $credenciais['datanasc'] = $_POST['datanasc'];
 $credenciais['email'] = $_POST['email'];
 $credenciais['senha'] = $_POST['senha'];
 $credenciais['telefone'] = $_POST['telefone'];

 
 if($db->cadastro($credenciais)){
    $message = "Cadastrado com sucesso";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
    header('Location: ./principal.php');
    

 }
 else{

   header("Location: cadastro.php");
}

?>