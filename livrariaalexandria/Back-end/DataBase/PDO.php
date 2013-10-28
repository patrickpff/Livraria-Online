<?php
class store_pdo {
	private $db;
	
	public function PDO (){
	$config['db'] = array(
		'host'		=> 'localhost:3307',
		'username' 	=> 'root',
		'password' 	=> 'usbw',
		'dbname' 	=> 'alexandria'
		);

		$db = new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'],
			$config['db']['username'], $config['db']['password']);
		echo "conectado!";
	}
	
	public function getInstance (){
		return ($db);	
	}
		//$query = $db->query("SELECT nomeCompleto FROM usuario");
		
		/*while ($row = $query->fetch(PDO::FETCH_ASSOC)){
			echo $row['nomeCompleto'], '<br/>';
		}*/
}
?>