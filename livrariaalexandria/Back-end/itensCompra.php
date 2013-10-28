<?php
class itensCompra {
	private $codLivro;
	private $codFornecedor;
	private $qtdeLivros;
	private $dataCompra;
	private $valorUnitario;
	private $dataPgto;
	private $formaPgto;
	
	/*Funções set:*/
	public function setcodLivro ($codigo){
		$this->codLivro = $codigo;
	}
	
	public function setcodFornecedor ($codigo){
		$this->codFornecedor = $codigo;
	}

	public function setqtdeLivros ($qtde){
		$this->qtdeLivros = $qtde;
	}

	public function setdataCompra ($data){
		$this->dataCompra = $data;
	}
	
	public function setvalorUnitario ($VU){
		$this->valorUnitario = $VU;
	}
	
	public function setdataPgto($datapg){
		$this->dataPgto = $datapg;
	}
	
	public function setformaPgto($forma){
		$this->formaPgto = $forma;
	}
	/*Funções get:*/
	public function getcodLivro (){
		$this->codLivro = $codigo;
	}
	
	public function getcodFornecedor (){
		return ($codFornecedor);
	}

	public function getqtdeLivros (){
		return ($qtdeLivros);
	}

	public function getdataCompra (){
		return ($dataCompra);
	}
	
	public function getvalorUnitario (){
		return ($valorUnitario);
	}
	
	public function getdataPgto(){
		return ($dataPgto);
	}
	
	public function getformaPgto(){
		return ($formaPgto);
	}
}
?>