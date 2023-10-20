<?php
	define("TITULO", "PERFIL DOS PRODUTO");
	include "nav.php";
	include "cabecalho.php";
	include_once "conn/conexao.php";
	include "organizador.php";
	if(isset($_GET['IdProduto'])){
		$produto = $_GET["IdProduto"];
		$produto = selecionaProdutos($conexao, $produto);
		echo '<table class="table table-bordered">';
		echo "<tr><td>Nome: </td><td>".$produto["Nome"]."</td></tr>";
		echo "<tr><td>Imagem: </td><td>".$produto["Imagem"]."</td></tr>";
		echo "<tr><td>Descrição: </td><td>".$produto["Descricao"]."</td></tr>";
		echo '</table>';
		// echo '<a href="organizador-listar.php"><input type="button" value="voltar" class="btn btn-danger"></a>';
	}else{
		echo "erro";
	}
	include "rodape.php";
?>