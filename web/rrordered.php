<?php
 session_start();
 echo $_SESSION["id"];
 ?>
 
 <!doctype html>
 <head>
 </head>
 <body>
 <?php
	
	$dbh = new PDO("pgsql:host=ec2-54-243-38-139.compute-1.amazonaws.com;port=5432;dbname=d89833096k0ivr", "uhieutjjtvpbri", "53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56");

	
	$name = $_SESSION['user'];
	$origin = $_POST['origin'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$extra = $_POST['extra'];
	$id = $_POST['id'];
	
	
	$destination = $_POST['destination'];
	$duration = $_POST['duration'];
	
	
	$distance = $_POST['distance'];
	$total = $_POST['total'];
	
	
	echo $name . "<br>" . $origin . "<br>" . $date . "<br>" . $time . "<br>" . $extra . "<br>" . $id . "<br>" . $destination . "<br>" . $duration . "<br>" . $distance . "<br>" . $total . "<br>";
	
	
	$pStmt = $dbh->prepare('INSERT INTO public.pickup(pickup_location, pickup_time, extra_considerations, user_id, pickup_date) VALUES(:origin, :time, :extra, :id, :date)');
	$pStmt->execute( array('origin' => $origin, 'time' => $time, 'extra' => $extra, 'id' => $id, 'date' => $date) );
	
	$dbhd = new PDO("pgsql:host=ec2-54-243-38-139.compute-1.amazonaws.com;port=5432;dbname=d89833096k0ivr", "uhieutjjtvpbri", "53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56");
	
	$dStmt = $dbhd->prepare('INSERT INTO public.destination(destination_location, estimated_arrival, user_id) VALUES(:destination, :duration, :id)');
	$dStmt->execute( array('destination' => $destination, 'duration' => $duration, 'id' => $id) );

	$dbhc = new PDO("pgsql:host=ec2-54-243-38-139.compute-1.amazonaws.com;port=5432;dbname=d89833096k0ivr", "uhieutjjtvpbri", "53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56");
	
	$cStmt = $dbhd->prepare('INSERT INTO public.cost(distance, total, user_id) VALUES(:distance, :total, :id)');
	$cStmt->execute( array('distance' => $distance, 'total' => $total, ':id' => $id) );
	
	echo "<h1>Order Successful!</h1><a href='rrlogin.php'>Back to Login</a><br /> <br /> <h2>YOUR RIDES</h2>";
 ?>
 </body>
 </html>