<?php
	include_once "conn/conexao.php";
	include "funcoes.php";
	
		$idFornecedor = $_GET["IdFornecedor"];
		$fornecedor = excluirFornecedor($conexao, $idFornecedor);
		
		echo "<meta http-equiv='refresh' content='0;Listar-Fornecedor.php?'></meta>";
	include "rodape.php";
?>