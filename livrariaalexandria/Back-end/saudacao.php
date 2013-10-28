<?php
	session_start('logado');
	echo "<p class = 'saudacao'>Bem vindo! <br/>";
	
	if (isset($_SESSION['nome'])){
		echo $_SESSION['nome']."<br/>";
		echo "<a href = 'logout.php'>Sair</a>";
	} else {
		echo "
			<a href = '../login.html' target = '_parent'>Clique aqui para entrar</a>";
	}
	
	echo "</p>"
?>