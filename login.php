<?php
	
	$login = $_POST['user'];
	$senha = $_POST['pass'];
	$entrar = $_POST['enviar'];
	$connect = new mysqli('localhost','root','','cgmsystem');

	if(isset($entrar)){
		$verifica = $connect -> query("SELECT * FROM administrador 
			WHERE Login = '$login' AND Senha = '$senha' ") 
			or die("Erro no Login");

		$rows = $verifica -> num_rows;
		if($rows <= 0){
			echo "<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html'; </script> ";
		die();
		
		}else{
			header("Location:inicial.php");
		}
	}

?>