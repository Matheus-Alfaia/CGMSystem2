Início Menu -->

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
					<li><a href="Listar-Administrador.php">Visualizar Administrador</a></li>
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
					<li><a href="Listar-ProdutoF.php">Visualizar Produto-Fornecedor</a></li>
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
						<i class='bx bxs-user-detail'></i>
						<span class="link-name">CLIENTE</span>
					</a>
					<i class='bx bx-chevron-down arrow'></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link-name" href="">CLIENTE</a></li>
					<li><a href="Cadastro-Cliente.php">Cadastar Cliente</a></li>
					<li><a href="Listar-Cliente.php">Visualizar Cliente</a></li>
				</ul>
			</li>
			<li>
				<div class="iocn-link">
					<a href="#">
						<i class='bx bx-wallet'></i>
						<span class="link-name">DÍVIDA</span>
					</a>
					<i class='bx bx-chevron-down arrow'></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link-name" href="">DÍVIDA</a></li>
					<li><a href="Cadastro-Divida.php">Cadastar Dívida</a></li>
					<li><a href="Listar-Divida.php">Visualizar Dívida</a></li>
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
					<li><a href="Cadastro-Relatorios.php">Cadastar Relatórios</a></li>
					<li><a href="Listar-Relatorios.php">Visualizar Relatórios</a></li>
				</ul>
			</li>
			<li>
				<div class="iocn-link">
					<a href="#">
						<i class='bx bxs-briefcase'></i>
						<span class="link-name">FUNCIONÁRIOS</span>
					</a>
					<i class='bx bx-chevron-down arrow'></i>
				</div>
				<ul class="sub-menu">
					<li><a class="link-name" href="">FUNCIONÁRIOS</a></li>
					<li><a href="Cadastro-Funcionarios.php">Cadastar Funcionários</a></li>
					<li><a href="Listar-Funcionarios.php">Visualizar Funcionários</a></li>
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
			echo "<div class='listar-all-table'>";
			echo '<table id="my-table" class="table">';
			echo "<thead>";
				echo '
				<tr>
					<th>Nº</th>
					<th>Nome</th>
					
				</tr>';
			echo "</thead>";
			echo "<tbody>";
			$produto 	= listarProduto($conexao);
			$n = 1;
			// echo "Total: ".count($eventos);
			foreach($produto as $p){
				echo '<tr>';
				echo '<td>'.$n.'</td>';
				echo '<td>'.$p["NomeP"].'</td>';
				echo '</tr>';
				$n += 1;
			}
		echo "</tbody>";
		echo "</table>";
	echo "</div>";
			include "rodape.php";
		?></div>

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

<!-- 	<script src="js/jquery.min.js"></script>
	<script src="js/ddtf.js"></script>

	<script>
		$('#my-table').ddTableFilter();
	</script> -->
	<!-- Sessão de Script