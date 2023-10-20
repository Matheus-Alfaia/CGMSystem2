<?php
	include "cabecalho.php";
	include_once "conn/conexao.php";
	include "organizador.php";
	
	
		$idprod = $_GET["IdProduto"];
		$prod = excluirProduto($conexao, $idprod);
		
		header("Location:organizador-listar.php?removido=1&organizador={$organizador}");
		die();
	include "rodape.php";
?> 
