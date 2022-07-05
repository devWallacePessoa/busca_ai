<?php 
session_start();
include "Dao.php"; 
$dao = new Dao(); 


$id = $_POST['MLidProduto']; 

echo $id;

if($dao->DeletarProd($id))
{
    $message = "Deletado com sucesso";
    echo "<script type='text/javascript'>alert('$message');
    window.location = "/minhaloja.php"; </script>";
}

else
{
    echo "deu ruim";
}
    
    
 
    

?>

<br> <p>



