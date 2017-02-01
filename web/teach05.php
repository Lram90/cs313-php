<!doctype html>
<html> 
    <body> 
        <table border="0" cellspacing="0" cellpadding="0"> 
            <tr> 
                <th> 
                    Scripture ID 
                </th> 
                <th> 
                    Book 
                </th> 
                <th> 
                    Chapter 
                </th> 
                <th> 
                    Verse 
                </th> 
				<th> 
                    Content 
                </th> 
            </tr> 
        <?php 
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
            printf ("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $myrow['id'], htmlspecialchars($myrow['book']), htmlspecialchars($myrow['chapter']), htmlspecialchars($myrow['verse']), htmlspecialchars($myrow['content']));
        } 
        ?> 
        </table> 
    </body> 
</html> 