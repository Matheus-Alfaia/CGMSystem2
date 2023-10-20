<?php
	define("TITULO", "PRODUTOS");
	include "menu.php";
	include "cabecalho.php";
	include_once "conn/conexao.php";
	include "organizador.php";
	// echo '<a href="inicial.php"><input type="button" value="HOME" class="btn btn-danger"></a><br>';
	echo '<table class="table table-striped table-bordered">';
		echo '<tr> <th>Nº</th><th>Nome</th><th>Imagem</th><th>Descrição</th><th>IdForncedor</th><th>Cadastro</th><th>Editar</th><th>Excluir</th></tr>';
		
		$produtos = listarProduto($conexao);
		$n = 1;

		// $organizadores = listarOrganizador($conexao);
		// $n = 1;
		// echo "Total: ".count($organizadores);
		foreach($produtos as $linha){
			echo '<tr>';
			echo '<td>'.$n.'</td>';
			echo '<td>'.$linha["Nome"].'</td>';
			echo '<td>'.$linha["Imagem"].'</td>';
			echo '<td>'.$linha["Descricao"].'</td>';
			echo '<td>';
			$idprod = $linha["IdProduto"];
			$fornecedor = listarFornecedorProd($conexao,$idprod);
			foreach ($fornecedor as $for):
				echo '<option value="For">'.$for['Nome'].'</option>';
			endforeach;
			echo '</td>';
			//echo '<td>'.$linha["IdFornecedor"].'</td>';
			echo '<td><a href="organizador-perfil.php?IdProduto='.$linha["IdProduto"].'">Ver</a></td>';
			echo '<td><a href="organizador-edita.php?IdProduto='.$linha["IdProduto"].'">Editar</a></td>';
			echo '<td><a href="organizador-excluir.php?IdProduto='.$linha["IdProduto"].'">Excluir</td></tr>';
			echo '</tr>';
			$n += 1;
		}
	echo "</table>";
	include "rodape.php";
?>