<?php
class nf {
	private $impostos;
	private $frete;
	/*Fun��es set:*/
	public setImpostos ($imp){
		$this->impostos = $imp;
	}
	
	public setFrete ($frete){
		$this->frete = $frete;
	}
	/*Fun��es get:*/
	public getImpostos (){
		return ($impostos);
	}
	
	public getFrete (){
		return ($frete);
	}
}
?>