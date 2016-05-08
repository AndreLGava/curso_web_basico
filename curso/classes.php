<?php
class html{
	function header(){
		echo "<html>
				<head>
					<title>André</title>
				</head>
				<body>";
	}

	function footer(){
		echo "	</body>
		</html>";
	}

	function geraParagrafo(){
		$paragrafo = "";
		for($i =0; $i < 10; $i++){
			$paragrafo .= "<p>Isto é muito legal, vocês não acham?</p>";
		}
		return $paragrafo;
	}
}
