<?php

include_once "conn/conexao.php";
include "funcoes.php";

if(isset($_GET['finalizar_venda'])){
    foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
        $idProduto = $_GET["IdProduto"];

        $result = selecionaQTDProdutos($conexao, $idProduto);
        $result['Quantidade'];
        if($result['IdProduto'] == $idProduto){
            $quantidade = $result['Quantidade'];
            if($quantidade > 0){
                $quantidade -= 1;
                $produto = alterarQTD($conexao, $idProduto, $quantidade);
                echo "<meta http-equiv='refresh' content='0;Listar-Produto.php'></meta>";
            }else{
                echo "<script language='javascript' type='text/javascript'>alert('Impossível decrementar! Quantidade do Produto é 0');window.location.href='Listar-Produto.php'; </script> ";
            }
            
        }
    }
}

?>