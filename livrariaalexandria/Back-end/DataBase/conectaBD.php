<?php
class conectaBD extends PDO {
	private static $instancia;
	protected $connection;
	private $hostname;
	private $dbname;
	private $port;
	private $username;
	private $password;
	
	public function conectaBD (){
		$hostname = 'localhost';
		$dbname = 'alexandria';
		$port = 8081;
		$username = 'root';
		$password = '';
		try {
			$this->connection = new PDO ("mysql:host=$hostname;port=$port;dbname=$dbname", $username, $password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		} catch (PDOException $e){
			$this->connection = null;
			die ($e->getMessage());
		}
	}
	
	public function getInstance (){
		if (!isset(self::$instancia)){
			try {
					self::$instancia = new conectaDB ("mysql:host=$hostname;dbname=$dbname", $username, $password);
			} catch (Exception $e){
				echo '<h1>Erro ao conectar!</h1>';
				exit();
			}
		}
		echo '<h1>Conectado!</h1>';
		return self::$instancia;
	}
	
}
?>