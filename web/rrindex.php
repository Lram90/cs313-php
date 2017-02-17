<?php
	session_start();
	
	if($_SESSION['utype'] == 1){
		header('Location: rradmin.php' true);
	};
?>

<!doctype html>
<html>

<head>
<title>Rexburg Rides</title>
<link rel="stylesheet" type="text/css" href="rrstyle.css">
</head>

<body>
<div class="head"><!--easier to format layout-->
<img src="rrlogo.png"></img><!--get a logo figured out for here-->
<h1>Rexburg Rides</h1>
</div>

</div><!--links on the side, float left, high height, low width-->

<div class="main"><!--ride order form, description, to driver link.-->

<h2>Ride Order Form</h2>

<form id="ride" action="rrordered.php" method="post" >

<?php echo"<input id=\"id\" name=\"id\" visibility='hidden' style=\"width: 0px; height: 0px; border: 0; background-color: rgb(30, 170, 30)\" readonly value=" . $_SESSION['id'] . " />" ?>

<p>Pick-up location:</p>
<input type="text" name="origin" id="origin" onchange="initMap()"/>

<p>Date of Departure:</p>
<input type="date" name="date" id="date" required />

<p>Time of Departure:</p>
<input type="time" name="time" id="time" required />

<p>Destination Location:</p>
<input type="text" id="destination" name="destination" onchange="initMap()" required />

<p>Distance:</p>
<input type="text" id="distance" name="distance" readonly required />

<p>Trip Time:</p>
<input type="text" id="duration" name="duration" readonly required />

<p>Total:</p>
<input type="text" id="total" name="total" readonly required />
<br>

<p>Special Instructions (ie apartment number, ring doorbell...):</p>
<textarea name="extra" id="extra" rows="4" cols="50" ></textarea>
<br>

<input type="submit" value="Order" />

<script async defer
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
</script>

</form>
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