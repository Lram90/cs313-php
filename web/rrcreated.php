<?php
 session_start();
 ?>
 
 <!doctype html>
 <head>
 </head>
 <body>
 <?php
	 $db = pg_connect('host=ec2-54-243-38-139.compute-1.amazonaws.com dbname=d89833096k0ivr user=uhieutjjtvpbri password=53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56');
	 $name = $_POST['newUserName'];
	 $password = $_POST['code'];

	 echo $name;
	 echo $password;
	 
	 $query = 'INSERT INTO public.user(user_name, password) VALUES(:name, :password)';
	 
	 echo $query;
	 
       $preparedStatement = pg_prepare($query);

	   echo $preparedStatement;
	   
	   echo "<br>" . $name . "hello";
	   $preparedStatement->bindValue(':name', $name);
	   echo "<br>" . $name . "1";
	   
	   $preparedStatement->bindValue(':password', $password);
	   echo "<br>" . $name. "2";
	   
	   //$preparedStatement->execute();
		
	//echo "<h1>Account created Successfully</h1><a href='rrlogin.php'>Back to Login</a>";
 ?>
 </body>
 </html>