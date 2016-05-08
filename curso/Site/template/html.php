<?php 

// A classe html e suas funções foram criadas baseando-se no framework boostratrap, asssim temos componentes que podem ser chamados diretamente dentro de outros arquivos php sem a necessidade de reescrever HTML
	class html{
		//Header para incluir css e javascript
		function header(){
			echo '<!DOCTYPE html>
						<html>
							<head>
								<meta name="viewport" content="width=device-width, initial-scale=1">
								<title>Iniciando no PHP com Bootstrap</title>
								<link rel="stylesheet" href="css/bootstrap.min.css">
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
								            <li><a href="incluir.php">Adicionar DVD</a></li>
								            <li><a href="index.php">Listar DVDs</a></li>
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
									<div class="row">';
		}

		//footer
		function footer(){
			echo '</div>
				</div>		
			</body>
		</html>';
		}

				
		//input
		    function input($nome, $tipo, $placeholder, $tamanho, $required, $valor) {
		        if ($required == 'required') {
		            $obrigatorio = ' <span class="help-block">Obrigatório</span> ';
		        }
		        $total = 12;
		        $total = $total - $tamanho * 2;
		        echo '<div class="form-group">
		                    <label class="col-md-' . $tamanho . ' control-label" for="' . $nome . '">' . $placeholder . '</label>  
		                    <div class="col-md-' . $total . '">
		                       <input id="' . $nome . '" value="' . $valor . '" name="' . $nome . '" type="' . $tipo . '" placeholder="' . $placeholder . '" class="form-control input-md" ' . $required . '>' . $obrigatorio . '  
		                    </div>
		                    <div class="col-md-' . $tamanho . '"></div>
		                </div>';
		    }

		    //textarea
		    function textarea($nome, $placeholder, $tamanho, $required, $valor) {
		        if ($required == 'required') {
		            $obrigatorio = ' <span class="help-block">Obrigatório</span> ';
		        }
		        $total = 12;
		        $total = $total - $tamanho * 2;
		        echo '<div class="form-group"> '
		        . '<label class="col-md-' . $tamanho . ' control-label" for="' . $nome . '">' . $placeholder . '</label>  
		                    <div class="col-md-' . $total . '"> 
		    <textarea class="form-control " id="' . $nome . '" name="' . $nome . '"' . $required . '>' . $valor . '</textarea>' . $obrigatorio . '
		  </div>
		</div>';
		    }

		//botão
		    function button($nome, $placeholder, $tamanho, $class) {
		        $total = 12;
		        $total = $total - $tamanho * 2;
		        echo '<div class="form-group">
		                    <label class="col-md-' . $tamanho . ' control-label" for="' . $nome . '"></label>
		                    <div class="col-md-' . $total . '">
		                        <button id="' . $nome . '" name="' . $nome . '" type="submit" class="btn ' . $class . ' " data-style="contract-overlay" style="z-index: 10;">' . $placeholder . '</button>
		                    </div>
		                </div>';
		    }

		//alerta bootstrap
		    function alert($mensagem, $tipo) {
		        echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="alert alert-' . $tipo . '" role="alert"> 
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>' . $mensagem . '</div></div>';
		    }

		//cabeçalho para pagina (como legenda)
		    function pageHeader($mensagem, $subMensagem) {
		        echo '<div class="page-header">
		  <h1>' . $mensagem . ' <small>' . $subMensagem . '</small></h1>
		</div>';
		    }

		    //link em formato de botão  
		    function linkButton($link, $tipo, $titulo, $texto) {

		        echo '<a href="' . $link . '" class="btn btn-' . $tipo . '" title="' . $titulo . '">' . $texto . '</a>';
		    }

		//Select - combobox
		    function select($nome, $tamanho, $placeholder, $opcoes, $required) {
		        $total = 12;
		        $total = $total - $tamanho * 2;
		        if ($required == 'required') {
		            $obrigatorio = ' <span class="help-block">Obrigatório</span> ';
		        }
		        echo '<div class="form-group">
		                <label class="col-md-' . $tamanho . ' control-label" for="selectbasic">' . $placeholder . '</label>
		                <div class="col-md-' . $total . '">
		                  <select id="' . $nome . '" name="' . $nome . '" class="form-control" ' . $required . '>
		                    <option value="">' . $placeholder . '</option>';
		        echo $opcoes;
		        echo '</select>' . $obrigatorio . '
		                </div>
		              </div>';
		    }

		//radio
		    function radio($tamanho, $placeholder, $opcoesArray, $nome) {
		        $total = 12;
		        $total = $total - $tamanho;
		        echo'<div class="form-group">
		  <label class="col-md-' . $tamanho . ' control-label" for="' . $nome . '">' . $placeholder . '</label>
		  <div class="col-md-' . $total . '">';
		        foreach ($opcoesArray as $key => $value) {
		            $str = preg_replace('/[áàãâä]/ui', 'a', $value);
		            $str = preg_replace('/[éèêë]/ui', 'e', $str);
		            $str = preg_replace('/[íìîï]/ui', 'i', $str);
		            $str = preg_replace('/[óòõôö]/ui', 'o', $str);
		            $str = preg_replace('/[úùûü]/ui', 'u', $str);
		            $repor = preg_replace('/[ç]/ui', 'c', $str);

		            echo '<div class="radio">
		    <label for="' . $key . '">
		      <input type="radio" name="' . $nome . '" id="' . $key . '" value="' . $repor . '">
		      ' . $value . '
		         </label>';
		        }
		        echo'</div>
		  </div>
		</div>';
		    }

	}
?>