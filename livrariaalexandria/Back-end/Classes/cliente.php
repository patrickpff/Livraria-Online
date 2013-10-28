<?php
//include_once('../DataBase/clienteDAO.class.php');
class Cliente {
	private $codCliente;
	private $cpf;
	private $nome;
	private $dataNascimento;
	private $endereco;
	private $username;
	private $password;
	private $sexo;
	private $email;
	private $idEnd;
	
	function __construct(){
		
	}
	
	/*Funções set:*/
	public function setCodCliente ($codigo){
		$this->codCliente = $codigo;
	}
	
	public function setCpf ($cpf){
		$this->cpf = $cpf;
	}
	
	public function setNome ($nome){
		$this->nome = $nome;
	}
	
	public function setEndereco ($end){
		$this->endereco = $end;
	}
	
	public function setUsername ($un){
		$this->username = $un;
	}
	
	public function setPassword ($pass){
		$this->password = $pass;
	}
	
	public function setDataNascimento ($dn){
		$this->dataNascimento = $dn;
	}
	
	public function setSexo ($s){
		$this->sexo = $s;
	}
	
	public function setEmail ($em){
		$this->email = $em;
	}
	
	public function setIdEnd ($end){
		$this->idEnd = $end;
	}
	
	/*Funções get:*/
	public function getCodCliente (){
		return ($this->codCliente);
	}
	
	public function getCpf (){
		return ($this->cpf);
	}
	
	public function getNome (){
		return ($this->nome);
	}
	
	public function getEndereco (){
		return ($this->endereco);
	}
	
	public function getUsername (){
		return ($this->username);
	}
	
	public function getPassword (){
		return ($this->password);
	}
	
	public function getDataNascimento (){
		return ($this->dataNascimento);
	}
	
	public function getSexo (){
		return ($this->sexo);
	}
	
	public function getEmail (){
		return 	($this->email);
	}
	public function getIdEnd (){
		return ($this->idEnd);
	}
}

?>