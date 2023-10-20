<?php

include_once "conn/conexao.php";
include "funcoes.php";

if(isset($_GET['IdProduto'])){
    $idProduto = $_GET["IdProduto"];

    $result = selecionaQTDProdutos($conexao, $idProduto);
    $result['Quantidade'];
    if($result['IdProduto'] == $idProduto){
        $quantidade = $result['Quantidade'];
        $quantidade += 1;
        $produto = alterarQTD($conexao, $idProduto, $quantidade);
        echo "<meta http-equiv='refresh' content='0;Listar-Produto.php'></meta>";
    }
}

?>