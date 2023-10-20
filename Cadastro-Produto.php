<!-- Início Menu -->

<?php

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

	<!-- Fim Menu -->

	<!-- Sessão de Cadastro -->

	<div class="home-section">
	    <div class="home-content">
	      <i class='bx bx-menu'></i>
	    </div><?php
			define("TITULO", "CADASTRO DE PRODUTOS");
			include "cabecalho.php";
			include_once "conn/conexao.php";
			include "funcoes.php";
			if(!isset($_GET['cadastro'])){
				echo "<div class='letter-normal'>";
				echo '<div>';
						echo '<img class="imgP" src="img/icone2.jpg" ">';
					echo "</div>";
					echo "<h1>Cadastro Produto</H1>";
				echo "</div>";
				echo "<div class='cadastro-principal'>";
					echo "<div class='card-cadastro'>";
						echo '<form action="" method="get">'; #enctype="multipart/form-data"
						echo '<fieldset>';
						echo "<legend>Geral</legend>";
							echo '<div class="grupo-form1">';
							echo '<label> Nome: </label>';
							echo '<input type="text" class="controle-nome" name="nome" autocomplete="off" required>';
							echo '<label> Imagem: </label>';
							echo '<input type="file" class="controle-img" name="imagem" id="imagem" onchange="previewImagem()">';
							$fornecedor = listarFornecedor($conexao);
							echo '<label> Fornecedores </label>';
								echo '<select name="fornecedor">';
								foreach ($fornecedor as $for):
								echo '<option value="'.$for['IdFornecedor'].'">'.$for['Nome'].'</option>';
								endforeach;
								echo '</select>';
								echo "<br>";
							echo '<textarea rows="5" cols="140" placeholder="Descrição" name="desc"></textarea>';
							echo '<label> Valor a ser vendido: R$</label>';
							echo '<input type="text" class="controle-num2" name="vendido" autocomplete="off" required>';
							echo '<label> Quantidade: </label>';
							echo '<input type="text" class="controle-qtd" name="qtd" autocomplete="off" required>';
							echo '<label class="extra2"> Tamanho: </label>';
							echo '<input type="text" class="controle-outros" name="tam" autocomplete="off" required>';
						echo '</fieldset>';
						echo '<button type="submit" class="btn-cadastro-normal" value="Cadastrar" name="cadastro">CADASTRAR</button>';
						echo '</div>';
					echo '</form></center>';
					echo "</div>";
				echo "</div>";
			}else{
				$nome 			= $_GET['nome'];
				$imagem 		= $_GET['imagem'];
				$descricao 		= $_GET['desc'];
				$idFornecedor 	= $_GET['fornecedor'];
				// $valor_bruto	= $_GET['bruto'];
				$valor_vendido 	= $_GET['vendido'];
				$quantidade 	= $_GET['qtd'];
				$tamanho		= $_GET['tam'];
				// $modelo	 		= $_GET['modelo']; 

				$cp = listarProduto($conexao);
				$maior = 0;

				foreach ($cp as $cac):
					if($cac['IdProduto'] > $maior){
						$maior = $cac['IdProduto'];
					}
				endforeach;

				$idProduto = $maior+1;
				
				$cadastro = cadastrarProduto($conexao, $nome, $imagem, $descricao, $valor_vendido, $quantidade, $tamanho, $idFornecedor);
				// $cadastro1 = cadastrarCaracProd($conexao, $idProduto, $valor_bruto, $modelo);
				echo "<meta http-equiv='refresh' content='0;Listar-Produto-Catalogo.php'></meta>";
				// 
				// die();
			}
			include "rodape.php";?>
	</div>

	<!-- Fim Sessão de Cadastro -->
	
	<!-- Sessão de Script -->

	<script>
		let arrow = document.querySelectorAll(".arrow");
		
		for(var i = 0; i < arrow.length; i++){
			arrow[i].addEventListener("click",(e)=>{
				let arrowParent = e.target.parentElement.parentElement;
				arrowParent.classList.toggle("showMenu");
			});
		}
		let sidebar = document.querySelector(".sidebar");
  		let sidebarBtn = document.querySelector(".bx-menu");
  		console.log(sidebarBtn);
  		sidebarBtn.addEventListener("click", ()=>{
    		sidebar.classList.toggle("close");
  		});
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>	
			function previewImagem(){
				var imagem = document.querySelector('input[name=imagem]').files[0];
				var preview = document.querySelector('img');
			
				var reader = new FileReader();
				
				reader.onloadend = function () {
					preview.src = reader.result;
				}
				
				if(imagem){
					reader.readAsDataURL(imagem);
				}else{
					preview.src = "";
				}
			}
		</script>

		<!-- Sessão de Script