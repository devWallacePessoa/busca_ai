<?php

require_once("Dao.php");
$dao = new Dao();
$dao->cadastro($_POST);
echo '<pre>';
print_r($_POST);
	include_once("conexao.php");
	if($_POST['senha']==$_POST['confsenha']){
		echo 'senha ok';
	} else { 
		echo 'senhas  inválidas';
	}
	$cep = mysqli_real_escape_string($conn, $_POST['cep']);
	$endereco = mysqli_real_escape_string($conn, $_POST['rua']);
	$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
	$cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
	$estado = mysqli_real_escape_string($conn, $_POST['uf']);
	
	$result_usuario = "INSERT INTO usuarios (
		cep, 
		endereco, 
		bairro, 
		cidade, 
		estado, 
		created) VALUES (
		'$cep', 
		'$endereco', 
		'$bairro', 
		'$cidade', 
		'$estado',  
		NOW())";
		$resultado_usuario = mysqli_query($conn, $result_usuario); 

include_once("conexao.php");

	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$telefone = $_POST["telefone"];
	$senha = $_POST["senha"];
	$confsenha = $_POST;
	$cpf = $_POST["cpf"];
	$datadenasc = $_POST["datadenasc"];
	$cep = $_POST["cep"];
	$estado = $_POST["uf"];
	$cidade = $_POST["cidade"];
	$bairro = $_POST["bairro"];
	$rua = $_POST["rua"];
	$numero = $_POST["numero"];

	$conn = mysqli_connect($servidor, $usuario, $dbname, $senha);
	mysqli_select_db($conn, $dbname);
	$sql = "INSERT INTO usuario (nome, email, telefone, senha, cpf, datadenasc, cep, estado, cidade, bairro, rua, numero) 
	VALUES ('$nome', '$email', '$telefone', '$senha', '$cpf', '$datadenasc', '$cep', '$estado', '$cidade', '$bairro', '$rua', '$numero')";
	if (mysqli_query($conn, $sql)){
		echo "<script>alert('Seus dados foram salvos!'); window.location = 'index.php';</script>";
	}else{
		echo "Alguma coisa está errada!" . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);




?>
