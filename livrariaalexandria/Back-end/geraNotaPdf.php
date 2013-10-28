<?php
require_once('../../mpdf/mpdf.php');
require_once('DataBase/clienteDAO.php');
require_once('DataBase/store_pdo.php');


define('MPDF_PATH', 'class/mpdf/');
include(MPDF_PATH.'mpdf.php');

session_start('nf');
$mpdf=new mPDF();
$mpdf->WriteHTML("<h1>Livraria Alexandria</h1>");
$mpdf->WriteHTML('<hr/>');
$mpdf->WriteHTML("<h3>Dados pessoais:</h3>");
$mpdf->WriteHTML('Nome: '.$_SESSION['nome']);

$cDao = new clienteDao();
$codEnd = $cDao->returnEnd($_SESSION['username']);
$sp = new store_pdo();
$p = $sp->getInstance();

$query = $p->query ("SELECT * FROM endereco WHERE idEnd = ".$codEnd);
if ($row = $query->fetch(PDO::FETCH_ASSOC)){
	$mpdf->WriteHTML("<br/>Rua: ".$row ['rua']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Numero:".$row ['numero']);
	$mpdf->WriteHTML('Bairro: '.$row['bairro'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CEP:'.$row['cep']);
	$mpdf->WriteHTML('Cidade: '.$row ['cidade'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Estado: '.strtoupper($row ['estado']));
}
$mpdf->WriteHTML('<hr/>');
$mpdf->WriteHTML("<h3>Compras:</h3>");

$precoTotal = 0;
foreach($_SESSION['carrinho'] as $id => $qtd){
	$query = $p->query("SELECT * FROM livros WHERE idLivro = ".$id);
	if ($row = $query->fetch(PDO::FETCH_ASSOC)){
		
		$mpdf->WriteHTML("Nome do livro: ".$row['nome']);
		$mpdf->WriteHTML("Preco: ".$row['precoVenda']." - Quantidade: ".$qtd);
		$precoTotal += ($row['precoVenda'] * $qtd);
	}
}
$mpdf->WriteHTML('<hr/>');
$mpdf->WriteHTML("Total: R$".$precoTotal);
$_SESSION['carrinho'] = null;
$mpdf->Output();
exit();
?>