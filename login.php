<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Year Book</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php

    if(isset($_COOKIE['loginAutomatico'])){
       header("Location: ./VerificarLogin.php");
    }
    else if(isset($_COOKIE['loginAgenda']))
        $nomeUser = $_COOKIE['loginAgenda'];
        else $nomeUser="";

    include_once("cabecalho_login.html");
?>
      
      
      
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <br>
      <br>
      <br>  
      <div class="starter-template">
      <div class="row">
         <div class="col-xs-6 col-sm-4">
             
         </div>
          
          <div class="col-xs-6 col-sm-4">
              <form class="form-signin" role="form" method="post" action="./verificarLogin.php">
                <h3 class="form-signin-heading">Year book</h3>
                <input type="text" class="form-control" placeholder="Login" name="login" value="<?php echo $nomeUser?>"required autofocus>
                <br>
                <input type="password" class="form-control" placeholder="Senha" name="passwd" required>
                <br>
                <label>
                  <input type="checkbox"  name="lembrarLogin" value="loginAutomatico"> Permanecer conectado
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                <br>
                <button class="btn btn-lg btn-success btn-block" type="button" onclick="javascript:window.location.href='./cadastroUsuario.php'">Cadastrar-se</button>
          </form>
 
         </div>
          <div class="col-xs-6 col-sm-4">
             
         </div>
      </div>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
