


<?php
		$db = pg_connect('host=ec2-54-243-38-139.compute-1.amazonaws.com dbname=d89833096k0ivr user=uhieutjjtvpbri
 password=53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56');
 
			if(isset($_POST["submit"])){
				
				$book = $_POST["book_search"];
				
				$search_query = "SELECT * FROM Scriptures WHERE book= '".$book."'"; 
				$search_result = pg_query($search_query); 
				if (!$search_result) { 
					echo "Problem with query " . $search_query . "<br/>"; 
					echo pg_last_error(); 
					exit(); 
				} 
				while($row = pg_fetch_assoc($search_result)) {
				printf ("<strong><a href='details.php?id=".$row["id"]."'>%s %s: %s </a></strong><br>",htmlspecialchars($row['book']), htmlspecialchars($row['chapter']), htmlspecialchars($row['verse']));
				}
				
			}
		
?>