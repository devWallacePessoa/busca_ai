<?php

require_once("./Dao.php");
//$id= $this->dao->lastInsertId();

date_default_timezone_set("America/Sao_Paulo");

$dao = new Dao();

session_start();

$credenciais['cep'] = $_POST['cep'];
$credenciais['rua'] = $_POST['rua'];
$credenciais['bairro'] = $_POST['bairro'];
$credenciais['uf'] = $_POST['uf'];
$credenciais['numero'] = $_POST['numero'];
$credenciais['id_loja_fk'] = $_SESSION['id_loja'];

if($dao->cadastroEndereco($credenciais))
{
    $message = "Cadastrado com sucesso";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
    
   header('Location: ./minhaloja.php');
   exit;
    

 }
 else{

   header("Location: cadastroendereco.php");
}
?>