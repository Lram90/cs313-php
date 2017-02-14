<?php
	session_start();
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$password = $_POST['password'];
	
		$hash = password_hash($password, PASSWORD_DEFAULT);
	
		$dbh = new PDO("pgsql:host=ec2-54-243-38-139.compute-1.amazonaws.com;port=5432;dbname=d89833096k0ivr", "uhieutjjtvpbri", "53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56");

	
		$stmt = $dbh->prepare('INSERT INTO public.ts_user(user_name, password) VALUES(:name, :hash)');
		$stmt->execute( array('name' => $_POST['user'], 'hash' => $hash) );
		
		header('Location: signin.php', true);
	}
	?>

<!doctype HTML>

<body>
<h2>Signup Sheet</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <label>Username</label>
    <input type="text" id="user" placeholder="Enter Username" name="user" required>
	<br>
    <label>Password</label>
    <input type="password" id="password" placeholder="Enter Password" name="password" required>
	<br>
    <label>Repeat Password</label>
    <input type="password" id="repeat" placeholder="Repeat Password" name="repeat" required>
	<br>
      <button type="submit" class="signupbtn">Sign Up</button>
	  

 

</form>
</body>