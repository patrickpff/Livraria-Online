<?php
class nf {
	private $impostos;
	private $frete;
	/*Funções set:*/
	public setImpostos ($imp){
		$this->impostos = $imp;
	}
	
	public setFrete ($frete){
		$this->frete = $frete;
	}
	/*Funções get:*/
	public getImpostos (){
		return ($impostos);
	}
	
	public getFrete (){
		return ($frete);
	}
}
?>