<?php
include_once('store_pdo.php');
include_once('Database/livroDao.php');

class carrinhoDAO extends store_pdo {
	private $p; //receber a conexão
	
	public function carrinhoDAO() {
		//retorna a conexão com o banco de dados Utilizando o PDO
		parent::__construct();
		$this->p = parent::getInstance();
		$this->categoria = new categoria();
	}
	
	public function insere (){
		try{
			session_start('efetuarcompra');
			$id = $_SESSION['id'];
			
			$precoTotal = 0;
			$lDao = new livroDao();
			foreach($_SESSION['carrinho'] as $id => $qtd){
				$preco = $lDao->retornaValor($id);
				$precoTotal += ($preco * $qtd);
				echo "<hr/>";
			}
			//Subtraindo da quantidade de livros:
			$stmtSL = $this->p->prepare ("UPDATE livros SET qtde = qtde - ". $qtd ." WHERE idLivro = 1");
			$stmtSL->execute();
			
			//Inserindo pedido na tabela de pedidos:
			$stmtP = $this->p->prepare ("INSERT INTO pedido (fk_idUser, valorTotal) VALUES (?,?)");
			$stmtP->bindValue(1, $id);
			$stmtP->bindValue(2, $precoTotal);
			$stmtP->execute();
			
			//Selecionando código do pedido:
			$query = $this->p->query("SELECT * FROM pedido");
			$ultimo = $query->fetchAll(PDO::FETCH_ASSOC);
			$idUltimo = $ultimo[sizeof($ultimo)-1]['idPedido'];
			
			//Inserindo livros na relação pedido-livro
			foreach($_SESSION['carrinho'] as $id => $qtd){
				$id."</br>";//$_SESSION['carrinho'][$id]."<br/>";
				$idLivro = $_SESSION['id'];
				$stmtPL = $this->p->prepare ("INSERT INTO pedidolivro VALUES (?,?,?)");
				$stmtPL->bindValue(1, $id);
				$stmtPL->bindValue(2, $idUltimo);
				$stmtPL->bindValue(3, $_SESSION['carrinho'][$id]);
				$stmtPL->execute();
			}
		} catch (PDOException $ex){
			echo "Erro: ".$ex->getMessage();
		}
	}
	
}
?>