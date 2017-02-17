
<?php
	session_start();
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
<h2>Login Form</h2>

<form action="rrindex.php" method="post" >

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
	<br>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        <br>
    <button type="submit">Login</button>
  </div>
</form>
<p>New to Rexburg Rides?</p>
<a href="rrsignup.php">Sign Up for an Accout</a>

</body>
</html>
