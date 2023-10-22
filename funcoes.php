<?php

// Inicio das funções do Produto

function cadastrarProduto($conexao, $nome, $imagem, $descricao,$idFornecedor,$valor_bruto, $valor_vendido, $localizacao, $material, $categoria){
	$query = mysqli_query($conexao, "INSERT INTO produto (NomeP, Imagem, Descricao, idFornecedor, valorBruto,valorVenda,localizacao, material, categoria) 
		VALUES 
				('$nome', '$imagem', '$descricao', '$idFornecedor', '$valor_bruto', '$valor_vendido', '$localizacao','$material','$	categoria')");
	return $query;
}

function cadastrarEntrega($conexao, $nota, $data, $info,$idProduto){
	$query = mysqli_query($conexao, "INSERT INTO entrada (nota, data, info, idProduto) 
		VALUES 
				('$nota', '$data', '$info', '$idProduto')");
	return $query;
}
	
function listarProduto($conexao){
	$query = mysqli_query($conexao, "SELECT * FROM produto");
	while($linha = mysqli_fetch_assoc($query)){
		$produtos[] = $linha;
	}
	return $produtos;
}

function alterarProduto($conexao, $nome, $imagem, $descricao, $valor_vendido, $quantidade, $tamanho, $idFornecedor, $idProduto){
	$query = mysqli_query($conexao, "UPDATE produto SET NomeP='{$nome}', Imagem='{$imagem}', Descricao='{$descricao}', Valor_Venda='{$valor_vendido}', Quantidade='{$quantidade}', Tamanho='{$tamanho}', IdFornecedor='{$idFornecedor}' WHERE IdProduto = '{$idProduto}'");
	return $query;
}

function selecionaProdutos($conexao, $produto){
	$query = mysqli_query($conexao, "SELECT * FROM produto WHERE IdProduto = ".$produto);
	$produto = mysqli_fetch_assoc($query);
	return $produto;
}

function selecionaQTDProdutos($conexao, $idproduto){
	$query = mysqli_query($conexao, "SELECT * FROM caracteristica_produto WHERE IdProduto = ".$idproduto);
	$produto = mysqli_fetch_assoc($query);
	return $produto;
}

function selecionarMaiorProd($conexao){
	$query = mysqli_query($conexao, "SELECT MAX(IdProduto) FROM produto");
	$produto = mysqli_fetch_assoc($query);
	return $query;
}

function alterarQTD($conexao, $idProduto, $quantidade){
	$query = mysqli_query($conexao, "UPDATE caracteristica_produto SET Quantidade = '{$quantidade}' WHERE IdProduto = '{$idProduto}'");
	return $query;
}

function alterarQTDMenos($conexao, $idProduto, $quanti){
	$query = mysqli_query($conexao, "UPDATE produto SET Quantidade = '$quanti' WHERE IdProduto = '{$idProduto}'");
	return $query;
}

function selecionaNome($conexao, $idprod){
	$query = mysqli_query($conexao, "SELECT NomeP FROM produto WHERE IdProduto = '{$idprod}'");
	return $query;
}


// Fim das funções do Produto

function entradaProduto($conexao, $idProduto, $idFornecedor , $quantidade, $codigo){
	$query = mysqli_query($conexao, "INSERT INTO relatorioentrada (idProduto, idFornecedor, quantidade, codigoBarra) VALUES ('$idProduto', '$idFornecedor' , '$quantidade', '$codigo')");
	return $query;
}

function saidaProduto($conexao, $idProduto, $quantidade, $tipoSaida){
	$query = mysqli_query($conexao, "INSERT INTO relatoriosaida (idProduto, quantidade, tipoSaida) VALUES ('$idProduto',  '$quantidade', '$tipoSaida')");
	return $query;
}

function listarRelatorio($conexao){
	$query = mysqli_query($conexao, "SELECT * FROM relatorioentrada");
	while($linha = mysqli_fetch_assoc($query)){
		$relEnt[] = $linha;
	}
	return $relEnt;
}

function listarRelatorioS($conexao){
	$query = mysqli_query($conexao, "SELECT * FROM relatoriosaida");
	while($linha = mysqli_fetch_assoc($query)){
		$relSai[] = $linha;
	}
	return $relSai;
}

// function listarProdRelEnt($conexao, $idprod){
// 	$query = mysqli_query($conexao, "SELECT NomeP FROM produto where IdProduto = (SELECT idProduto FROM relatorioentrada where idProduto = '$idprod')");
// 	while($linha = mysqli_fetch_assoc($query)){
// 		$proRelEnt[] = $linha;
// 	}
// 	return $proRelEnt;
// }

function listarProdRelEnt($conexao){
	$query = mysqli_query($conexao, "SELECT p.NomeP FROM produto AS p INNER JOIN relatorioentrada as r ON p.idProduto = r.idProduto");
	while($linha = mysqli_fetch_assoc($query)){
		$fornecedor[] = $linha;
	}
	return $fornecedor;
}

// Inicio das funções do Fornecedor

function cadastrarFornecedor($conexao, $nome, $descricao){
	$query = mysqli_query($conexao, "INSERT INTO fornecedor (Nome, Descricao) VALUES ('$nome', '$descricao')");
	return $query;
}

function listarFornecedor($conexao){
	$query = mysqli_query($conexao, "SELECT * FROM fornecedor");
	while($linha = mysqli_fetch_assoc($query)){
		$fornecedor[] = $linha;
	}
	return $fornecedor;
}

function alterarFornecedor($conexao, $nome, $descricao,$idfornecedor){
	$query = mysqli_query($conexao, "UPDATE fornecedor SET Nome='{$nome}', Descricao='{$descricao}' WHERE IdFornecedor = '{$idfornecedor}'");
	return $query;
}

function excluirFornecedor($conexao, $idFornecedor){
	$query = mysqli_query($conexao, "DELETE FROM fornecedor WHERE IdFornecedor = ".$idFornecedor);
	return $query;
}

function selecionarFornecedor($conexao,$idFornecedor){
	$query = mysqli_query($conexao, "SELECT * FROM fornecedor WHERE IdFornecedor = ".$idFornecedor);
	$fornecedor = mysqli_fetch_assoc($query);
	return $fornecedor;
}

// Fim das funções do Fornecedor

// Início das funções do Administrador

function cadastrarAdministrador($conexao, $login, $senha, $tipo){
	$query = mysqli_query($conexao, "INSERT INTO administrador (Login, Senha, Tipo) VALUES 	('$login', '$senha','$tipo')");
	return $query;
}
function listarAdministrador($conexao){
	$query = mysqli_query($conexao, "SELECT * FROM administrador");
	while($linha = mysqli_fetch_assoc($query)){
		$administrador[] = $linha;
	}
	return $administrador;
}
function alterarAdministrador($conexao, $login, $senha,$tipo,$idAdministrador){
	$query = mysqli_query($conexao, "UPDATE administrador SET Login='{$login}', Senha='{$senha}', Tipo='{$tipo}' WHERE IdAdministrador = '{$idAdministrador}'");
	return $query;
}

function excluirAdministrador($conexao, $idAdministrador){
	$query = mysqli_query($conexao, "DELETE FROM administrador  WHERE IdAdmin = '{$idAdministrador}'");
	return $query;
}
// Fim das funções do Administrador

// Início das funções do Custo Extra
function cadastrarCustoExtra($conexao, $idProduto, $valorSacola, $valorTag, $valorGasolina, $valorBrinde){
	$query = mysqli_query($conexao, "INSERT INTO (IdProduto, Valor_Sacola, Valor_Tag, Valor_Gasolina,Valor_Brinde) VALUES 	('$idProduto','$valorSacola', '$valorTag','$valorGasolina', $valorBrinde)");
	return $query;
}
function listarCustoExtra($conexao){
	$query = mysqli_query($conexao, "SELECT * FROM custo_extra");
	while($linha = mysqli_fetch_assoc($query)){
		$custo_extra[] = $linha;
	}
	return $custo_extra;
}

function alterarCustoExtra($conexao, $idProduto, $valorSacola, $valorTag, $valorGasolina, $valorBrinde,$idce){
	$query = mysqli_query($conexao, "UPDATE custo_extra SET IdProduto='{$idProduto}', Valor_Sacola='{$valorSacola}', Valor_Tag='{$valorTag}', Valor_Gasolina='{$valorGasolina}', Valor_Brinde='{$valorBrinde}' WHERE IdCE = '{$idce}'");
	return $query;
}

function excluirCustoExtra($conexao, $idce){
	$query = mysqli_query($conexao, "DELETE FROM custo_extra  WHERE IdCE = '{$idce}'");
	return $query;
}

// Fim das funções do Custo extra

// Início função Listar Fornecedor junto com Produto

function listarFornecedorEProd($conexao){
	$query = mysqli_query($conexao, "SELECT p.NomeP,f.Nome FROM produto AS p INNER JOIN fornecedor AS f ON p.IdFornecedor = f.IdFornecedor");
	while($linha = mysqli_fetch_assoc($query)){
		$fornecedor[] = $linha;
	}
	return $fornecedor;
}

function listarFornecedorProd($conexao, $idprod){
	$query = mysqli_query($conexao, "SELECT Nome FROM fornecedor where IdFornecedor = (SELECT IdFornecedor FROM produto where IdProduto = '$idprod')");
	while($linha = mysqli_fetch_assoc($query)){
		$fornecedor[] = $linha;
	}
	return $fornecedor;
}

function listarAcessoUnido($conexao){
	$query = mysqli_query($conexao," SELECT Login, Tipo FROM administrador UNION SELECT Login, Tipo FROM funcionario");
	while($linha = mysqli_fetch_assoc($query)){
		$acesso[] = $linha;
	}
	return $acesso;
}

function listarProdutoLike($conexao,$pesquisa){
    $query = mysqli_query($conexao,"SELECT * FROM produto WHERE Nome LIKE '$pesquisa%'");
    while($linha = mysqli_fetch_assoc($query)){
        $produtos[] = $linha;
    }
    return $produtos;
}

// function listarFornecedorProdGroup($conexao,$idprod){
// 	$query = mysqli_query($conexao, "SELECT Nome FROM fornecedor where IdFornecedor = (SELECT IdFornecedor FROM produto where IdProduto = '$idprod') GROUP BY Nome");
// 	while($linha = mysqli_fetch_assoc($query)){
// 		$fornecedor[] = $linha;
// 	}
// 	return $fornecedor;
// }

// function listarProd($conexao,$idprod){
// 	$query = mysqli_query($conexao, "SELECT Nome FROM produto where IdFornecedor = (SELECT IdFornecedor FROM fornecedor where IdProduto = '$idprod')");
// 	while($linha = mysqli_fetch_assoc($query)){
// 		$fornecedor[] = $linha;
// 	}
// 	return $fornecedor;
// }

// Fim função Listar Fornecedor junto com Produto

// Início das funções da Caracteristica do Produto
function cadastrarCaracProd($conexao, $idProduto, $valor_bruto, $valor_vendido, $quantidade, $tamanho, $modelo){
	$query = mysqli_query($conexao, "INSERT INTO caracteristica_produto (IdProduto, Valor_Bruto, Valor_Vendido, Quantidade,Tamanho, Modelo) VALUES ('$idProduto','$valor_bruto', '$valor_vendido','$quantidade', '$tamanho','$modelo')");
	return $query;
}
function listarCaracProd($conexao){
	$query = mysqli_query($conexao, "SELECT * FROM caracteristica_produto");
	while($linha = mysqli_fetch_assoc($query)){
		$caracteristica_produto[] = $linha;
	}
	return $caracteristica_produto;
}

function listarCaracProdEsp($conexao,$idprod){
	$query = mysqli_query($conexao, "SELECT * FROM caracteristica_produto where IdProduto = '$idprod'");
	while($linha = mysqli_fetch_assoc($query)){
		$caracteristica_produto[] = $linha;
	}
	return $caracteristica_produto;
}

function alterarCaracProd($conexao, $idProduto, $valor_bruto, $valor_vendido, $quantidade, $tamanho, $modelo,$idcp){
	$query = mysqli_query($conexao, "UPDATE caracteristica_produto SET IdProduto='{$idProduto}', Valor_Bruto='{$valor_bruto}', Valor_Vendido='{$valor_vendido}',Quantidade='{$quantidade}', Tamanho='{$tamanho}', Modelo='{$modelo}' WHERE IdCP = '{$idcp}'");
	return $query;
}

function excluirCaracProd($conexao, $idcp){
	$query = mysqli_query($conexao, "DELETE FROM caracteristica_produto  WHERE IdCP = '{$idcp}'");
	return $query;
}
// Fim das funcões da Caracteristica do Produto

// Início das funções do Cliente
function cadastrarCliente($conexao, $nome){
	$query = mysqli_query($conexao, "INSERT INTO  (Nome) VALUES ('$nome')");
	return $query;
}
function listarCliente($conexao){
	$query = mysqli_query($conexao, "SELECT * FROM cliente");
	while($linha = mysqli_fetch_assoc($query)){
		$cliente[] = $linha;
	}
	return $cliente;
}

function alterarCliente($conexao, $nome, $idCliente){
	$query = mysqli_query($conexao, "UPDATE cliente SET Nome='{$nome}' WHERE IdCliente = '{$idCliente}'");
	return $query;
}

function excluirCliente($conexao, $idCliente){
	$query = mysqli_query($conexao, "DELETE FROM cliente  WHERE idCliente = '{$idCliente}'");
	return $query;
}
// Fim das funções do Cliente

?>