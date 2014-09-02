<?php
require_once("./authSession.php");
require_once("./confBD.php");
include_once("./cabecalho_bdcompleto.html");
?>

    <div class="container">

      <div class="starter-template">
        <h3 class="sub-header">Welcome to Year Book - <?PHP echo utf8_decode($_SESSION['nomeCompleto']);?></h3>    
      </div>
	  
<?php
try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
		$nomeUser = utf8_encode($_SESSION['login']);
				
		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM participantes';
	
	   if(!empty($_POST['filtro'])){
	         $nomeBusca = utf8_encode(htmlspecialchars($_POST['filtro']));
			 $nomeBusca = "%".$nomeBusca."%";
			 $SQLSelect .= ' AND nomeCompleto like ?';
		}
			
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);					  
		if(!empty($_POST['filtro'])){				
			//executa a sentença SQL com o valor passado por parâmetro
			$pesquisar = $operacao->execute(array($nomeUser, $nomeBusca));
		}
		else
			$pesquisar = $operacao->execute(array($nomeUser));
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
		// se há resultados, os escreve em uma tabela
		if (count($resultados)>0){
            echo "<div class=\"row\">";

            		echo "<div class=\"col-sm-4\">";	
	            	           	echo "<div class=\"well\">";
	            	           	echo "<h2>Seja bem vindo</h2>";
	            	           	echo    "<h4>".utf8_decode($_SESSION['nomeCompleto'])."</h4>";
	            	           	echo    "<h4>".utf8_decode($_SESSION['login'])."</h4>";

	            	           	echo 	"<figure>";
			echo 		"<a class=\"thumbnail\" href=\"meu_perfil.php?filtro=".utf8_encode($_SESSION['login'])."\">";
			echo			"<img class=\"img-responsive\" src=\"".utf8_encode($_SESSION['foto_usuario_logado'])."\" >";          
			echo		"</a>";
			echo 	"</figure>";	
	            	           	
	            	           	echo "</div>";//Well  
            	           	echo "</div>";//col-sm-4
            	           	echo "<div class=\"col-sm-8\">";	
            	           	echo "</div>";//col-sm-4
            	           	echo "</div>";//col-sm-4
            echo "<div class=\"container\">";

                        foreach($resultados as $contatosEncontrados){//para cada elemento do vetor de resultados...
                            echo "<div class=\"col-sm-4\">";
                            echo "<div class=\"well\">";
                            echo "<figure>";
                            echo "<a href=meu_perfil.php?filtro=".utf8_decode($contatosEncontrados['login'])."><img width=100px height=100px src=\"".utf8_decode($contatosEncontrados['arquivoFoto'])."\"></a>";    
                            echo "<h4>".utf8_decode($contatosEncontrados['nomeCompleto'])."</h4>";
                            echo "</figure>";
                            echo "</div>";//Well
                            echo "</div>";//Well
                        }
                        
                        echo "</div>";//Row


                        
		
		
		

                
            echo "</div>"; //Container
            
		}
		else{
			echo'<div class="starter-template">';
			echo"\n<h3 class=\sub-header\>Nenhum contato encontrado.</h3>";
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
	  
    </div><!-- /.container -->

<?php
include_once("./rodape_bdcompleto.html");
?>