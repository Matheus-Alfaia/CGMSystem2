<?php
	// include "cabecalho.php";
	include_once "conn/conexao.php";
	include "funcoes.php";

	if(isset($_GET['IdAdmin'])){
        $idAdministrador = $_GET["IdAdmin"];
        $admin = excluirAdministrador($conexao, $idAdministrador);
    }else{
        echo "Error 404";
    }
		
	echo "<meta http-equiv='refresh' content='0;Listar-Administrador.php?'></meta>";
	include "rodape.php";
?>