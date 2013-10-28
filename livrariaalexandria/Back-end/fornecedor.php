<?php
class Fornecedor {
	private $codFornecedor;
	private $nomeFornecedor;
	
	public function setCodigo ($codigo){
		$this->codFornecedor = $codigo;
	}
	
	public function setNome ($nome){
		$this->nomeFornecedor = $nome;
	}
	
	public function getCodigo (){
		return($codFornecedor);
	}
	
	public function getNome (){
		return ($nome);
	}
	
}
?>