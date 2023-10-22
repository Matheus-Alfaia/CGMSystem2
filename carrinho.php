
<?php



 session_start();
    include_once "conn/conexao.php";
    include "funcoes.php";



    if (isset($_GET['IdProduto'])) {

        $produto_id = $_GET['IdProduto'];
    
        // Verifica se o produto já existe no carrinho
        if (isset($_SESSION['carrinho'][$produto_id])) {
            // O produto já está no carrinho, exiba o formulário para ajustar a quantidade
            echo "<div class='listar-all'>";
            echo "<form method='post' action='AdicionarQtdCarrinho.php'>";
            echo "<label for='tamanho'>Tamanho:</label>";
            echo "<select name='tamanho' id='tamanho'>";
            $carac = listarCaracProd($conexao);
            $produto_id = $_GET['IdProduto']; // Certifique-se de obter o ID do produto selecionado

            foreach ($carac as $c) {
                if ($c['IdProduto'] == $produto_id) {
                    $tamanho = $c['Tamanho'];
                    $quantidade = $c['Quantidade'];

                    if ($quantidade > 0) {
                        echo "<option value='$tamanho'>$tamanho</option>";
                    }
                }
            }
            
            echo "</select>";
            echo "<br>";
            echo "<label for='quantidade'>Quantidade:</label>";
            echo "<input type='number' name='quantidade' value='" . $_SESSION['carrinho'][$produto_id] . "'>";
            echo "<input type='hidden' name='produto_id' value='$produto_id'>";
            echo "<input type='submit' value='Atualizar Quantidade'>";
            echo "</form>";
            echo "</div>";
        } else {
            // O produto não está no carrinho, exiba o formulário para adicionar a quantidade
            echo "<div class='listar-all'>";
            echo "<form method='post' action='AdicionarQtdCarrinho.php'>";
            echo "<label for='tamanho'>Tamanho:</label>";
            echo "<select name='tamanho' id='tamanho'>";
            echo "<option value='P'>P</option>";
            echo "<option value='M'>M</option>";
            echo "<option value='G'>G</option>";
            echo "</select>";
            echo "<br>";
            echo "<label for='quantidade'>Quantidade:</label>";
            echo "<input type='number' name='quantidade' value='1'>";
            echo "<input type='hidden' name='produto_id' value='$produto_id'>";
            echo "<input type='submit' value='Adicionar ao Carrinho'>";
            echo "</form>";
            echo "</div>";
        }
    
    }
    
    
    // Função para remover um produto do carrinho
    if (isset($_GET['remove'])) {
        $produto_id = $_GET['remove'];
        if (isset($_SESSION['carrinho'][$produto_id])) {
            if ($_SESSION['carrinho'][$produto_id] > 1) {
                $_SESSION['carrinho'][$produto_id]--;
            } else {
                unset($_SESSION['carrinho'][$produto_id]);
            }
        }
    }
?>
    <div class="sidebar close">
        <div class="logo-details">
            <a href="menuInicial.php">
                <i class='bx bxs-store-alt'></i>
            </a>
            <span class="logo-name">Afrodite Moda's</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="Pesquisar-Produto.php">
                    <i class='bx bx-search-alt-2'></i>
                    <span class="link-name">PESQUISA</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link-name" href="Pesquisar-Produto.php">PESQUISA</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-group'></i>
                        <span class="link-name">ADMINISTRADOR</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="">ADMINISTRADOR</a></li>
                    <li><a href="Cadastro-Administrador.php">Cadastar Administrador</a></li>
                    <li><a href="#">Visualizar Administrador</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-closet'></i>
                        <span class="link-name">PRODUTO</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="">PRODUTO</a></li>
                    <li><a href="Cadastro-Produto.php">Cadastar Produto</a></li>
                    <li><a href="Listar-Produto.php">Visualizar Produto</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bxs-truck'></i>
                        <span class="link-name">FORNECEDOR</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="">FORNECEDOR</a></li>
                    <li><a href="Cadastro-Fornecedor.php">Cadastar Fornecedor</a></li>
                    <li><a href="Listar-Fornecedor.php">Visualizar Fornecedor</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="#">
                        <i class='bx bx-detail'></i>
                        <span class="link-name">RELATÓRIOS</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="">RELATÓRIOS</a></li>
                    <li><a href="Listar-Relatorios-Entrada.php">Visualizar Relatórios de Entrada</a></li>
                    <li><a href="Listar-Relatorios-Saida.php">Visualizar Relatórios de Saída</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-link">
                    <a href="index.html">
                        <i class='bx bx-log-out'></i>
                        <span class="link-name">SAIR</span>
                    </a>
                </div>
            </li>
        </ul>	
    </div>

    <div class="home-section">
        <div class="home-content">
        <i class='bx bx-menu'></i>
        <!-- <button type="button" id="finalizar_venda" class="btn btn-primary">Finalizar Venda</button> -->
        </div>

        <?php
            define("TITULO", "CARRINHO");
            include "cabecalho.php";
            include_once "conn/conexao.php";
            include "funcoes.php";
            include "rodape.php";
            
            echo "<div class='listar-all'>";
					echo "<div class='produto h-100 card-color'>";
						echo "<div class='card-button'>";
							echo "<div class='text-center'>";
								echo '<a class="btn btn-outline-warning retirar" href="decremento.php"> Finalizar Venda</a><br>';
                                echo '<a class="btn btn-outline-warning retirar" href="Listar-Produto-Catalogo.php"> Voltar</a><br>';		
								echo "</div>";
						    echo "</div>";
				        echo "</div>";
				    echo "</div>";        
            echo "<div class='listar-all'>";
            $produto 	= listarProduto($conexao);
            $carac		= listarCaracProd($conexao);
            if(isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])){
                foreach ($_SESSION['carrinho'] as $produto_id => $quantidade){
                    foreach ($produto as $p):
                        //$idprod = $p['IdProduto'];
                        if ($p['IdProduto']==$produto_id){
                            
                            echo "<div class='produto h-100 card-color'>";
                                echo "<div class='card-body'>";
                                    echo '<center><h3 class="color-name">'.$p['NomeP'].':('.$quantidade.')</h3></center>';
                                    echo '<div class="img">';
                                        echo '<img src="Produtos/'.$p['Imagem'].'">';
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='card-button'>";
                                    echo "<div class='text-center'>";
                                    
                                    echo '<a class="btn btn-outline-warning retirar" href="carrinho.php?remove='.$p['IdProduto'].'">Retirar</a>';
                                        		
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                        
                        
                    endforeach;
                }
                

            }
                            
        echo "</div>"
        ?>
    </div>

    </script>
        



