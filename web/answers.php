<?php
	session_start();
	
	$_SESSION['submitted'] = False;

	if (isset($_POST['Submit'])){
		$_SESSION['submitted'] = True;
	}
?>

<html>
<head>
	<title>Answers</title>
	<link rel="stylesheet" type="text/css" href="survey.css">
	<!--<script type="text/javascript" src="week07.js"></script>-->
</head>
<body>
	<h1>Internet Usage Answers</h1>
	<h2>CS 313 Week 3 Prove Assignment</h2>
	<?php
	$often = $_POST["often"] . "\n";
	$use = $_POST["use"] . "\n";
	$device = $_POST["device"] . "\n";
	$nav = $_POST["nav"] . "\n";
	$answers = fopen("survey.txt", "a") or die ("Unable to open file!");
	
	fwrite($answers, $often);
	fwrite($answers, $use);
	fwrite($answers, $device);
	fwrite($answers, $nav);
	fclose($answers);
    ?>
<!--Separated php for easier understanding (for me)-->
<?php
	$myfile = fopen("survey.txt", "r") or die("Unable to open file!");
    	$rarely = $sometimes = $often = $allTheTime = 0;
		$socialMedia = $playingGames = $shop = $watch = $research = 0;
		$desktop = $laptop = $tablet = $phone = $console = 0;
		$tabs = $search = $links = 0;
		$count = 0;
		
	while(!feof($myfile)){
		$current = fgets($myfile);
		switch($current)
		{
			case "rarely\n":
			$rarely++;
			break;
			case "sometimes\n":
			$sometimes++;
			break;
			case "often\n":
			$often++;
			break;
			case "All The Time\n":
			$allTheTime++;
			break;
			case "Social Media\n":
			$socialMedia++;
			break;
			case "Playing Games\n":
			$playingGames++;
			break;
			case "Shop\n":
			$shop++;
			break;
			case "Watching Videos\n":
			$watch++;
			break;
			case "Research\n":
			$research++;
			break;
			case "Desktop\n":
			$desktop++;
			break;
			case "Laptop\n":
			$laptop++;
			break;
			case "Tablet\n":
			$tablet++;
			break;
			case "Phone\n":
			$phone++;
			break;
			case "Game Console\n":
			$console++;
			break;
			case "tabs\n":
			$tabs++;
			break;
			case "search\n":
			$search++;
			break;
			case "links\n":
			$links++;
			break;
			default:
			break;
		}
		
	}
    fclose($myfile);
	
	echo "<div class='question'><p>How often do you use the internet?</p><div class='answers'><ul><li>Rarely:   " . $rarely
	     . "</li><li>Sometimes:   " . $sometimes . "</li><li>Often:   " . $often
		 . "</li><li> All The Time:   ". $allTheTime . "</li></ul></div></div>";
	
	echo "<div class='question'><p>What do you do most online?</p><div class='answers'><ul><li>Use Social Media:   " . $socialMedia
	     . "</li><li>Play Video Games:   " . $playingGames . "</li><li>Shop:   " . $shop
		 . "</li><li>Watch Videos:   ". $watch . "</li><li>Research: " . $research . "</li></ul></div></div>";
	
	echo "<div class='question'><p>What device are you usually online with?</p><div class='answers'><ul><li>Desktop:   " . $desktop
	     . "</li><li>Laptop:   " . $laptop . "%</li><li>Tablet:   " . $tablet
		 . "</li><li> Smart Phone:   ". $phone . "</li><li>Video Game Console: " . $console . "</li></ul></div></div>";

	echo "<div class='question'><p>How do you usually navigate a web-page?</p><div class='answers'><ul><li>Tabs On the top:   " . $tabs . "</li><li>Search Bar: " . $search
		 . "</li><li>Links in the page:   ". $links . "</li></ul></div></div>";	 
	?>
</body>
</html>
  