<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require_once('dbconn.php');

class dbmethods {

private $db;// = Database::getInstance();
private $connglopal;// = $db->getConnection();

public function __construct() {
$this->db = Database::getInstance();
$this->connglopal = $this->db->getConnection();
}


public function ViewUsers(){
	$conn=$this->connglopal;
		$sql = "SELECT * FROM user";
	$result = $conn->query($sql);
		if ($result->num_rows > 0) {$return=$result;}else {$return=0;}
	//$conn->close();
	return $return;
}
}
