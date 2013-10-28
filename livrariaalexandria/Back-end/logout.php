<?php
	session_start('logar');
	session_destroy();
	header ('location: saudacao.php');
	session_start('logar');
?>