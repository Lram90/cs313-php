<?php
 session_start();
 ?>
 
 <!doctype html>
 <head>
 </head>
 <body>
 <?php
 
 
	 $db = new PDO("pgsql:host=ec2-54-243-38-139.compute-1.amazonaws.com;port=5432;dbname=d89833096k0ivr", "uhieutjjtvpbri", "53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56");
	 
	 
	 /*$db = pg_connect('host=ec2-54-243-38-139.compute-1.amazonaws.com dbname=d89833096k0ivr user=uhieutjjtvpbri password=53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56');*/
	 
	 $name = $_POST['newUserName'];
	 $password = $_POST['code'];

	 echo $name;
	 echo $password;
	 
	 $query = 'INSERT INTO public.user(user_name, password) VALUES(:name, :password)';
	 
	 echo $query;
	 
      $preparedStatement = $db->prepare($query);
		echo "prepared";
	  $preparedStatement->execute(array('user_name' => $name, 'password' => $password));
	   echo "inserted";
	   //$preparedStatement->execute();
		
	//echo "<h1>Account created Successfully</h1><a href='rrlogin.php'>Back to Login</a>";
 ?>
 </body>
 </html>