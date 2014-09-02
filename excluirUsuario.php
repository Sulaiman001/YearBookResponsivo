<?php
require_once("./authSession.php");
require_once("./confBD.php");
include_once("./cabecalho_bdcompleto.html");
?>
</br></br>
</br></br>
    <div class="container">
<?php

	echo "Confirma que deseja excluir o perfil de ";
	echo utf8_decode($_SESSION['nomeCompleto']);
	echo "?";
	echo "</h1>";
	echo "<a href='./exclui.php'' class='btn btn-danger'>Sim";
	echo "</a>";
		

	
?>	
	  
    </div><!-- /.container -->

<?php
include_once("./modelos/rodape_bdcompleto.html");
?>