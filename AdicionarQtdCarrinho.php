<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['produto_id']) && isset($_POST['quantidade'])) {
        $produto_id = $_POST['produto_id'];
        $quantidade = (int)$_POST['quantidade'];

        // Certifique-se de que a quantidade seja um número positivo
        if ($quantidade > 0) {
            // Adicione ou atualize a quantidade no carrinho
            $_SESSION['carrinho'][$produto_id] = $quantidade;
        }
    }
}

header("Location: Listar-Produto-Catalogo.php"); // Redirecione para a página do carrinho
exit;
?>
