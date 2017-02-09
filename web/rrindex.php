<?php
	session_start();
	$_SESSION['user'] = $_POST['uname'];
	$_SESSION['pass'] = $_POST['psw'];
	
	echo $_SESSION['user']; 
	echo $_SESSION['pass'];
	
	$dbh = new PDO("pgsql:host=ec2-54-243-38-139.compute-1.amazonaws.com;port=5432;dbname=d89833096k0ivr", "uhieutjjtvpbri", "53f15317bc3fba7ca9c92f06895fa510ae3cefe2d63972966a0c2140559b6b56");
 
	$name = $_SESSION['user'];
	$code = $_SESSION['pass'];
	
	echo "<br>" . $name . $code;
	
	//$valid_user = FALSE;
	//echo "<br>" $valid_user;
 
	//$testQuery = $dbh->prepare('SELECT user_id FROM public.user WHERE user_name = :name');
	//echo "<br>" . $testQuery;
	//$tesResult = $testQuery->execute( array('name' => $name) );
	
	//while ($row = pg_fetch_assoc($testResult)){
		//	$_SESSION['id'] = $row['user_id'];
			//echo "<br>" . $_SESSION['id'];
	//}
 
	//echo "<br>" . $testResult;
 
	//if ($testResult) { 
		//$valid_user = TRUE;
		
		//}
	//}
 
	//if (!$valid_user){
		//$message = "Your User Name or Password do not match";
		//echo "<script type='text/javascript'>alert('$message');</script>";
		//header('Location: https://stormy-spire-65023.herokuapp.com/rrlogin.php', true);
	//}
?>

<!doctype html>
<html>

<head>
<title>Rexburg Rides</title>
<link rel="stylesheet" type="text/css" href="rrstyle.css">
</head>

<body>
<div class="head"><!--easier to format layout-->
<img></img><!--get a logo figured out for here-->
<h1>Rexburg Rides</h1>
</div>
<div class="tab">
	<ul class="tabs">
		<li><a class="tablink" href="rrdestination.php">Rides by Destination</a>
		<li><a class="tablink" href="rrorigin.php">Rides by Origin</a>
		<li><a class="tablink" href="rrcustomer.php">Rides by Customer</a>
	</ul>	
</div><!--implement navagation tabs directly under the header here,
high width, low height-->

</div><!--links on the side, float left, high height, low width-->

<div class="main"><!--ride order form, description, to driver link.-->

<h2>Ride Order Form</h2>

<form id="ride" action="rrordered.php" method="post" >

<p>Pick-up location:</p>
<input type="text" name="origin" id="origin" onchange="initMap()"/>

<p>Date of Departure:</p>
<input type="date" name="date" id="date" required />

<p>Time of Departure:</p>
<input type="time" name="time" id="time" required />

<p>Special Instructions (ie apartment number, ring doorbell...):</p>
<input type="text" name="extra" id="extra" />

<p>Destination Location:</p>
<input type="text" id="destination" name="destination" onchange="initMap()" required />

<p>Distance:</p>
<input type="text" id="distance" name="distance" readonly required />

<p>Trip Time:</p>
<input type="text" id="duration" name="duration" readonly required />

<p>Total:</p>
<input type="text" id="total" name="total" readonly required />

<input type="submit" value="Order" />

<!--<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7ZXhSJiWSb46IF5UfcIi6UQik29F78To&callback=initMap">
</script>
<script>
function initMap() {
  
  
  var origin = document.getElementById('origin').value;
  var destination = document.getElementById('destination').value;
  var distance = document.getElementById('distance');
  var duration = document.getElementById('duration');
  var total = document.getElementById('total');

  if(origin != "" && destination!= ""){
	  origin = origin + "+Rexburg+ID";
	  destination = destination + "+Rexburg+ID";
  }
  else{
	  origin = "Rexburg";
	  destination = "Rexburg";
  }
  
  var service = new google.maps.DistanceMatrixService;
  service.getDistanceMatrix({
    origins: [origin],
    destinations: [destination],
    travelMode: 'DRIVING',
	unitSystem: google.maps.UnitSystem.IMPERIAL
  }, function(response, status) {
    if (status !== 'OK') {
      alert('Error was: ' + status);
    } else {
      var originList = response.originAddresses;
      var destinationList = response.destinationAddresses;

      for (var i = 0; i < originList.length; i++) {
        var results = response.rows[i].elements;
        for (var j = 0; j < results.length; j++) {
          distance.value = results[j].distance.text;
		  duration.value = results[j].duration.text;
		  total.value = 2.00 * (parseFloat(distance.value));
        }
      }
    }
  });
}
</script>-->

</form>

<h3>Are you a driver? Try These Links: </h3>
<!--<a href="rrdriver.php">Drivers' Page</a> Direct links?-->
<a class="bodylink" href="rrdestination.php">Rides by Destination</a><br>
<a class="bodylink" href="rrorigin.php">Rides by Origin</a><br>
<a class="bodylink" href="rrcustomer.php">Rides by Customer</a>
</div>



<!--<div id="footer"></div> uncomment for footer section if needed-->
</body>

</html>



<!--<br>
<br>
<br>-->


<!--Links to several pages, 3 or so, that sort data based on user and date-->
<!--focus on database not on actual site, as in who cares if the site would actually
work right now for ordering rides, we are concered with making the html nad php interact 
with the SQL-->