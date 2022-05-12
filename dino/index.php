
<!doctype HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<link rel="stylesheet" href="style2.css">
		<title>Dino Game</title>
	</head>
	<body>

<input type="text" style="display:none" id="hiddenVal" />
<body onload="loadValues();">




		<div class="game">
			<div class="character dino"></div>
			<div class="character cactus"></div>
			<p class="score">SCORE: <span>0</span></p>
			<p class="hiscore">highest score: <span>0</span></p>
			<button class="restart-btn">restart</button>

			<button onclick="myFunction()">store Your Score</button>

		</div>

		<script src="main.js"></script>
		<script>
		function myFunction() {
			location.replace("http://localhost/root/scoreReg.php")
		}
</script>
	</body>
</html>
