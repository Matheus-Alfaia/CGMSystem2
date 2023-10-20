		<!-- Início Menu -->

	<?php
		session_start();
		//include "funcoes.php";

		if (isset($_GET['IdProduto'])) {
			$produto_id = $_GET['IdProduto'];
		
			// Verifique se o produto já existe no carrinho
			if (isset($_SESSION['carrinho'][$produto_id])) {
				// O produto já está no carrinho, exiba o formulário para ajustar a quantidade
				echo "<form method='post' action='AdicionarQtdCarrinho.php'>";
				echo "<input type='number' name='quantidade' value='" . $_SESSION['carrinho'][$produto_id] . "'>";
				echo "<input type='hidden' name='produto_id' value='$produto_id'>";
				echo "<input type='submit' value='Atualizar Quantidade'>";
				echo "</form>";
			} else {
				// O produto não está no carrinho, exiba o formulário para adicionar a quantidade
				echo "<form method='post' action='AdicionarQtdCarrinho.php'>";
				echo "<input type='number' name='quantidade' value='1'>";
				echo "<input type='hidden' name='produto_id' value='$produto_id'>";
				echo "<input type='submit' value='Adicionar ao Carrinho'>";
				echo "</form>";
			}
		
			//$quantidade_disponivel = calcularQuantidadeDisponivel($produto_id, $_SESSION['carrinho'][$produto_id]);
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

		if (isset($_SESSION['carrinho'])) {
			foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
				// Exibir os detalhes do produto no carrinho
				//$quantidade_disponivel = calcularQuantidadeDisponivel($produto_id, $quantidade);
			// Exibir os detalhes do produto no carrinho, incluindo a quantidade disponível
			echo "Produto ID: $produto_id | Quantidade no Carrinho: $quantidade <br>";
			}
		} else {
			echo "Seu carrinho está vazio.";
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
				define("TITULO", "CADASTRO DE PRODUTOS");
				include "cabecalho.php";
				include_once "conn/conexao.php";
				include "funcoes.php";
				include "rodape.php";

				echo "<div class='listar-all'>";
					$produto 	= listarProduto($conexao);
					$carac		= listarCaracProd($conexao);
					foreach ($produto as $p):
						$idprod = $p['IdProduto'];
						echo "<div class='produto h-100 card-color'>";
							echo "<div class='card-body'>";
								echo '<center><h3 class="color-name">'.$p['NomeP'].': ('.$p['Quantidade'].')</h3></center>';
								echo '<div class="img">';
									echo '<img src="Produtos/'.$p['Imagem'].'">';
								echo "</div>";
							echo "</div>";
							echo "<div class='card-button'>";
								echo "<div class='text-center'>";
								// echo '<a class="btn btn-outline-warning" href="AdicionarProduto.php?IdProduto='.$p['IdProduto'].'">Adicionar</a><br>';
								
								//echo '<a class="btn btn-outline-warning retirar" href="carrinho.php">Adicionar ao Carrinho</a><br>';
									echo"<div class='btn btn-outline-warning retirar'>";	
										echo"<a href='Listar-Produto-Catalogo.php'>";
											echo'<div class="card">';
												echo'<div class="img">';
													echo"<i class='bx bxs-cart'></i>";
												
												echo'</div>';
											echo'</div>';
										echo'</a>';
									echo"</div>";			
								echo "</div>";
							echo "</div>";
						echo "</div>";
					endforeach;
					
				echo "</div>";
			?>
		</div>

		</script>
			

