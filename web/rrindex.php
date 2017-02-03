<?php
	session_start();
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
		<li><a class="tablink" href="rrnexthours.php">Next Few Hours</a>
		<li><a class="tablink" href="rrcustomer.php">Rides by Customer</a>
	</ul>	
</div><!--implement navagation tabs directly under the header here,
high width, low height-->

</div><!--links on the side, float left, high height, low width-->

<div class="main"><!--ride order form, description, to driver link.-->

<h2>Ride Order Form</h2>

<form id="ride">
<?php
	
	echo "<p>User Name:</p><input type='text' id='user' name='user' readonly />";
	$user = $_SESSION['user'];
?>

<p>Pick-up location:</p>
<input type="text" id="origin" onchange="update()"/>

<p>Date and Time of Departure:</p>
<input type="datetime-local" name="date" id="date" onchange="update()" />

<p>Special Instructions (ie apartment number, ring doorbell...):</p>
<input type="text" id="extra" />

<p>Destination Location:</p>
<input type="text" id="destination" onchange="initMap()" />


<p>Distance:</p>
<input type="text" id="distance" readonly />

<p>Trip Time:</p>
<input type="text" id="duration" readonly />

<!-- <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7ZXhSJiWSb46IF5UfcIi6UQik29F78To&callback=initMap">
</script>
<script>
function initMap() {
  
  
  var origin = document.getElementById('origin').value;
  var destination = document.getElementById('destination').value;
  var distance = document.getElementById('distance');
  var duration = document.getElementById('duration');

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
        }
      }
    }
  });
}
</script> -->

</form>

<h3>Are you a driver? Try These Links: </h3>
<!--<a href="rrdriver.php">Drivers' Page</a> Direct links?-->
<a class="bodylink" href="rrday.php">Daily Schedule</a><br>
<a class="bodylink" href="rrnexthours.php">Next Few Hours</a><br>
<a class="bodylink" href="rrcustomer.php">Schedule by Customer</a><br>
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