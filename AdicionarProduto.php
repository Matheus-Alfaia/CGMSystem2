<?php
	define("TITULO", "CADASTRO DE PRODUTOS");
	include "cabecalho.php"; // Certifique-se de incluir o cabeçalho, se necessário
	include_once "conn/conexao.php";
	include "funcoes.php";
	include "menu.php";
?>
<div class="home-section">
    <div class="home-content">
        <i class='bx bx-menu'></i>
    </div>

    <?php if (!isset($_GET['cadastro'])) { ?>
        <div class='letter-normal'>
            <div>
                <img class="imgP" src="img/icone2.jpg">
            </div>
            <h1>Entrada de Produto</h1>
        </div>

        <div class='cadastro-principal' style="margin-top:10px; margin-right: 10px;">
            <div class='card-cadastro'>
                <form action="" method="get">
                    <fieldset>
                        <legend>Entrada de Produto</legend>
                        <div class="grupo-form1">
                            <label> NotaFiscal: </label>
                            	<input type="text" class="controle-nome" name="nota" autocomplete="off" required>
                            <br><label> Data: </label><br>
                            	<input type="date" class="controle-nome" name="data" autocomplete="off" required>
                            <?php
                            	$fornecedor = listarFornecedor($conexao);
                            	echo '<label> Fornecedores </label>';
                            	echo '<select name="fornecedor">';
                            	foreach ($fornecedor as $for):
                                	echo '<option value="' . $for['IdFornecedor'] . '">' . $for['Nome'] . '</option>';
                            	endforeach;
                            	echo '</select>';
                            	echo "<br>";
                            ?>
                            <label> Informações Adicionais: </label>
                            	<textarea rows="5" cols="140" placeholder="Descrição" name="desc"></textarea>
                        </fieldset>
                        <fieldset style="width: 98%;">
                            <legend>Adicionar produtos já cadastrados</legend>
                            	<?php
                            		$produto = listarProduto($conexao);
                            		echo '<label> Produtos </label>';
                            		echo '<div id="select-container">';
                            		echo '<select id="produtoSelect" name="produto[]" style="margin:10px" >';
                            		foreach ($produto as $for):
                                		echo '<option value="' . $for['IdProduto'] . '">' . $for['IdProduto'] . ' - ' . $for['NomeP'] . '</option>';
                                		$id= $for;
                            		endforeach;
                            		echo '</select>';
                            		echo '</div>';
                           		?>
                            <label> Quantidade: </label>
                            	<input type="text" class="controle-qtd" name="qtd[]" autocomplete="off" required>
                            <label class="extra2"> Tamanho: </label>
                            	<input type="text" class="controle-outros" name="tam[]" autocomplete="off" required>
                            <label class="extra2"> Cor: </label>
                            	<input type="text" class="controle-outros" name="cor[]" autocomplete="off" required></br>-------------------------------------------------------------------------------------------------
                            <div id="camposDinamicos"></div>
                            <button type="button" id="adicionarCampo" class="btn-cadastro-normal" style="width:60px; float:right;">+</button></br>
                        </fieldset>
                        <button type="submit" class="btn-cadastro-normal" value="Cadastrar" name="cadastro">CADASTRAR</button>
                    </form>
                </div>
            </div>
        <?php 	} else {
            $nota = $_GET['nota'];
            $data = $_GET['data'];
            $info = $_GET['desc'];
            $idProduto = $_GET['produto'][0];
            $cp = listarProduto($conexao);
            $maior = 0;
            foreach ($cp as $cac) {
                if ($cac['IdProduto'] > $maior) {
                    $maior = $cac['IdProduto'];
                }
            }

            $cadastro = cadastrarEntrega($conexao, $nota, $data, $info, $idProduto);
            //APROVEITA ESSA PARTE IGOR
            if (isset($_GET['qtd']) && isset($_GET['tam']) && isset($_GET['cor'])) {
                $qtd = $_GET['qtd'];
                $tam = $_GET['tam'];
                $cor = $_GET['cor'];

                $totalQuantidade = 0; // Variável para armazenar a soma da quantidade

                if (count($qtd) == count($tam) && count($tam) == count($cor)) {
                    for ($i = 0; $i < count($qtd); $i++) {
                        $quantidade = $qtd[$i];
                        $tamanho = $tam[$i];
                        $cor = $cor[$i];

                        // Verifique se já existe uma combinação no banco
                        $stmt = $conexao->prepare("SELECT IdCP, Quantidade FROM caracteristica_produto WHERE IdProduto = ? AND Tamanho = ? AND Cor = ?");
                        $stmt->bind_param("iss", $idProduto, $tamanho, $cor);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            // Se a combinação já existe, obtenha o IdCP e a quantidade existente
                            $row = $result->fetch_assoc();
                            $idCP = $row['IdCP'];
                            $quantidadeExistente = $row['Quantidade'];

                            $quantidadeTotal = $quantidadeExistente + $quantidade;
                            echo "Total Quantidade: " . $quantidadeTotal;

                            // Atualize a quantidade no registro existente
                            $stmt = $conexao->prepare("UPDATE caracteristica_produto SET Quantidade = ? WHERE IdCP = ?");
                            $stmt->bind_param("ii", $quantidadeTotal, $idCP);
                            $stmt->execute();
                        }else{
                            // Se a combinação não existe, insira um novo registro
                            $stmt = $conexao->prepare("INSERT INTO caracteristica_produto (IdProduto, Quantidade, Tamanho, Cor) VALUES (?, ?, ?, ?)");
                            $stmt->bind_param("iiss", $idProduto, $quantidade, $tamanho, $cor);
                            $stmt->execute();
                        }

                        // Adicione a quantidade ao array de quantidades totais
                        if (!isset($quantidadesTotais[$idProduto])) {
                            $quantidadesTotais[$idProduto] = 0;
                        }
                        $totalQuantidade += $quantidade;
                    }
                }else{
                    echo "Número de campos dinâmicos não corresponde.";
                }
            }
            echo "<meta http-equiv='refresh' content='0;AdicionarProduto.php'></meta>";
        }
    	include "rodape.php";
	?>
