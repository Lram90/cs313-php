<?php 
	session_start();
	//print_r($_SESSION);
	if(!empty($_SESSION['submitted'])){
		header('Location: https://stormy-spire-65023.herokuapp.com/answers.php', true);
	}
?>

<!doctype html>
<html>
<head>
	<title>CS 313 Prove 03</title>
	<link rel="stylesheet" type="text/css" href="survey.css">
	<!--<script type="text/javascript" src="week07.js"></script>-->
</head>
<body>
	<h1>Internet Usage Survey</h1>
	<h2>CS 313 Week 3 Prove Assignment</h2>
	<a href="assignments.html">Back to Assignments</a>
	<form action="answers.php" method="post">
		<div class="question">How often do you use the internet?<br>
		<div class="answers"><input type="radio" name="often" value="rarely" required="required">Rarely Ever<br>
		<input type="radio" name="often" value="sometimes" required="required">Sometimes<br>
		<input type="radio" name="often" value="often" required="required">Often<br>
		<input type="radio" name="often" value="All The Time" required="required">All The Time<br>
		</div></div>
		
		<div class="question">What do you do most online?<br>
		<div class="answers"><input type="radio" id="social" value="Social Media" name="use" required="required">
		Use Social Media</input><br>
		<input type="radio" id="game" value="Playing Games" name="use" required="required">
		Play Video Games</input><br>
		<input type="radio" id="shop" value="Shop" name="use" required="required">
		Shop</input><br>
		<input type="radio" id="video" value="Watching Videos" name="use" required="required">
		Watch Vidoes</input><br>
		<input type="radio" id="research" value="Reasearch" name="use" required="required">
		Research Information</input><br>
		</div></div>	   
			   
		<div class="question">What device are you usually online with?<br>
		<div class="answers"><input type="radio" id="desktop" value="Desktop" name="device" required="required">Desktop Computer</input><br>
		<input type="radio" id="laptop" value="Laptop" name="device" required="required">Laptop Computer</input><br>
		<input type="radio" id="tablet" value="Tablet" name="device" required="required">Tablet/I-Pad</input><br>
		<input type="radio" id="phone" value="Phone" name="device" required="required">Smart Phone</input><br>
		<input type="radio" id="console" value="Game Console" name="device" required="required">Video Game Console</input><br>
		</div></div>	  

			  
		<div class="question">How do you usually navigate a web-page?<br>
		<div class="answers"><input type="radio" name="nav" value="tabs" required="required">The Tabs at the top<br>
		<input type="radio" name="nav" value="search" required="required">The Search Bar<br>
		<input type="radio" name="nav" value="links" required="required">The links inside the page body<br>
		</div></div>
		
		<div class="submit">
		<input type="submit" name="Submit" class="button"/>
		<a href="answers.php">>To Results</a>
		</div>
		
	</form>
	
	
</body>
</html>