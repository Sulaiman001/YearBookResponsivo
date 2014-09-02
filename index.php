<?php
require_once("./confBD.php");
if(isset($_COOKIE['loginAutomatico'])){
   header("Location: ./verificarLogin.php");
}
else if(isset($_COOKIE['loginAgenda']))
	$nomeUser = $_COOKIE['loginAgenda'];
	else $nomeUser="";
	
include_once("./cabecalho_login.html");
?>

    <div class="container">
        <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <div class="starter-template">
            <form class="form-horizontal" role="form" method="post" action="./verificarLogin.php">
            <h3 class="form-signin-heading">Year Book - Login</h3>
            <input type="text" class="form-control" placeholder="Login" name="login" value="<?php echo $nomeUser?>"required autofocus>
            <br>
            <input type="password" class="form-control" placeholder="Senha" name="passwd" required>
            <label>
              <br>
              <input type="checkbox"  name="lembrarLogin" value="loginAutomatico"> Permanecer conectado
            </label>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    		<br>
    		<button class="btn btn-lg btn-success btn-block" type="button" onclick="javascript:window.location.href='./cadastroUsuario.php'">Cadastrar-se</button>
              <h4>Lista dos alunos da PUC Minas cadastrados até o momento</h4>
          </form>
          </div>

        </div><!-- /.container -->
        </div>
   </div>

<!-- MONTA TUMBS-->
<?php
try{
    // instancia objeto PDO, conectando no mysql
    $conexao = conn_mysql();    
        
    // instrução SQL básica (sem restrição de nome)
    $SQLSelect = 'SELECT * FROM participantes limit 10';

    //prepara a execução da sentença
    $operacao = $conexao->prepare($SQLSelect);            
    $pesquisar = $operacao->execute(array($nomeUser));
    //captura TODOS os resultados obtidos
    $resultados = $operacao->fetchAll();
    
    // fecha a conexão (os resultados já estão capturados)
    $conexao = null;
    
    // se há resultados, os escreve em uma tabela
    if (count($resultados)>0){
      echo "<div class=\"container\">";
      echo "<div class=\"row\">";


        echo "<div class=\"col-sm-4\">";  
        echo "</div>";
        echo "<div class=\"col-sm-8\">";  

        foreach($resultados as $contatosEncontrados){   //para cada elemento do vetor de resultados...

        echo "<div class=\"col-lg-1 col-md-1 col-xs-2 thumbnail\">";
       echo   "<figure>";
      echo    "<a class=\"thumbnail\" href=\"meu_perfil.php?filtro=".utf8_encode($_SESSION['login'])."\">";
      echo       "<img class=\"img-responsive\" src=\"".utf8_decode($contatosEncontrados['arquivoFoto'])."\" >";          
      echo    "</a>";
      echo  "</figure>";
        echo    "<h5>".utf8_decode($contatosEncontrados['nomeCompleto'])."</h5>";
        echo "</div>";
        
    
         }
    echo "</div>"; //Row
    echo "</div>"; //Row
    echo "</div>";// Fim div col-sm-
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
<!-- FIM  DO THUMB-->


<?php
include_once("./rodape_login.html");
?>