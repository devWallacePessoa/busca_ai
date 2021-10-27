<?php
	$servidor = "localhost";
	$usuario = "root";
	$dbname = "banco_buscaai";
	$senha = "";
	
	$conn = mysqli_connect($servidor, $usuario,$senha,$dbname);
	if (!$conn){
		die("Conexão falhou:" . mysqli_connect_error());
	} else {
		echo 'conexao ok';
	}
?>
