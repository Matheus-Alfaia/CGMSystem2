<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="img/shopping-bags-solid-24.png" type="image/png" style="color: #fff">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>INICIAL</title>
	<link rel="stylesheet" href="css/styleMenu.css">
	<link rel="stylesheet" href="icons/boxicons-2.0.9/css/animations.css">
	<link rel="stylesheet" href="icons/boxicons-2.0.9/css/boxicons.css">
	<link rel="stylesheet" href="icons/boxicons-2.0.9/css/boxicons.min.css">
	<link rel="stylesheet" href="icons/boxicons-2.0.9/css/transformations.css">
	<!-- <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> -->
</head>
<body>
	<div class="sidebar close">
		<div class="logo-details">
			<a href="menuInicial.php">
				<i class='bx bxs-store-alt'></i>
			</a>
			<span class="logo-name">Afrodite Moda's</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="teste.php">
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

	<div class="home-section">
	    <div class="home-content">
	      <i class='bx bx-menu'></i>
	    </div>
	</div>

	<!-- <div class="fixed-action-btn">
		<a href="#" class="btn-floating btn-large">
			<i class='bx bxs-cart'></i>
			 <i class='bx bxs-cart'></i>
		</a>
	</div> -->

	<div class="container">
		<div class="card">
			<div class="img">
				<i class='bx bxl-facebook-circle'></i>
			</div>
			<h1>FACEBOOK</h1>
			<div class="content">
				<a href="https://www.facebook.com/afrodite78/?ti=as" target="_b
				">Enter</a>
			</div>
		</div>
		<div class="card">
			<div class="img">
				<i class='bx bxl-instagram'></i>		
			</div>
			<h1>INSTAGRAM</h1>
			<div class="content">
				<a href="https://instagram.com/_afrodite_f?utm_medium=copy_link" target="_b
				">Enter</a>
			</div>
		</div>
		<a href="Listar-Produto-Catalogo.php">
			<div class="card">
				<div class="img">
					<i class='bx bxs-cart'></i>
					<!-- <i class='bx bxs-heart-circle'></i> -->
				</div>
			</div>
		</a>
	</div>

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
<!-- 	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
</body>
</html>