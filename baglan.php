<?php 
try {
	$db=new PDO("mysql:host=localhost;dbname=ınstagram;charset=utf8",'root','123456789');
	//echo"basarılı";

} catch (PDOExpection $e) {
	echo $e->getMessage();
}
 ?>