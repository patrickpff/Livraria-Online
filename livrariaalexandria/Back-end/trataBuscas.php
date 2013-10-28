<html>
<head>
	<title>Livraria Alexandria</title>
	<link rel = 'stylesheet' type = 'text/css' href = '../CSS/estilos.css'/>
	<link rel = 'stylesheet' type = 'text/css' href = '../CSS/menuslideshow.css'/>
	<link rel = 'stylesheet' type = 'text/css' href = '../CSS/carrinhodropdown.css'/>
</head>

<body>
	<div>
		<div class = headerdiv>
			<a href = '../index.html'><img src = '../imagens/LOGO-Alexandria-menor.png' alt = "Livraria Alexandria" class = totitle></a>
			<p class = totitleText>Telefone para contato: (xxx) 3***-****</p>
		</div>
		<div>
			<div>
				<form action = '' method = 'get'>
					<fieldset>
						<!-- <label for = 'busca'><img src = imagens/search.png></label> -->
						<input type = 'text' id = 'busca' name = 'busca' placeholder = 'Digite o nome do livro ou autor' class = 'busca'/>
						<input type = 'submit' value = '' class = 'butaoBusca'/>
					</fieldset>
				</form>
			</div>
			<div id = 'popup'>
				<a href = 'carrinho.php'>Meu carrinho
					<span>
						<iframe src = "iframe.php?acao=show">
						
						<a href = '#'></iframe>
					</span>
				</a>				
			</div>
		</div>
		<br/>
		<div>
			<div id = 'saudacao'>
				<iframe src = '../Back-end/saudacao.php' name = 'iframe-saudacao'></iframe>
			</div>
			<div id = 'menulateral'>
				<label class = 'titlelateral'>Categorias:</label><br/><br/>
				<iframe src = '../Back-end/trataInteracoes.php?acao=carregaCategorias' class = 'iframelateral'></iframe>
			</div>
			<div id = 'result'> <!-- container para menu de transição -->
				<?php
				include_once ('Classes/categoria.php');
				include_once ('DataBase/categoriaDAO.php');
				include_once ('DataBase/livroDao.php');
				include_once ('DataBase/autorDao.php');
				include_once ('Classes/livro.php');
				$busca = $_GET['busca'];

				switch($busca){
						case "categoria":{
							$categoria = new categoria();
							$categoria->setnomeCat($_GET['categoria']);
							//Instanciando o objeto
							$catDAO = new categoriaDAO();
							$categoriaT = $catDAO->buscaCat($categoria);
							
							$livroDAO = new livroDao();
							$livroDAO->listarCat($categoriaT);
							break;
						}
						default:{
							$livro = new livro();

							$livro->setnomeLivro($busca);
							$livroD = new livroDao();
							
							$livroD->pesquisaLivro($livro);
						};
					}
				?>
			</div>
		</div>
	</div>
</body>

</html>