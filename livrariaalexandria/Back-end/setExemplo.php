<?php
/*include_once ('cliente.class.php');

if(isset($_GET['acao'])){*/
	echo "<h1>Nome de Usuário: ".$_POST["usuario"];
	echo "<br/>Senha: ".$_POST["senha"]."</h1>";
	$var = "Teste";
	echo $var;
	
	$acao = $_REQUEST["acao"];
	echo "<br/>".$acao.asdasd;
	
	/*$acao = $_GET['acao'];
	
	switch($acao){
		case "fazerLogin":{
			//Instanciando o objeto
			$Cliente = new Cliente;
			//Atribuindo valores:
			$Cliente->setUsername($_POST['usuario']);
			$Cliente->setPassword($_POST['senha']);
			echo "<h1>".$Cliente->getUsername()."<br/>".$Cliente->getPassword()."</h1>";
		/*}
	}
}*/

?>