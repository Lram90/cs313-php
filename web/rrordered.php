<?php
 session_start();
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
	$id = $_SESSION['id'];
	
	
	$destination = $_POST['destination'];
	$duration = $_POST['duration'];
	
	
	$distance = $_POST['distance'];
	$total = $_POST['total'];
	
	
	
	$pStmt = $dbh->prepare('INSERT INTO public.pickup(pickup_location, pickup_time, extra_considerations, user_id, pickup_date) VALUES(:origin, :time, :extra, :id, :date)');
	$pStmt->execute( array('origin' => $origin, 'time' => $time, 'extra' => $extra, 'id' => $id, 'date' => $date) );
	
	
	$dStmt = $dbh->prepare('INSERT INTO public.destination(destination_location, estimated_arrival, user_id) VALUES(:destination, :duration, :id)');
	$dStmt->execute( array('desination' => $destination, 'duration' => $duration, 'id' => $id) );

	
	$cStmt = $dbh->prepare('INSERT INTO public.cost(distance, total, user_id) VALUES(:distance, :total, :id)');
	$cStmt->execute( array('distance' => $distance, 'duration' => $duration, ':id' => $id) );
	
	echo "<h1>Order Successful!</h1><a href='rrlogin.php'>Back to Login</a><br /> <br /> <h2>YOUR RIDES</h2>";
	
	$rStmt = $dbh->prepare ('SELECT * FROM public.user u, public.pickup p, public.destination d, public.cost c WHERE u.user_id = p.user_id AND u.user_id = d.user_id AND u.user_id = c.user_id AND u.user_id = :id');
	$review = $rStmt->execute ( array ( 'id' => $id));
	
	while($myrow = pg_fetch_assoc($review)){
	echo "<ul><li>" . $myrow['date'] . "</li><li>" . $myrow['pickup_location'] . '</li><li>' . $myrow['pickup_time'] . '</li><li>' . $myrow['destination_location'] . '</li><li>' . $myrow['estimated_arrival'] . '</li><li>' . $myrow['distance'] . '</li><li>' . $myrow['total'] . '</li></ul>';
	}
 ?>
 </body>
 </html>