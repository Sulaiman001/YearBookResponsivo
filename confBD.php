<?php
 function conn_mysql(){

   	$servidor = 'br-cdbr-azure-south-a.cloudapp.net';
   
	$porta = 3306;
   
	$banco = "yearbook";
   
	$usuario = "bd8b26c716bb15";
   
	$senha = "bbc48fa6";
   
	try{
     
		$conn = new PDO("mysql:host=$servidor;
						   
		port=$porta;
						   
		dbname=$banco", 
						   
		$usuario, 
						   
		$senha,
						   
		array(PDO::ATTR_PERSISTENT => true));
		  
		return $conn;
    }
    catch(PDOException $e){
		echo "<br> Ocorreu um erro ao conectar o banco de dados, contate o susporte. <br> ";
        echo $e;
    }

   }

?>
