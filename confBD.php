<?php
 function conn_mysql(){

   	$servidor = 'au-cdbr-azure-east-a.cloudapp.net';
   
	$porta = 3306;
   
	$banco = "cdb_6771335862";
   
	$usuario = "b05897012f982e";
   
	$senha = "6b33cf3e";
   
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
