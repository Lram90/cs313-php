<?php 
         $db = pg_connect('host=ec2-54-243-38-139.compute-1.amazonaws.com dbname=d89833096k0ivr user=uhieutjjtvpbri password=53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56');

        $query = "SELECT * FROM public.user u, public.pickup p, public.destination d, public.cost c WHERE u.user_id = p.user_id AND u.user_id = d.user_id AND u.user_id = c.user_id AND d.destination_location =\"" . $_POST['location'] . "\"";

        $result = pg_query($query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 
		
		echo "<table><tr><th>User Name</th><th>Pickup Location</th><th>Pickup Time</th><th>Destination Location</th><th>Estimated Arrival Time</th><th>distance</th><th>Total</th></tr>";
		
		//user_name pickup_location pickup_time destination_location estimated_arrival distance total 
		
        while($myrow = pg_fetch_assoc($result)) { 
          echo "<tr><td>" . $myrow['user_name'] . '</td><td>' . $myrow['pickup_location'] . '</td><td>' . $myrow['pickup_time'] . '</td><td>' . $myrow['destination_location'] . '</td><td>' . $myrow['estimated_arrival'] . '</td><td>' . $myrow['distance'] . '</td><td>' . $myrow['total'] . '</td></tr>';
        }	

			echo "</table>";
        ?> 