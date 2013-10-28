<?php
class categoria {
	private $codCat;
	private $nomeCat;
	
	public function setcodCat($codigo){
		$this->codCat = $codigo;
	}
	
	public function setnomeCat ($nome){
		$this->nomeCat = $nome;
	}
	
	public function getcodCat (){
		return ($this->codCat);
	}
	
	public function getnomeCat(){
		return ($this->nomeCat);
	}
}
?>