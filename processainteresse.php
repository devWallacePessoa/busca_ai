<?php include "Dao.php"; 

$dao = new Dao(); 
session_start();
?>

<?php
if(isset($_SESSION['id'])){
    
    $id_prod = $_SESSION['id_prod'] ;
    $id_user = $_SESSION['id'];
    $id_loja = $_SESSION['idLoja'];

    $credenciais['id_produto_interesse_fk'] = $id_prod;
    $credenciais['id_usuario_interesse_fk'] = $id_user;
    $credenciais['id_loja_interesse_fk'] = $id_loja;

    
 if($dao->CadastroInteresse($credenciais)){
   $message = "interesse registrado";
    echo "<script type='text/javascript'>alert('$message');</script>";

        header('Location: ./interessepronto.php');
   }
    

}   
else {
    $message = "Faça login para demonstrar interesse em um item";
echo "<script type='text/javascript'>alert('$message');</script>";

include "index.php";
}
?>