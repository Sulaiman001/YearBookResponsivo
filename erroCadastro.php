<?php
//require_once("./authSession.php");
include_once("./cabecalho_bdcompleto.html");
?>

<?php
echo "<br>";
			echo "<br>";
			echo "<br>";
			 echo "<div class=\"jumbotron\">";
			 echo "<h3>Problemas no cadastro por favor corrija e tente novamente.</h1>\n";
			 echo "<p class=\"lead\"><a href=\"./index.php\">Página principal</a></p>\n";
			 echo "<p>Erro encontrado: ".$e."</p>";
			 echo "</div>";

?>
<?php
include_once("./modelos/rodape_login.html");
?>