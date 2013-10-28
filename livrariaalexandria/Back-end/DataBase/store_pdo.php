<?php
class store_pdo {
	private $db;
	
	public function store_pdo (){
	$config['db'] = array(
		'host'		=> 'localhost:3307',
		'username' 	=> 'root',
		'password' 	=> 'usbw',
		'dbname' 	=> 'alexandria'
		);

		$this->db = new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'],
			$config['db']['username'], $config['db']['password']);
		//echo "conectado!";
	}
	
	public function getInstance(){
		return ($this->db);
	}
}
?>