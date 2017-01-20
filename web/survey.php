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
	$answers = "survey.txt";
	
	fwrite($answers, $often);
	fwrite($answers, "\n");
	fwrite($answers, $use);
	fwrite($answers, "\n");
	fwrite($answers, $device);
	fwrite($answers, "\n");
	fwrite($answers, $nav);
	fwrite($answers, "\n");
    ?>

<?php
	$myfile = fopen("survey.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("survey.txt"));
    fclose($myfile);
	?>
</body>
</html>
  