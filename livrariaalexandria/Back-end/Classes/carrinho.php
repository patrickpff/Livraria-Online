<?php
include_once ('Classes/livro.php');

class carrinho {
	private $livros = array();
	
	public function addLivro (livro $l){
		$this->livros[] = $l;
	}
	
	public function getLivro ($id){
		foreach($this->livros as $l){
			 if ($l->getcodLivro() == $id){
				return $p;
			 }
		}
	}
	
	public function removeLivro ($id){
		for ($i = 0; $i <count($this->livros); ++$i){
			if ($this->produto[$i]->getcodLivro() == $id){
				unset($this->produto[$i]);
			}
		}
	}
	
	public function listarCarrinho (){
		foreach($this->livros as $l){
			$retorno .= "
				[$l->getnomeLivro()] - [$l->getPrecoVenda()]<br/>
				<a href = '#'>Retira</a>
			";
		}
	}
}
?>