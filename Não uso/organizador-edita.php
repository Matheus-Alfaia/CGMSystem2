<?php
	define("TITULO", "EDITAR PRODUTO");
	// include "nav.php";
	include "cabecalho.php";
	include_once "conn/conexao.php";
	include "organizador.php";
	if(isset($_GET['IdProduto'])){
		if(!isset($_GET['edita'])){
			$IdProduto = $_GET["IdProduto"];
			$produto = selecionaProdutos($conexao, $IdProduto);
			echo "<p>Edição do cadastro do Organizador <strong>$produto[Nome]</strong></p>";
			echo '<form action="" method="get">';
				echo 'Nome: <input type="text" name="nome" value="'.$produto["Nome"].'" required class="form-control"><br>';
				echo 'Imagem: <input type="text" name="img"  value="'.$produto["Imagem"].'" required class="form-control"><br>';
				echo 'Descrição: <input type="text" name="desc" value="'.$produto["Descricao"].'" required class="form-control"><br>';
				$fornecedor = listarFornecedor($conexao);
				echo '<div class="form-group">';
					echo '<label>';
					echo 'Fornecedores: <br>';
					echo '<select class="form-control" name="fornecedor">';
					foreach ($fornecedor as $for):
					echo '<option value="'.$for['IdFornecedor'].'">'.$for['Nome'].'</option>';
					endforeach;
					echo '</select>';
					echo '</label>';
					echo '</div>';
				echo '<input type="hidden" name="edita"><input type="hidden" name="IdProduto" value="'.$IdProduto.'">';
				echo '<input type="submit" class="btn btn-primary" value="Alterar" class="btn btn-primary">';	
			echo '</form>';
		}else{
			$nome 	= $_GET['nome'];
			$img 	= $_GET['img'];
			$desc 	= $_GET['desc'];
			$idFor 	= $_GET['fornecedor'];
			$idproduto= $_GET['IdProduto'];
			
			$edicao = alterarProduto($conexao, $nome, $img, $desc, $idFor, $idproduto);
			header("Location:organizador-listar.php");
			die();
			
	}
}else{
	echo "Error 404";
}
	include "rodape.php";
?>
