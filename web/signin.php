<?php

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$dbh = new PDO("pgsql:host=ec2-54-243-38-139.compute-1.amazonaws.com;port=5432;dbname=d89833096k0ivr", "uhieutjjtvpbri", "53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56");
 
	$name = $_POST['username'];
	$pass = $_POST['pass'];
	

 
	$testQuery = $dbh->prepare('SELECT * FROM public.ts_user WHERE user_name = :name');

	$testQuery->execute( array('name' => $name) );

	$row = $testQuery->fetch();
	$hash = $row['password'];
	
	if (password_verify($pass, $hash)) {
		$_SESSION['username'] = $_POST['username'];
		header('Location: welcome.php', true);
	}
	else{
		$message = "Your User Name or Password do not match";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
	}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Login Form</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <label>Username</label>
    <input type="text" id="username" placeholder="Enter Username" name="username" required>
	<br>
    <label>Password</label>
    <input type="password" id="pass" placeholder="Enter Password" name="pass" required>
	<br>
	<a href="signup.php">Signup</a>
</form>

</body>
</html>
