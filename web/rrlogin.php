
<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Rexburg Rides</title>
<link rel="stylesheet" type="text/css" href="rrstyle.css">
</head>
<body>

<h2>Login Form</h2>

<form action="rrindex.php" method="post" >

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Login</button>
  </div>
</form>
<p>New to Rexburg Rides?</p>
<a href="rrsignup.php">Sign Up for an Accout</a>

</body>
</html>
