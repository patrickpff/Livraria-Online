<html>
<head>
	<title>Livraria Alexandria</title>
	<link rel = 'stylesheet' type = 'text/css' href = 'CSS/estilos.css'/>
	<link rel = 'stylesheet' type = 'text/css' href = 'CSS/menuslideshow.css'/>
	<link rel = 'stylesheet' type = 'text/css' href = 'CSS/carrinhodropdown.css'/>
</head>

<body>
	<div>
		<div class = headerdiv>
			<img src = imagens/LOGO-Alexandria-menor.png alt = "Livraria Alexandria" class = totitle>
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
						<iframe src = "Back-end/iframe.php">
						
						<a href = '#'></iframe>
					</span>
				</a>				
			</div>
		</div>
		<br/>
		<div>
			<div id = 'saudacao'>
				<iframe src = 'Back-end/saudacao.php' name = 'iframe-saudacao'></iframe>
			</div>
			<div id = 'menulateral'>
				<label class = 'titlelateral'>Categorias:</label><br/><br/>
				<iframe src = 'Back-end/trataInteracoes.php?acao=carregaCategorias' class = 'iframelateral'></iframe>
				<!--div class = 'linkslaterais'><a href = ''>Administração e negócios</a><br/><br/></div>
				<div class = 'linkslaterais'><a href = ''>Agropecuária<br/><br/></a></div>
				<div class = 'linkslaterais'><a href = ''>Arquitetura e decoração<br/><br/></a></div>
				<div class = 'linkslaterais'><a href = ''>Artes<br/><br/></a></div>
				<div class = 'linkslaterais'><a href = ''>Auto-ajuda<br/><br/></a></div>
				<div class = 'linkslaterais'><a href = ''>Ciências biológicas e naturais<br/><br/></a></div>
				<div class = 'linkslaterais'><a href = ''>Ciências exatas e tecnológicas<br/><br/></a></div-->
			</div>
			<div class = 'container mostra slideshow'> <!-- container para menu de transição -->
				<div id = 'content-slider'>
					<div id = 'slider'>
						<div id = 'mask'>
							<ul>
								<li id = 'first' class = 'firstanimation'>
									<a href = '#'> <img src = 'Imagens/exemplo/01.jpg'/ alt = '01' class = 'menuslideshow' /> </a>
									<div class = 'tooltip'><h1>As Crônicas do Gelo e do Fogo</h1></div>
								</li>
								<li id = 'second' class = 'secondanimation'>
									<a href = '#'> <img src = 'Imagens/exemplo/02.jpg' alt = '02' class = 'menuslideshow'/> </a>
									<div class = 'tooltip'><h1>Guia do Mochileiro das Galáxias</h1></div>
								</li>
								<li id = 'third' class = 'thirdanimation'>
									<a href = '#'> <img src = 'Imagens/exemplo/03.jpg' alt = '03' class = 'menuslideshow'/> </a>
									<div class = 'tooltip'><h1>Coleção: Harry Potter</h1></div>
								</li>
								<li id = 'fourth' class = 'fourthanimation'>
									<a href = '#'> <img src = 'Imagens/exemplo/04.jpg' alt = '04' class = 'menuslideshow'/> </a>
									<div class = 'tooltip'><h1>As Brumas de Avalon</h1></div>
								</li>
								<li id = 'fifth' class = 'fifthanimation'>
									<a href = '#'> <img src = 'Imagens/exemplo/05.jpg' alt = '05' class = 'menuslideshow'/> </a>
									<div class = 'tooltip'><h1>A Busca do Graal: Trilogia</h1></div>
								</li>
								<div class = 'progress-bar'></div>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class = 'submostra'>
				asdasda
			</div>
		</div>
	</div>
</body>

</html>