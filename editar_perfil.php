<?php
require_once("./authSession.php");
require_once("./confBD.php");
include_once("./cabecalho_bdcompleto.html");
?>
</br></br>
    <div class="container">

      <div class="starter-template">
        <h3 class="sub-header">Edição de perfil <?PHP echo utf8_decode($_SESSION['nomeCompleto']);?></h3>    
      </div>
	  
<?php
try{
	// instancia objeto PDO, conectando no mysql
	$conexao = conn_mysql();
		
		$nomeUser = utf8_encode($_SESSION['login']);

		// instrução SQL básica (sem restrição de nome)
		$SQLSelect = 'SELECT * FROM participantes inner join cidades on participantes.cidade = cidades.idCIdade  where login = "'.$nomeUser.'"';
		
		
		//prepara a execução da sentença
		$operacao = $conexao->prepare($SQLSelect);					  

		$pesquisar = $operacao->execute();
		//captura TODOS os resultados obtidos
		$resultados = $operacao->fetchAll();
		
		// fecha a conexão (os resultados já estão capturados)
		$conexao = null;
		
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
		
		// se há resultados, os escreve em uma tabela
		if (count($resultados)>0){
		
			
		foreach($resultados as $contatosEncontrados){		//para cada elemento do vetor de resultados...
				

		echo "<div class=\"col-lg-5 col-md-5 col-xs-5 \">";			


					?>	
									
				
	
	
	 <form role="form" method="post" action="./edita_perfil_final.php" class="form-signin" enctype="multipart/form-data">

		  <div class="form-group">
			<label for="InputNome">Nome Completo:</label>
			<?php
			echo "<input type=\"text\" class=\"form-control\" id=\"InputNome\" name=\"nomeCompleto\" placeholder=\"Nome completo\" value=\"".utf8_decode($contatosEncontrados['nomeCompleto'])."\" required autofocus>"
			?>
		  </div>
		  <div class="form-group">
		  <label for="InputLogin">Login:</label>
			<?php
			echo "<input type=\"text\" class=\"form-control\" id=\"InputLogin\" name=\"nomeUsuario\" placeholder=\"Login desejado\" value=\"".utf8_decode($contatosEncontrados['login'])."\" readonly>"
			?>
		  </div>
		  <div class="form-group">
			<label for="InputSenha">Senha:</label>
			<input type="password" class="form-control" id="InputSenha" name="passwd" placeholder="Senha (4 a 8 caracteres)">
		  </div>
		  <div class="form-group">
			<label for="InputSenhaConf">Confirmação de Senha:</label>
			<input type="password" class="form-control" id="InputSenhaConf" name="passwd2" placeholder="Confirme a senha">
		  </div>
		  <div class="form-group">
			<label for="InputEmail">Email:</label>
			<?php
			echo "<input type=\"text\" class=\"form-control\" id=\"InputEmail\" name=\"email\" placeholder=\"Email\" value=\"".utf8_decode($contatosEncontrados['email'])."\" required autofocus>"
			?>
		  </div>
		  <div class="form-group">
			<label for="InputDescricao">Descrição:</label>
			<?php
			echo "<input type=\"text\" class=\"form-control\" id=\"InputDescricao\" name=\"descricao\" placeholder=\"Descrição\" value=\"".utf8_decode($contatosEncontrados['descricao'])."\" required autofocus>"
			?>
		  </div>

			
		<div class="form-group">
				<select name="estado" size="1" required >
			  
			  <?php
					// instancia objeto PDO, conectando no mysql
					$conexao = conn_mysql();
					
					// instrução SQL básica (sem restrição de nome)
					$SQLSelect = 'select * from estados';
					//prepara a execução da sentença
					$operacao = $conexao->prepare($SQLSelect);
					//executa a sentença SQL com o valor passado por parâmetro
					$pesquisar = $operacao->execute();	
					//captura TODOS os resultados obtidos
					$resultados = $operacao->fetchAll();
					// fecha a conexão (os resultados já estão capturados)
					$conexao = null;
				if (count($resultados)>0){
					foreach($resultados as $contatosEncontrados){		//para cada resultados...
						echo "<option value='".($contatosEncontrados['idEstado'])."'>".($contatosEncontrados['sigaEstado'])."</option>";						
					}
				}

			   ?>
			</select>
		</div>	
		<!-- VOU IMPLEMENTAR DEPOIS A SELEÇÃO DE ESTADOS PARA CARREGAR CIDADE POIS NÃO TIVE TEMPO -->
		<div class="form-group">
				<select name="cidade" size="1" required >
			  
			  <?php
					// instancia objeto PDO, conectando no mysql
					$conexao = conn_mysql();
					
					// instrução SQL básica (sem restrição de nome)
					$SQLSelect = 'select * from cidades';
					//prepara a execução da sentença
					$operacao = $conexao->prepare($SQLSelect);
					//executa a sentença SQL com o valor passado por parâmetro
					$pesquisar = $operacao->execute();	
					//captura TODOS os resultados obtidos
					$resultados = $operacao->fetchAll();
					// fecha a conexão (os resultados já estão capturados)
					$conexao = null;
				if (count($resultados)>0){
					foreach($resultados as $contatosEncontrados){		//para cada resultados...
						echo "<option value='".($contatosEncontrados['idCidade'])."'>".($contatosEncontrados['nomeCidade'])."</option>";						
					}
				}

			   ?>
			</select>
		</div>

			
		  <button type="submit" class="btn btn-primary">Atualizar</button>
		  <a href="./excluirUsuario.php" type="button" class="btn btn-danger">Deletar perfil</a>
	 </form>

						
					
						
		
					
<?php		
	}
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
	  
    </div><!-- /.container -->

<?php
include_once("./modelos/rodape_bdcompleto.html");
?>