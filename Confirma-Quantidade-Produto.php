<?php
    session_start();

    define("TITULO", "CONFIRMA QUANTIDADE DE PRODUTOS");
				include "cabecalho.php";
				include_once "conn/conexao.php";
				include "funcoes.php";
				include "rodape.php";

     echo "<div class='card-body'>";
     echo "<form method='post' action='AdicionarQtdCarrinho.php'>";
     echo "<label for='tamanho'>Tamanho:</label>";
     echo "<select name='tamanho' id='tamanho'>";
     echo "<option value='P'>P</option>";
     echo "<option value='M'>M</option>";
     echo "<option value='G'>G</option>";
     echo "</select>";
     echo "<br>";
     echo "<label for='quantidade'>Quantidade:</label>";
     echo "<input type='number' name='quantidade' value='" . $_SESSION['carrinho'][$produto_id] . "'>";
     echo "<input type='hidden' name='produto_id' value='$produto_id'>";
     echo "<input type='submit' value='Atualizar Quantidade'>";
     echo "</form>";
     echo "</div>";
?>