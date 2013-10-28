<?php
include_once ('Classes/cliente.php');
include_once ('Classes/endereco.php');
include_once ('Classes/categoria.php');
include_once ('DataBase/clienteDAO.php');
include_once ('DataBase/categoriaDAO.php');
include_once ('DataBase/carrinhoDAO.php');

	
	$acao = $_GET['acao'];
	echo "<link rel = 'stylesheet' type = 'text/css' href = '../CSS/Estilos.css'/>";
	switch($acao){
		case "fazerLogin":{
			//Instanciando o objeto
			$Cliente = new Cliente();
			//Atribuindo valores:
			$Cliente->setUsername($_POST['usuario']);
			$Cliente->setPassword($_POST['senha']);
			
			$DAO = new clienteDAO();
			$DAO->verifica($Cliente);
			
			//echo "<h1>".$Cliente->getUsername()."<br/>".$Cliente->getPassword()."</h1>";
			
			break;
		}
		case "criarUser":{
			if ($_POST['senha'] == $_POST['resenha']){
				$Cliente = new Cliente();
				$Endereco = new Endereco();
				//Cliente:
				$Cliente->setNome ($_POST['name']);
				$Cliente->setUsername ($_POST['username']);
				$Cliente->setCpf ($_POST['CPF']);
				$Cliente->setPassword($_POST['senha']);
				$Cliente->setDataNascimento($_POST['dataNascimento']);
				$Cliente->setSexo ($_POST['sexo']);
				$Cliente->setEmail($_POST['email']);
				//Endereço do cliente:
				$Endereco->setCEP ($_POST['CEP']);
				$Endereco->setRua ($_POST['endereco']);
				$Endereco->setBairro($_POST['bairro']);
				$Endereco->setNumero($_POST['numero']);
				$Endereco->setCidade($_POST['cidade']);
				$Endereco->setEstado($_POST['estado']);
				$Endereco->setTelefone($_POST['telefone']);
				
				$DAO = new clienteDAO();
				if ($DAO->verificaExistencia($Cliente)){
					$msg_alert = '<SCRIPT> alert("Usuário já existe!");</SCRIPT>';
					header ('location: ../criarUser.html');
				} else {
					$DAO->insereend($Endereco);
					$DAO = new clienteDAO();
					$DAO->insere($Cliente);
				}
			}
			break;
		}
		case "carregaCategorias":{
			$DAO = new categoriaDAO();
			$DAO->carrega();
			break;
		}
		case "criaPedido":{
			$DAO = new carrinhoDAO();
			$DAO->insere();
			header ('location: ../sucesso-venda.html');
			break;
		}
		default: break;
	}

?>