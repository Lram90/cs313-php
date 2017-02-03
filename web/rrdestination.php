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
<input type="text" onchange="display()" />

 <?php 
	function display(){
        $db = pg_connect('host=ec2-54-243-38-139.compute-1.amazonaws.com dbname=d89833096k0ivr user=uhieutjjtvpbri
		password=53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56');

        $query = "SELECT * FROM Scriptures"; 

        $result = pg_query($query); 
        if (!$result) { 
            echo "Problem with query " . $query . "<br/>"; 
            echo pg_last_error(); 
            exit(); 
        } 

        while($myrow = pg_fetch_assoc($result)) { 
            printf ("<strong>%s %s: %s - </strong> \"%s\" <br>",htmlspecialchars($myrow['book']), htmlspecialchars($myrow['chapter']), htmlspecialchars($myrow['verse']), htmlspecialchars($myrow['content']));
        }
	}		
        ?> 

</body>

</html>