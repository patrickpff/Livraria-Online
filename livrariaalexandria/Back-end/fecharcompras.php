
<html>
<head>
	<title>Livraria Alexandria - Fechar compra</title>
	<link rel = 'stylesheet' type = 'text/css' href = '../CSS/estilos.css'/>
	<link rel = 'stylesheet' type = 'text/css' href = '../CSS/fecharcompras.css'/>
</head>

<body>
	<div>
		<div class = headerdiv>
			<a href = '../index.html'><img src = '../imagens/LOGO-Alexandria-menor.png' alt = "Livraria Alexandria" class = totitle></a>
			<p class = totitleText>Telefone para contato: (xxx) 3***-****</p>
		</div>
		<br/>
		<div>
		<?php
			//include_once ('DataBase/carrinhoDAO.php');
			//include_once ('Database/livroDao.php');
			include_once ('Database/clienteDAO.php');
			
			session_start('logar');
			
			if (isset ($_SESSION['nome'])){
				echo "<br/><hr/>";
				echo "<h1>Nome: </h1>";
				echo $_SESSION['nome']."<br/><hr/>";
				
				echo "<h1>Endereço: </h1>";
				$cDao = new clienteDAO();
				$codEnd = $cDao->returnEnd($_SESSION['username']);
				$cDao->imprimeEnd($codEnd);
				
				echo "<br/><hr/>";
				echo "<h1>Pedidos:</h1>";
				echo "<iframe src = 'iframe.php?acao=showtoClose' style = '
						width: 1500px;
						height: 600px;
						'></iframe>";
						
				echo "<a href = 'trataInteracoes.php?acao=criaPedido'>Concluir compra</a>";
			} else {
				header('location: ../login.html');
			}
			?>
		</div>
	</div>
</body>
</html>