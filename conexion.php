<?php
	$database="crud";
	$user='root';
	$password='';
	$dbhost	= "localhost";	   // localhost or IP

	

try {
	
	$con=new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

} catch (PDOException $e) {
	echo "Error".$e->getMessage();
}

?>