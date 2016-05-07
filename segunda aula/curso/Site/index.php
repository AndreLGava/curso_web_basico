<?php
	include "config/domain.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Iniciando no PHP com Bootstrap</title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/font-awesome.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
		    <!-- Mostra o icone das três barinhas quando em dispositivos mobile-->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Locadora</a>
		    </div>
		    <!-- Links e outras coisas diponiveis para a barra superior-->
		    <!-- Conteúdo alinhado a esquerda -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DVD <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Adicionar DVD</a></li>
		            <li><a href="#">Listar DVDs</a></li>
		          </ul>
		        </li>
		      </ul>
		      <!-- Elementos alinhados a direita na navbar note a classe navbar-right ela que faz isso-->
		      <ul class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gênero <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Adicionar Gênero</a></li>
		            <li><a href="#">Listar Gênero</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					teste
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					teste
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					teste
				</div>
			</div>
		</div>		
	</body>
</html>