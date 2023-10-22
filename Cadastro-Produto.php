<?php
	define("TITULO", "CADASTRO DE PRODUTOS");
	include "cabecalho.php";
	include_once "conn/conexao.php";
	include "funcoes.php";
	include "menu.php";

	if(!isset($_GET['cadastro'])){?>
		<div class='letter-normal'>
			<div>
				<img class="imgP" src="img/icone2.jpg">
			</div>
				<h1>Cadastro Produto</h1>
			</div>
			<div class='cadastro-principal'>
				<div class='card-cadastro'>
					<form action="" method="get">
						<fieldset>
						<legend>Geral</legend>
							<div class="grupo-form1">
								<label> Nome: </label>
									<input type="text" class="controle-nome" name="nome" autocomplete="off" required>
								<label> Imagem: </label>
									<input type="file" class="controle-img" name="imagem" id="imagem" onchange="previewImagem()">
							<?php
								$fornecedor = listarFornecedor($conexao); 
								echo '<label> Fornecedores </label>';
									echo '<select name="fornecedor">';
										foreach ($fornecedor as $for):
											echo '<option value="'.$for['IdFornecedor'].'">'.$for['Nome'].'</option>';
										endforeach;
									echo '</select>';
								echo "<br>";
							?>
							<label> Descrição: </label>
								<textarea rows="5" cols="140" placeholder="Descrição" name="desc"></textarea>
							<center><label> Valor Bruto: R$</label>
								<input type="text" class="controle-num2" name="bruto" autocomplete="off" required>
							<label> Valor a ser vendido: R$</label>
								<input type="text" class="controle-num2" name="vendido" autocomplete="off" required>
							<label> Material: </label>
								<input type="text" class="controle-num2" name="material" autocomplete="off" required></br></br>
							<center><label> Categoria: </label>
								<select name="categoria">
								    <option value="vestido">Vestido</option>
								    <option value="camisa">Camisa</option>
								    <option value="saia">Saia</option>
								    <option value="calca">Calça</option>
								    <option value="bermuda">Bermuda</option>
								    <option value="langerie">Langerie</option>
								</select>
							
							<label> Localização: </label>
								<input type="text" class="controle-num2" name="localizacao" autocomplete="off" required></center>	
						</fieldset>
						<button type="submit" class="btn-cadastro-normal" value="Cadastrar" name="cadastro">CADASTRAR</button>
					</div>
				</form></center>
			</div>
		</div>
	<?php
	}else{
		$nome 			= $_GET['nome'];
		$imagem 		= $_GET['imagem'];
		$descricao 		= $_GET['desc'];
		$idFornecedor 	= $_GET['fornecedor'];
		$valor_bruto 	= $_GET['bruto'];
		$valor_vendido 	= $_GET['vendido'];
		$localizacao	= $_GET['localizacao'];
		$material		= $_GET['material'];
		$categoria		= $_GET['categoria'];
		$cp = listarProduto($conexao);
		$maior = 0;
		foreach ($cp as $cac):
			if($cac['IdProduto'] > $maior){
				$maior = $cac['IdProduto'];
			}
		endforeach;
		echo $nome;
		$idProduto = $maior+1;
				
		$cadastro = cadastrarProduto($conexao, $nome, $imagem, $descricao,$idFornecedor,$valor_bruto, $valor_vendido, $localizacao, $material, $categoria);

		if (isset($_GET['qtd']) && isset($_GET['tam']) && isset($_GET['cor'])) {
			$qtd = $_GET['qtd'];
			$tam = $_GET['tam'];
			$cor = $_GET['cor'];
			if (count($qtd) == count($tam) && count($tam) == count($cor)) {
			    for ($i = 0; $i < count($qtd); $i++) {
			        $quantidade = $qtd[$i];
			        $tamanho = $tam[$i];
			        $cor = $cor[$i];
			        $stmt = $conexao->prepare("INSERT INTO caracteristica_produto (IdProduto, Quantidade, Tamanho, cor) VALUES (?, ?, ?, ?)");
			        $stmt->bind_param("isss", $idProduto, $quantidade, $tamanho, $cor);
			        $stmt->execute();
			    }
			}else{
			    echo "Número de campos dinâmicos não corresponde.";
			}
		}
		echo "<meta http-equiv='refresh' content='0;Cadastro-Produto.php'></meta>";
	}
	include "rodape.php";
?>
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
<script>
    document.getElementById('adicionarCampo').addEventListener('click', function() {
        var camposDinamicos = document.getElementById('camposDinamicos');
        var campoClonado = document.createElement('div');

        campoClonado.innerHTML = `
            <label> Quantidade: </label>
				<input type="text" class="controle-qtd" name="qtd[]" autocomplete="off" required>
			<label class="extra2"> Tamanho: </label>
				<input type="text" class="controle-outros" name="tam[]" autocomplete="off" required>
			<label class="extra2"> Cor: </label>
				<input type="text" class="controle-outros" name="cor[]" autocomplete="off" required>
        `;
        camposDinamicos.appendChild(campoClonado);
    });
</script>







