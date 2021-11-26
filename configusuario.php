<?php

require_once '../Dao/Usuario.php';
  $usuario = new Usuario;
  session_start();

if(isset($_FILES['pic']))
 {
    $id = $_SESSION['id'];
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = '../imagensProduto'; //Diretório para uploads 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo("Imagem enviada com sucesso!"); 
    echo "</br>";
    $caminho = $dir.$new_name;
  }
 var_dump($caminho);
  if($usuario->editarImagem($id, $caminho)){
    echo "Deu Certo";
    header('Location: ./perfil.php');
  }else {
    echo "deu ruim";
  }

?>