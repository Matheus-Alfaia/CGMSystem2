<?php
session_start();

// Verifique se o carrinho está vazio
if (empty($_SESSION['carrinho'])) {
    $_SESSION['mensagem_erro'] = "Seu carrinho está vazio. Adicione produtos ao carrinho antes de finalizar a compra.";
    header("Location: Listar-Produto-Catalogo.php"); // Redirecione para a página do carrinho
    exit;
}

include_once "conn/conexao.php";
include "funcoes.php";

foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
    $result = selecionaQTDProdutos($conexao, $produto_id);
    $quantidade_no_banco = $result['Quantidade'];

    // Verifique se a quantidade no carrinho é maior que zero e menor ou igual à quantidade no banco de dados
    if ($quantidade > 0 && $quantidade <= $quantidade_no_banco) {
        // Atualize a quantidade no banco de dados
        $nova_quantidade = $quantidade_no_banco - $quantidade;
        $produto = alterarQTD($conexao, $produto_id, $nova_quantidade);

        // Aqui, você pode realizar outras ações, como processar o pagamento, enviar e-mails, etc.

        // Remova o produto do carrinho, já que a compra foi concluída
        unset($_SESSION['carrinho'][$produto_id]);
    } else {
        // Trate o erro, por exemplo, quantidade insuficiente em estoque
        $_SESSION['mensagem_erro'] = "Erro na finalização da compra: quantidade insuficiente em estoque para o produto com ID $produto_id.";
        header("Location: Listar-Produto-Carrinho.php"); // Redirecione para a página do carrinho
        exit;
    }
}

// Redirecione para uma página de confirmação da compra
header("Location: menuInicial.php");
exit;
?>


