<?php
	private $codPedido;
	private $codLivro;
	private $data;
	private $valorNaData;
	/*Fun��es set:*/
	public function setcodPedido ($codP){
		$this->codPedido = $codP;
	}
	
	public function setcodLivro ($codL){
		$this->codLivro = $codL;
	}
	
	public function setcodData ($data){
		$this->data = $data;
	}
	
	public function setvalor ($valor){
		$this->valorNaData = $valor;
	}
	
	/*Fun��es get:*/
	public function getcodPedido (){
		return ($codPedido);
	}
	
	public function getcodLivro ($codL){
		return ($codLivro);
	}
	
	public function setcodData ($data){
		return ($data);
	}
	
	public function setvalor ($valor){
		return ($valorNaData);
	}
?>