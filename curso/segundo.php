<?php
Class divisiveis{
	public function verificaDivisoes($numero, $valor, $resultado){
		if($valor == 0){
			echo "$numero divisivel por $resultado <br>";
		}else{
			echo "$numero não divisivel por $resultado <br>";
		}
	}
}


	if($_GET['acao'] == "s"){
		$numero = $_POST['numero'];

		$divisivelPorDez = $numero % 10;
		$divisivelPorCinco = $numero % 5;
		$divisivelPorDois = $numero % 2;

		$imprime = new divisiveis();
		$imprime->verificaDivisoes($numero, $divisivelPorDez, 10);
		$imprime->verificaDivisoes($numero, $divisivelPorCinco, 5);
		$imprime->verificaDivisoes($numero, $divisivelPorDois, 2);
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Exercicios</title>
	</head>
	<body>
		<form action="segundo.php?acao=s" method="post">
			<input type="number" name="numero" placeholder="Forneça um número">
			<br>
			<button type="submit">Enviar</button>
		</form>	
	</body>
</html>