<?php

require_once("./Dao.php");
//$id= $this->dao->lastInsertId();

date_default_timezone_set("America/Sao_Paulo");

$dao = new Dao();

session_start();

$credenciais['email'] = $_POST['email_cont'];
$credenciais['telefone'] = $_POST['telefone_cont'];
$credenciais['celular'] = $_POST['celular_cont'];
$credenciais['celular2'] = $_POST['celular2_cont'];
$credenciais['id_loja_fk'] = $_SESSION['id_loja'];

if($dao->cadastroContato($credenciais))
{
    $message = "Cadastrado com sucesso!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    
    
   header('Location: ./principal.php');
   exit;
    

 }
 else{

   header("Location: cadastroendereco.php");
}
?>