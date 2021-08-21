<?php 
	$guess = '';
	$message = false;
	if (isset($_POST['guess'])) {

		$guess = $_POST['guess'] + 0;
		if ($guess == 42) {
			$message = "Great Job!";
		}else if ($guess < 42) {
			$message = "Too low";
		}else {
			$message = "Too high...";
		}
	}

 ?>
<html>
<head>
	<meta charset="utf-8">
	<title>Guessing game</title>
</head>
<body style="font-family: sans-serif;">
	<p>Guessing game...</p>
	<p>
		<?php 
		if ($message !== false) {
			echo ("<p>$message</p>");
		}
		 ?>
     <form method="POST">
 	<p><label for="guess">Input Guess</label>
 		<input type="text" name="guess" id="guess" size="40" 
         <?php echo 'value="'.htmlentities($guess) .'"' ;
         ?>
         /></p>
 	<input type="submit"/>
 </form>
 </body>
</html>