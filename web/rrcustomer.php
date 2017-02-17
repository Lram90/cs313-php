<!doctype html>
<html>

<head>
<title>Rides to Customer</title>
<link rel="stylesheet" type="text/css" href="rrstyle.css">
</head>

<body>
<div class="head"><!--easier to format layout-->
<img src="rrlogo.png"></img><!--get a logo figured out for here-->
<h1>Rexburg Rides</h1>
</div>

<h1>Rides by Customer</h1>

<h3>Enter User Name:</h3>
<form id="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" />
<input type="text" name="customer" required='required' />
<input type="submit" name="submit" value="Search" />
</form>

<h2>Results</h2>
<?php 

	if ($_SERVER["REQUEST_METHOD"] === "POST") { 
         $db = pg_connect('host=ec2-54-243-38-139.compute-1.amazonaws.com dbname=d89833096k0ivr user=uhieutjjtvpbri password=53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56');

        $query = "SELECT * FROM public.user u, public.pickup p, public.destination d, public.cost c WHERE u.user_id = p.user_id AND u.user_id = d.user_id AND u.user_id = c.user_id";

        $result = pg_query($query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 
		
		echo "<table><tr><th>User Name</th><th>Pickup Location</th><th>Pickup Time</th><th>Destination Location</th><th>Estimated Arrival Time</th><th>Distance</th><th>Total</th></tr>";
		
		//user_name pickup_location pickup_time destination_location estimated_arrival distance total 
		
        while($myrow = pg_fetch_assoc($result)) { 
          echo "<tr><td>" . $myrow['user_name'] . '</td><td>' . $myrow['pickup_location'] . '</td><td>' . $myrow['pickup_time'] . '</td><td>' . $myrow['destination_location'] . '</td><td>' . $myrow['estimated_arrival'] . '</td><td>' . $myrow['distance'] . '</td><td>' . $myrow['total'] . '</td></tr>';
        }	

			echo "</table>";
	}
        ?> 
</body>

</html>