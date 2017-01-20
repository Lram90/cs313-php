<html>
<head>
	<title>Answers</title>
	<!--<link rel="stylesheet" type="text/css" href="survey.css">-->
	<!--<script type="text/javascript" src="week07.js"></script>-->
</head>
<body>
	<h1>Internet Usage Answers</h1>
	<h2>CS 313 Week 3 Prove Assignment</h2>
	<?php
	$often = $_POST["often"];
	$use = $_POST["use"];
	$device = $_POST["device"];
	$nav = $_POST["nav"];
	$answers = fopen("survey.txt", "a") or die ("Unable to open file!");
	
	fwrite($answers, $often);
	//fwrite($answers, "\n");
	fwrite($answers, $use);
	//fwrite($answers, "\n");
	fwrite($answers, $device);
	//fwrite($answers, "\n");
	fwrite($answers, $nav);
	//fwrite($answers, "\n");
	fclose($answers);
    ?>
<!--Separated php for easier understanding (for me)-->
<?php
	$myfile = fopen("survey.txt", "r") or die("Unable to open file!");
    	$rarely = $sometimes = $often = $allTheTime = 0;
		$socialMedia = $playingGames = $shop = $watch = $research = 0;
		$desktop = $laptop = $tablet = $phone = $console = 0;
		$tabs = $search = $links = 0;
		
	while(!feof($myfile)){
		$current = fgets($myfile);
		echo $current . "<br>"; 
		switch($current)
		{
			case "rarely":
			$rarely++;
			break;
			case "sometimes":
			$sometimes++;
			break;
			case "often":
			$often++;
			break;
			case "All The Time":
			$allTheTime++;
			break;
			case "Social Media":
			$socialMedia++;
			break;
			case "Playing Games":
			$playingGames++;
			break;
			case "Shop":
			$shop++;
			break;
			case "Waatching Videos":
			$watch++;
			break;
			case "Research":
			$research++;
			break;
			case "Desktop":
			$desktop++;
			break;
			case "Laptop":
			$laptop++;
			break;
			case "Tablet":
			$tablet++;
			break;
			case "Phone":
			$phone++;
			break;
			case "Game Console":
			$console++;
			break;
			case "tabs":
			$tabs++;
			break;
			case "search":
			$search++;
			break;
			case "links":
			$links++;
			break;
			default:
			break;
		}
	}
    fclose($myfile);
	
	echo "<p>How often do you use the internet?</p><ul><li>Rarely:   " . $rarely
	     . "</li><li>Sometimes:   " . $sometimes . "</li><li>Often:   " . $often
		 . "</li><li> All The Time:   ". $allTheTime;
	?>
	
</body>
</html>
  