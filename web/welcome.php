<?php
	session_start();
	if ($_SESSION['username'] === NULL)
	{
		header('Location: signin.php', true)
	}
	else
	{
		echo "<h1>Welcome " . $_SESSION['username'] . "</h1>";
	}
?>