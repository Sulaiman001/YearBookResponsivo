<?php
 function conn_mysql(){

   	$servidor = 'localhost';
   
	$porta = 3306;
   
	$banco = "daw_yearbook";
   
	$usuario = "root";
   
	$senha = "root";
   
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