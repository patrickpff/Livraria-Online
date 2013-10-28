<?php
class Livro {
	private $codLivro;
	private $nomeLivro;
	private $autor;
	private $descricao;
	private $qtdePag;
	private $precoCusto;
	private $precoVenda;
	private $codCat;
	
	//Funções "set" para livros:
	public function setcodLivro ($cod){
		$this->codLivro = $cod;
	}
	
	public function setnomeLivro($nome){
		$this->nomeLivro = $nome;
	}
	
	public function setAutor($autor){
		$this->autor = $autor;
	}
	
	public function setQtdePg($qtde){
		$this->qtdePag = $qtde;
	}
	
	public function setPrecoCusto($precoC){
		$this->precoCusto = $precoC;
	}
	
	public function setPrecoVenda($precoV){
		$this->precoVenda = $precoV;
	}
	
	public function setDescricao($Desc){
		$this->descricao = $Desc;
	}
	
	public function setCategoria($Cat){
		$this->categoria = $Cat;
	}
	
	//Funções "get" para livros:
	public function getcodLivro (){
		return ($this->codLivro);
	}
	
	public function getnomeLivro(){
		return $this->nomeLivro;
	}
	
	public function getAutor(){
		return $this->autor;
	}
	
	public function getQtdePg(){
		return $this->qtdePag;
	}
	
	public function getPrecoCusto(){
		return $this->precoCusto;
	}
	
	public function getPrecoVenda(){
		return $this->precoVenda;
	}
	
	public function getDescricao(){
		return $this->descricao;
	}
	
	public function getCategoria(){
		return $this->categoria;
	}
}
?>