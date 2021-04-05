<!doctype html>
<?php include "getDataFromDb.php" ?>
	<head>
		<title> Hello World</title>
		<link rel="stylesheet" href="myfile.css">
		<meta charset="UTF-8">
		 <script type="text/javascript" src="script.js"></script>
		 <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script>
	</head>
	<body onload="generateCardJS();">
		<header>
			<h1 class='MainTitle'>Streamder</h1>
		</header>
		<section>
			<div id="testdiv">

			</div>

			<?php ?>
			
			
			<div class="ButtonsCard">
				<div style='background-image:url("images/logos/croix.png");' onclick="swip('left');DeleteCardJS()"></div>
				<div style='background-image:url("images/logos/etoile.png");'></div>
				<div style='background-image:url("images/logos/coeur.png");'onclick="swip('right');DeleteCardJS()"></div> 
			</div>
		</section>
		

	</body>

</html>