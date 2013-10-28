<?php
//include_once('conectaBD.php');
include_once('store_pdo.php');

class clienteDAO extends store_pdo {
	private $p; //receber a conexão
	private $nomeCompleto;
	private $lastId;
	
	public function clienteDAO() {
		//retorna a conexão com o banco de dados Utilizando o PDO
		/*echo "CONECTADO!";*/
		parent::__construct();
		$this->p = parent::getInstance();
		/*echo "Instancia capturada";*/
	}
	
	public function verifica ($cliente){
		$query = $this->p->query("SELECT * FROM usuario WHERE username = '".$cliente->getUsername()."' AND senha = '".md5($cliente->getPassword())."'");
		
		if ($row = $query->fetch(PDO::FETCH_ASSOC)){
			$nomeCompleto = $row['nomeCompleto'];
			$end = $row['FK_idEnd'];
			session_start('logado');
			$_SESSION['nome'] = $row['nomeCompleto'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['id'] = $row['idUser'];
			header ('location: ../index.html');
		} else {
			echo "<h1>Usuario ou senha incorretos!</h1>";
		}
	}
	
	public function verificaExistencia ($cliente){
		$query = $this->p->query("SELECT * FROM usuario WHERE username = '".$cliente->getUsername()."'");
		if ($query->fetch(PDO::FETCH_ASSOC)){
			return (true);
		} else {
			return (false); // já existe
		}
	}
		
	public function getNome (){
		return ($nomeCompleto);
	}
	
	public function endereco (){
		return ($end);
	}
	
	public function insere ($cliente){
		$cliente->setIdEnd($this->lastId);
		try{
			$stmt = $this->p->prepare ("INSERT INTO usuario (nomeCompleto, username, dataNascimento, sexo, email, senha, cpf, FK_idEnd) VALUES (?,?,?,?,?,?,?,?)");
			$stmt->bindValue(1, $cliente->getNome());
			$stmt->bindValue(2, $cliente->getUsername());
			$stmt->bindValue(3, $cliente->getDataNascimento());
			$stmt->bindValue(4, $cliente->getSexo());
			$stmt->bindValue(5, $cliente->getEmail());
			$stmt->bindValue(6, md5($cliente->getPassword()));
			$stmt->bindValue(7, $cliente->getCpf());
			$cliente->setIdEnd($this->selecionaEnd());
			$stmt->bindValue(8, $cliente->getIdEnd());
			$stmt->execute();
			
			header ('location: ../login.html');
			echo "<h1> INSERIDO! </h1>";
		} catch (PDOException $ex){
			echo "Erro: ".$ex->getMessage();
		}
	}
		
	public function insereend ($endereco){
		try {
			$stmt = $this->p->prepare ("INSERT INTO endereco (cep, rua, bairro, numero, cidade, estado, telefone) VALUES (?,?,?,?,?,?,?)");
			$stmt->bindValue(1, $endereco->getCEP());
			$stmt->bindValue(2, $endereco->getRua());
			$stmt->bindValue(3, $endereco->getBairro());
			$stmt->bindValue(4, $endereco->getNumero());
			$stmt->bindValue(5, $endereco->getCidade());
			$stmt->bindValue(6, $endereco->getEstado());
			$stmt->bindValue(7, $endereco->getTelefone());
			$stmt->execute();
			
			$this->p = null;
			/*echo "<h1> INSERIDO END! </h1>";*/
		} catch (PDOException $ex){
				echo "Erro: ".$ex->getMessage();
		}
	}
	
	public function imprimeEnd ($codEnd){
		$query = $this->p->query ("SELECT * FROM endereco WHERE idEnd = ".$codEnd);
		if ($row = $query->fetch(PDO::FETCH_ASSOC)){
			echo $row ['rua'].", ".$row ['numero']."<br/>";
			echo $row['bairro']." CEP:".$row['cep'];
			echo $row ['cidade'].", ".$row ['estado'];
		}
	}
	
	public function selecionaEnd (){
		try{
			$query = $this->p->query("SELECT * FROM endereco");
			//print_r($query);
			$enderecos = $query->fetchAll(PDO::FETCH_ASSOC);
			return $enderecos[sizeof($enderecos)-1]['idEnd'];
		} catch (PDOException $ex){
			echo "Erro: ".$ex->getMessage();
		}
	}
	
	public function returnEnd ($user){
		$query = $this->p->query ("SELECT * FROM usuario WHERE username = '".$user."'");
		if ($row = $query->fetch(PDO::FETCH_ASSOC)){
			return ($row['FK_idEnd']);
		}
	}
}
?>