<?php
include_once('store_pdo.php');
include_once ('Classes/categoria.php');
include_once ('categoriaDAO.php');
include_once ('autorDao.php');
include_once ('Classes/autor.php');

class livroDao extends store_pdo {
	private $p; //receber a conexão
	private $nomeCompleto;
	private $lastId;
	private $categoria;
	
	public function livroDao() {
		//retorna a conexão com o banco de dados Utilizando o PDO
		parent::__construct();
		$this->p = parent::getInstance();
		$this->categoria = new categoria();
	}
	
	public function listarCat($cat){
		$catDAO = new categoriaDAO();
		$this->categoria = $catDAO->buscaCat($cat);
		$query = $this->p->query("SELECT * FROM livros WHERE FK_codCategoria = ".$this->categoria->getcodCat());
		
		while ($rows = $query->fetch(PDO::FETCH_ASSOC)){
			echo "<h1>".$rows['nome']."</h1><br/>";
			echo "<div style = 'background-color: #E8E8E8;'>";
			echo "<img src = ".$rows['url']." alt = ".$rows['nome']." style = 'display: inline-flex'/>";
			echo "<div style = 'position: relative; top: -250px; left: 300px; width: 650px'>";
			echo $rows['descricao']."<br/><br/>";
			echo "Preco:".$rows['precoVenda']."<br/>" ;
			if ($rows['qtde'] == 0){
				echo "<p style = 'color: red;'>Indisponivel no momento!</p>";
			} else {
				echo "<a href = 'iframe.php?acao=add&id=".$rows['idLivro']."'>Adicionar ao carrinho</a>";
			}
			echo "</div>";
			echo "</div>";
			echo "<hr/>";
		}
	}
	
	public function pesquisaLivro ($livro){
		$query = $this->p->query("SELECT * FROM livros WHERE nome LIKE '%".$livro->getnomeLivro()."%'");
		
		while ($rows = $query->fetch(PDO::FETCH_ASSOC)){
			echo "<h1>".$rows['nome']."</h1><br/>";
			echo "<div style = 'background-color: #E8E8E8;'>";
			echo "<img src = ".$rows['url']." alt = ".$rows['nome']." style = 'display: inline-flex'/>";
			echo "<div style = 'position: relative; top: -250px; left: 300px; width: 650px'>";
			echo $rows['descricao']."<br/><br/>";
			echo "Preco:".$rows['precoVenda']."<br/>" ;
			if ($rows['qtde'] == 0){
				echo "<p style = 'color: red;'>Indisponivel no momento!</p>";
			} else {
				echo "<a href = 'iframe.php?acao=add&id=".$rows['idLivro']."'>Adicionar ao carrinho</a>";
			}
			echo "</div>";
			echo "</div>";
			echo "<hr/>";
		}
		
		$autor = new autor();
		$autor->setnomeAutor($livro->getnomeLivro());
		$autorD = new autorDao();
		$autorD->pesquisarAutor($autor);
	}
	
	public function mostraNoCarrinho ($id){
		$query = $this->p->query("SELECT * FROM livros WHERE idLivro = ".$id);
		
		if ($row = $query->fetch(PDO::FETCH_ASSOC)){
			echo "<strong>".$row['nome']."</strong>"."<br/>";
			echo "<strong>Preco: </strong>".$row['precoVenda']."<br/>";
		}
	}
	
	public function retornaValor ($id){
		$query = $this->p->query("SELECT * FROM livros WHERE idLivro = ".$id);
		
		if ($row = $query->fetch(PDO::FETCH_ASSOC)){
			return ($row['precoVenda']);
		}
	}
}
?>