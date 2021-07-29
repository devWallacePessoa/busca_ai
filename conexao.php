<?php
	$servidor = "localhost";
	$usuario = "root";
	$dbname = "buscaai";
	$senha = "12info#$";
	
	$conn = mysqli_connect($servidor, $usuario,$senha,$dbname);
	if (!$conn){
		die("Conexão falhou:" . mysqli_connect_error());
	} else {
		echo 'conexao ok';
	}
?>
