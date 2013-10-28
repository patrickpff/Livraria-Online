<?php
include_once('store_pdo.php');

class categoriaDAO extends store_pdo{
	private $p; //receber a conexão
	private $nomeCompleto;
	private $lastId;
	private $categoria;
	
	public function categoriaDAO() {
		//retorna a conexão com o banco de dados Utilizando o PDO
		parent::__construct();
		$this->p = parent::getInstance();
		$this->categoria = new categoria();
	}
	
	public function carrega (){
		$query = $this->p->query("SELECT * FROM categoria ORDER BY nomeCategoria");
		
		while ($row = $query->fetch(PDO::FETCH_ASSOC)){
			echo "<a href ='trataBuscas.php?busca=categoria&categoria=".$row['nomeCategoria']."' target = '_parent' class = 'linkslaterais'>".$row ['nomeCategoria']."</a>";
		}
	}
	
	public function buscaCat($cat){
		$this->categoria = $cat;
		$query = $this->p->query("SELECT * FROM categoria WHERE nomeCategoria = '".$this->categoria->getnomeCat()."'");
		if ($row = $query->fetch(PDO::FETCH_ASSOC)){
			$this->categoria->setcodCat($row['idCategoria']);
			//echo "<h1>".$row['idCategoria']."</h1>";
		}
		return ($this->categoria);
	}
}
?>