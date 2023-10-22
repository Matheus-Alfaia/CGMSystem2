<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['produto_id']) && isset($_POST['quantidade'])) {
        $produto_id = $_POST['produto_id'];
        $quantidade = (int)$_POST['quantidade'];

        // Certifique-se de que a quantidade seja um número positivo
        if ($quantidade > 0) {
            // Verifique se o produto já existe no carrinho
            if (isset($_SESSION['carrinho'][$produto_id])) {
                // Se o produto já existe, adicione a nova quantidade à quantidade existente
                $_SESSION['carrinho'][$produto_id] += $quantidade;
            } else {
                // Se o produto não existe no carrinho, defina a nova quantidade
                $_SESSION['carrinho'][$produto_id] = $quantidade;
            }
        }
    }
}

header("Location: carrinho.php"); // Redirecione para a página do carrinho
exit;
?>
