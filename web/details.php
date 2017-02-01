<?php
	$db = pg_connect('host=ec2-54-243-38-139.compute-1.amazonaws.com dbname=d89833096k0ivr user=uhieutjjtvpbri
 password=53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56');
 
 $id = $_GET['id'];

	echo $id;
 $final_query = "SELECT * FROM Scriptures WHERE id= ".$id;
 echo $final_query;
 $final_results = pg_query($final_query);
 echo final_results;
 $d_row = pg_fetch_assoc($search_result);
 
 printf ("<strong>%s %s: %s - </strong> \"%s\" <br>",htmlspecialchars($d_row['book']), htmlspecialchars($d_row['chapter']), htmlspecialchars($d_row['verse']), htmlspecialchars($d_row['content']));
 
?>