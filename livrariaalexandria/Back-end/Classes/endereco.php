<?php
//include_once('../DataBase/clienteDAO.class.php');
class Endereco {
	private $idEnd;
	private $cep;
	private $rua;
	private $bairro;
	private $numero;
	private $cidade;
	private $estado;
	private $telefone;
	
	function __construct(){
		
	}
	
	/*Funções set:*/
	public function setCEP ($c){
		$this->cep = $c;
	}
	
	public function setRua ($r){
		$this->rua = $r;
	}
	
	public function setBairro ($b){
		$this->bairro = $b;
	}
	
	public function setNumero ($n){
		$this->numero = $n;
	}
	
	public function setCidade ($c){
		$this->cidade = $c;
	}
	
	public function setEstado ($e){
		$this->estado = $e;
	}
	
	public function setTelefone ($tel){
		$this->telefone = $tel;
	}
	
	/*Funções get:*/
	public function getCEP (){
		return ($this->cep);
	}
	public function getRua (){
		return ($this->rua);
	}
	public function getBairro (){
		return ($this->bairro);
	}
	public function getNumero (){
		return ($this->numero);
	}
	public function getCidade (){
		return ($this->cidade);
	}
	public function getEstado (){
		return ($this->estado);
	}
	public function getTelefone (){
		return ($this->telefone);
	}
}

?>