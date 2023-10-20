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
			define("TITULO", "CADASTRO DE ADMINISTRADORES");
			include "cabecalho.php";
			include_once "conn/conexao.php";
			include "funcoes.php";
			if(!isset($_GET['cadastro'])){
				echo "<div class='letter-adm'>";
					echo "<h1>Cadastro Administrador</H1>";
				echo "</div>";
				echo "<div class='cadastro-principal-adm'>";
					echo "<div class='card-cadastro'>";
						echo '<form action="" method="get">'; #enctype="multipart/form-data"
						echo '<fieldset>';
						echo "<legend>Geral</legend>";
							echo '<div class="grupo-form">';
							echo '<label> Login: </label>';
							echo '<input type="text" class="controle-adm" name="login" autocomplete="off" required>';
							echo '<label> Senha: </label>';
							echo '<input type="password" class="controle-adm" name="senha" autocomplete="off" required>';
							echo '<label> Tipo: </label>';
							echo '<input type="text" class="controle-adm" name="tipo" autocomplete="off" required>';
								echo "<br>";
						echo '</fieldset>';
						echo '<button type="submit" class="btn-cadastro-adm" value="Cadastrar" name="cadastro">CADASTRAR</button>';
						echo '</div>';
					echo '</form></center>';
					echo "</div>";
				echo "</div>";
			}else{
				$login 			= $_GET['login'];
				$senha 			= $_GET['senha'];
				$tipo 		= $_GET['tipo']; 

				$cadastro = cadastrarAdministrador($conexao, $login, $senha, $tipo);
				echo "<meta http-equiv='refresh' content='0;Listar-Administrador.php'></meta>";
			}
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
		<!-- Sessão de Script -->