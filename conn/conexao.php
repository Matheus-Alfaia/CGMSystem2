<?php
	$servidor 	= "localhost";
	$usuario 	= "root";
	$senha 		= "";
	$banco		= "cgmsystem";
	
	$conexao = mysqli_connect($servidor, $usuario, $senha, $banco) or die ("Erro ao conectar ao banco de dados");
	mysqli_set_charset($conexao, "utf8");
#$connecta
?>