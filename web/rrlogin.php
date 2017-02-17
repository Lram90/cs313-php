
<?php
	session_start();
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$dbh = new PDO("pgsql:host=ec2-54-243-38-139.compute-1.amazonaws.com;port=5432;dbname=d89833096k0ivr", "uhieutjjtvpbri", "53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56");
 
	$name = $_POST['uname'];
	$pass = $_POST['psw'];
	

 
	$testQuery = $dbh->prepare('SELECT * FROM public.user WHERE user_name = :name');

	$testQuery->execute( array('name' => $name) );

	$row = $testQuery->fetch();
	$hash = $row['password'];
	
	if (password_verify($pass, $hash)) {
		$_SESSION['username'] = $_POST['username'];
		header('Location: rrindex.php', true);
	}
	else{
		$message = "Your User Name or Password do not match";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Rexburg Rides</title>
<link rel="stylesheet" type="text/css" href="rrstyle.css">
<style>
body {
	background: rgb(120, 132, 190);
}
</style>
</head>
<body>
<div class="head"><!--easier to format layout-->
<img src="rrlogo.png"></img><!--get a logo figured out for here-->
<h1>Rexburg Rides</h1>
</div>
<h2>Login</h2>

<form action="rrindex.php" method="post" >

  <div class="container">
    <label><b>Username</b></label><br>
    <input type="text" placeholder="Enter Username" name="uname" required>
	<br>
    <label><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required>
        <br>
    <button type="submit">Login</button>
  </div>
</form>
<p>New to Rexburg Rides?</p>
<a href="rrsignup.php">Sign Up for an Accout</a>

</body>
</html>
