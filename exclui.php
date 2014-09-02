<?php
require_once("./authSession.php");
require_once("./confBD.php");
?>

<?php
try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
		$nomeUser = utf8_encode($_SESSION['login']);

		// instrução SQL básica (sem restrição de nome)
$SQLSelect = 'DELETE FROM participantes where nomeCompleto = ".utf8_decode($_SESSION['nomeCompleto'])."';
				
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);					  

		$pesquisar = $operacao->execute();
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;

		echo "ok..."
		}
		else{
			echo'<div class="starter-template">';
			echo"\n<h3 class=\sub-header\>Nenhum participante encontrado.</h3>";
			echo'</div>';
		}
	
	} //try
	catch (PDOException $e)
	{
    // caso ocorra uma exceção, exibe na tela
    echo "Erro!: " . $e->getMessage() . "<br>";
    die();
	}
	
?>	