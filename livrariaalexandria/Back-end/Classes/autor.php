<?php
class autor {
	private $codAutor;
	private $nomeAutor;
	
	//Funções "set" para autores:
	public function setcodAutor($c){
		$this->codAutor = $c;
	}
	public function setnomeAutor ($n){
		$this->nomeAutor = $n;
	}
	
	public function getcodAutor (){
		return ($this->codAutor);
	}
	public function getnomeAutor (){
		return ($this->nomeAutor);
	}
}
?>