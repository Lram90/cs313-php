<?php
	session_start();
?>
<!doctype html>
<html>

<head>
<title>Rides to Destination</title>
<link rel="stylesheet" type="text/css" href="rrstyle.css">
</head>

<body>
<div class="head"><!--easier to format layout-->
<img></img><!--get a logo figured out for here-->
<h1>Daily Schedule</h1>

<h3>Enter Destination Address:</h3>
<form id="myForm" method="get" />
<input type="text" name="location" />
<input type="submit" name="submit" value="Search" />
</form>

<?php 
         $db = pg_connect('host=ec2-54-243-38-139.compute-1.amazonaws.com dbname=d89833096k0ivr user=uhieutjjtvpbri password=53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56');

        $query = 'SELECT * FROM public.user u, public.pickup p, public.destination d, public.cost c WHERE u.user_id = p.user_id AND u.user_id = d.user_id AND u.user_id = c.user_id;'; 

        /*$result = pg_query($query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 
		
		
        //while($myrow = pg_fetch_assoc($result)) { 
          //echo $myrow['user_name'];
        //}
	}		
        */?> 
</body>

</html>