</div>
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement;
            arrowParent.classList.toggle("showMenu");
        });
    }

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function previewImagem() {
        var imagem = document.querySelector('input[name=imagem]').files[0];
        var preview = document.querySelector('img');

        var reader = new FileReader();

        reader.onloadend = function() {
            preview.src = reader.result;
        }

        if (imagem) {
            reader.readAsDataURL(imagem);
         } else {
           preview.src = "";
            }
    }
</script>
<script>
    document.getElementById('adicionarCampo').addEventListener('click', function() {
        var camposDinamicos = document.getElementById('camposDinamicos');
        var campoClonado = document.createElement('div');

        campoClonado.innerHTML = `
            <?php
            $produto = listarProduto($conexao);
            echo '<div id="select-container">';
            echo '<select id="produtoSelect" name="produto[]" style="margin:10px">';
            foreach ($produto as $for):
                echo '<option value="' . $for['IdProduto'] . '">' . $for['IdProduto'] . ' - ' . $for['NomeP'] . '</option>';
            endforeach;
            echo '</select>';
            echo "<br>";
            ?>
            <label> Quantidade: </label>
	            <input type="text" class="controle-qtd" name="qtd[]" autocomplete="off" required>
            <label class="extra2"> Tamanho: </label>
                <input type="text" class="controle-outros" name="tam[]" autocomplete="off" required>
            <label class="extra2"> Cor: </label>
                <input type="text" class="controle-outros" name="cor[]" autocomplete="off" required>
            </br>-------------------------------------------------------------------------------------------------
            `;
        camposDinamicos.appendChild(campoClonado);

        // Adicione um ouvinte de mudança ao select dentro do campo clonado
        campoClonado.querySelector('#produtoSelect').addEventListener('change', function() {
            idProduto = this.value;
        });
    });
</script>
