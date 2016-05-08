<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Exercicios</title>
	</head>
	<body>

	<?php
		class taboada{

		    function bloco($elemento) {
		        for ($i = 1; $i <= 10; $i++) {
		            $total = $i * $elemento;
		            echo "$elemento x $i = $total<br/>";
		        }
		    }
		    function taboadaTotal($limite) {
		        for ($j = 1; $j <= $limite; $j++) {
		            $this->bloco($j);
		        }
		    }
		}

		$taboada = new taboada();
		$taboada->taboadaTotal(10);
	?>
	
	</body>
</html>