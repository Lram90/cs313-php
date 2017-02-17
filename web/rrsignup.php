<?php
 session_start();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$password = $_POST['password'];
	
		$hash = password_hash($password, PASSWORD_DEFAULT);
	
		$dbh = new PDO("pgsql:host=ec2-54-243-38-139.compute-1.amazonaws.com;port=5432;dbname=d89833096k0ivr", "uhieutjjtvpbri", "53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56");

	
		$stmt = $dbh->prepare('INSERT INTO public.user(user_name, password) VALUES(:name, :hash)');
		$stmt->execute( array('name' => $_POST['user'], 'hash' => $hash) );
		
		header('Location: rrlogin.php', true);
	}
 ?>

<!doctype HTML>
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

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="container">
    <label><b>UserName</b></label><br>
    <input type="text" placeholder="Enter UserName" name="newUserName" required>
	<br>
    <label><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="code" required>
	<br>
    <label><b>Repeat Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
	<br>
      <button type="submit">Sign Up</button>
    </div>
  </div>
</form>
</body>