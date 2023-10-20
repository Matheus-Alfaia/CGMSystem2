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
			define("TITULO", "LISTA DE FORNECEDORES");
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
					<th>Descrição</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>';
			echo "</thead>";
			echo "<tbody>";
			$fornecedor = listarFornecedor($conexao);
			$n = 1;
			// echo "Total: ".count($eventos);
			foreach($fornecedor as $f){
				echo '<tr>';
				echo '<td>'.$n.'</td>';
				echo '<td>'.$f["Nome"].'</td>';
				echo '<td>'.$f["Descricao"].'</td>';
				echo '<td><a href="Editar-Fornecedor.php?IdFornecedor='.$f["IdFornecedor"].'"><i class="bx bx-edit-alt"></i></a></td>';
				echo '<td><a href="Excluir-Fornecedor.php?IdFornecedor='.$f["IdFornecedor"].'"><i class="bx bx-message-alt-x"></i></td></tr>';
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