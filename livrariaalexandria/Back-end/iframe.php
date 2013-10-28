<?php
	//require_once ('Classes/carrinho.php');
	include_once('Database/livroDao.php');
	
	session_start();
	if (!isset($_SESSION['carrinho'])){
		$_SESSION['carrinho'] = array();
	};
	
	$acao = $_GET['acao'];
	
	switch($acao){
		// Adicionar produtos
		case "add":{
			$id = intval($_GET['id']);
			if(!isset($_SESSION['carrinho'][$id])){
				$_SESSION['carrinho'][$id] = 1;
			} else {
				$_SESSION['carrinho'][$id] += 1;
			}
			header ('location: '.$_SERVER['HTTP_REFERER']);
			break;
		};
		// Remover produtos
		case "remove":{
			$id = intval($_GET['id']);
			if ($_SESSION['carrinho'][$id] > 0){
				$_SESSION['carrinho'][$id] -= 1;
			}
			if ($_SESSION['carrinho'][$id] == 0){
				unset($_SESSION['carrinho'][$id]);
			}
		}
		// Mostrar produtos
		case "show":{
			if (isset($_SESSION['carrinho'])){
				if($_SESSION['carrinho'] == 0){
					echo "Nenhum item adicionado!";
				} else {
					$precoTotal = 0;
					foreach($_SESSION['carrinho'] as $id => $qtd){
						$dao = new livroDao();
						$dao->mostraNoCarrinho($id);
						echo "<strong>Quantidde: </strong>".$qtd."<br/>";
						echo "<a href = 'iframe.php?acao=remove&id=".$id."'><img src = '../Imagens/botao-retira.png'
							alt = 'Retirar livro'
							style = '
								width: 15px;
								position: relative;
								left: 250px;
								top: 5px;
							'
							/>
							</a>
							";
						$preco = $dao->retornaValor($id);
						$precoTotal += ($preco * $qtd);
						echo "<hr/>";
					}
					if ($precoTotal == 0){
						echo "Nenhum livro adicionado!<br/><hr/>";
						
					}
					echo "Valor da compra: ".$precoTotal;
				}
				echo "<br/><a href = '../Back-end/fecharcompras.php' target = '_parent'>Fechar compras</a>";
				echo "<br/>";
				break;
			}
		}
		case "showtoClose":{
			if (isset($_SESSION['carrinho'])){
					if($_SESSION['carrinho'] == 0){
						echo "Nenhum item adicionado!";
					} else {
						$precoTotal = 0;
						foreach($_SESSION['carrinho'] as $id => $qtd){
							$dao = new livroDao();
							$dao->mostraNoCarrinho($id);
							echo "<strong>Quantidde: </strong>".$qtd."<br/>";
							echo "<a href = 'iframe.php?acao=remove&id=".$id."'><img src = '../Imagens/botao-retira.png'
								alt = 'Retirar livro'
								style = '
									width: 15px;
									position: relative;
									left: 250px;
									top: 5px;
								'
								/>
								</a>
								";
							$preco = $dao->retornaValor($id);
							$precoTotal += ($preco * $qtd);
							echo "<hr/>";
						}
						if ($precoTotal == 0){
							echo "Nenhum livro adicionado!<br/><hr/>";
							
						}
						echo "Valor da compra: ".$precoTotal;
					}
					echo "<br/>";
					break;
				}
		}
	}
?>