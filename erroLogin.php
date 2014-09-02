<?php
setcookie("loginAgenda", '', time()-42000); 
setcookie("loginAutomatico", '', time()-42000); 

include_once("./cabecalho_login.html");

?>
    <div class="container">
      <div class="alert alert-danger fade in">
        <h1>Não foi possível realizar o login.</h1>
		<p class="lead"><a href="./login.php">Tente novamente.</a></p>        
       </div>	  
    </div><!-- /.container -->

<?php
include_once("./rodape_login.html");
?>