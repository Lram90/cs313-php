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
	$answers = survey.txt;
	$current = "";
	
	$current .= $often;
	$current .= "\n";
	$current .= $use;
	$current .= "\n";
	$current .= $device;
	$current .= "\n";
	$current .= $nav;
	$current .= "\n";
	
	if (is_writable($answers)) {
.
    if (!$handle = fopen($answers, 'a')) {
         echo "Cannot open file ($answers)";
         exit;
    }

   
    if (fwrite($handle, $current) === FALSE) {
        echo "Cannot write $often to file ($answers)";
        exit;
    }

    echo "Success, wrote ($somecontent) to file ($filename)";

    fclose($handle);

} else {
    echo "The file $filename is not writable";
}


	$myfile = fopen("survey.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("survey.txt"));
    fclose($myfile);
	?>
</body>
</html>
  