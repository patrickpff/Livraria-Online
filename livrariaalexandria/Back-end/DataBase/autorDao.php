<?php
include_once('store_pdo.php');
include_once ('Classes/categoria.php');
include_once ('categoriaDAO.php');

class autorDao extends store_pdo {
	private $p; //receber a conexão
	
	public function autorDao() {
		//retorna a conexão com o banco de dados Utilizando o PDO
		parent::__construct();
		$this->p = parent::getInstance();
		$this->categoria = new categoria();
	}
	
	public function pesquisarAutor($autor){
		$query = $this->p->query("SELECT * FROM autor WHERE nome LIKE '%".$autor->getnomeAutor()."%'");
		while ($rows = $query->fetch(PDO::FETCH_ASSOC)){
			$autor->setcodAutor($rows['idAutor']);
			$query2 = $this->p->query("SELECT * FROM livros WHERE FK_codAutor LIKE '%".$autor->getcodAutor()."%'");
			while ($rows2 = $query2->fetch(PDO::FETCH_ASSOC)){
				echo "<h1>".$rows2['nome']."</h1><br/>";
				echo "<div style = 'background-color: #E8E8E8;'>";
				echo "<img src = ".$rows2['url']." alt = ".$rows2['nome']." style = 'display: inline-flex'/>";
				echo "<div style = 'position: relative; top: -250px; left: 300px; width: 650px'>";
				echo $rows2['descricao']."<br/><br/>";
				echo "Preco:".$rows2['precoVenda']."<br/>" ;
				echo "<a href = 'iframe.php?acao=add&id=".$rows2['idLivro']."'>Adicionar ao carrinho</a>";
				echo "</div>";
				echo "</div>";
				echo "<hr/>";
			}
		}
		
		while ($rows = $query->fetch(PDO::FETCH_ASSOC)){
				echo "<h1>".$rows['nome']."</h1><br/>";
				echo "<div style = 'background-color: #E8E8E8;'>";
				echo "<img src = ".$rows['url']." alt = ".$rows['nome']." style = 'display: inline-flex'/>";
				echo "<div style = 'position: relative; top: -250px; left: 300px; width: 650px'>";
				echo $rows['descricao']."<br/><br/>";
				echo "Preco:".$rows['precoVenda']."<br/>" ;
				echo "<a href = 'iframe.php?acao=add&id=".$rows['idLivro']."'>Adicionar ao carrinho</a>";
				echo "</div>";
				echo "</div>";
				echo "<hr/>";
		}
	
	}
}
?>