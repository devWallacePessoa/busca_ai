<?php
require_once("Dao.php");
$dao = new Dao();

$email = $_POST['email'];
$senha = $_POST['senha'];
$retorno  = $dao->logar($email,$senha);
if($retorno){
    header('Location: principal.php');
} else { 

    header('Location: errologin.php');
   
    
}

?>


