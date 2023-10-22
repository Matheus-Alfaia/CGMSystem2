		

	<?php
		session_start();	
		
		// Função para remover um produto do carrinho

		// if (isset($_SESSION['carrinho'])) {
		// 	foreach ($_SESSION['carrinho'] as $produto_id => $quantidade) {
		// 		// Exibir os detalhes do produto no carrinho
		// 		//$quantidade_disponivel = calcularQuantidadeDisponivel($produto_id, $quantidade);
		// 	// Exibir os detalhes do produto no carrinho, incluindo a quantidade disponível
		// 	echo "Produto ID: $produto_id | Quantidade no Carrinho: $quantidade <br>";
		// 	}
		// } else {
		// 	echo "Seu carrinho está vazio.";
		// }

		
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
				define("TITULO", "CATÁLOGO DE PRODUTOS");
				include "cabecalho.php";
				include_once "conn/conexao.php";
				include "funcoes.php";
				include "rodape.php";
				

				echo "<div class='listar-all'>";
					echo "<div class='produto h-100 card-color'>";
						echo "<div class='card-button'>";
							echo "<div class='text-center'>";
								echo '<a class="btn btn-outline-warning" href="AdicionarProduto.php">Adicionar +</a><br>';
											
										//echo'</a>';
									//echo"</div>";			
								echo "</div>";
						echo "</div>";
				echo "</div>";
				echo "</div>";
				echo "<div class='listar-all'>";
					$produto 	= listarProduto($conexao);
					$carac		= listarCaracProd($conexao);
					foreach ($produto as $p):
						$idprod = $p['IdProduto'];
						$quantidade = NULL;
						foreach ($carac as $c){
							if ($c['IdProduto'] == $idprod) {
								$quantidade = $c['Quantidade']; 
								break;
							}
						}
						echo "<div class='produto h-100 card-color'>";
							echo "<div class='card-body'>";
								echo '<center><h3 class="color-name">'.$p['NomeP'].'</h3></center>';
								echo '<div class="img">';
									echo '<img src="Produtos/'.$p['Imagem'].'">';
								echo "</div>";
							echo "</div>";
							echo "<div class='card-button'>";
								echo "<div class='text-center'>";
								
											echo'<div class="card">';
												echo'<div class="img">';
												if ($quantidade > 0) {
													// Se a quantidade for maior que 0, o botão é habilitado
													echo '<a class="btn btn-outline-warning" href="carrinho.php?IdProduto=' . $p['IdProduto'] . '">Adicionar ao carrinho</a><br>';
												} else {
													// Se a quantidade for igual a 0, o link é desabilitado
													echo '<span class="btn btn-outline-warning" onclick="return false;">Indisponivel</span><br>';
												}
												
												echo'</div>';
											echo'</div>';
										//echo'</a>';
									//echo"</div>";			
								echo "</div>";
							echo "</div>";
						echo "</div>";
						
					endforeach;
					
				echo "</div>";
			?>
		</div>

		</script>
			

