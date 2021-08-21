<?php
    session_start();
    if( isset($_POST['guess'])){
        $guess = $_POST['guess'] + 0;
        $_SESSION['guess'] = $guess;
        if ($guess == 42) {
            $_SESSION['message'] = "Great Job";
        }else if ($guess <42) {
            $_SESSION['message'] = "Too Low";
        }else{
            $_SESSION['message'] = "Too high...";
        }
        header("Location: guess2.php");
        return;
    }
?>
<html>
<head>
	<meta charset="utf-8">
	<title>A Guessing game</title>
</head>
<body style="font-family: sans-serif;">
    <?php
    $guess = isset($_SESSION['guess']) ? $_SESSION['guess'] : '';
    $message = isset($_SESSION['message']) ? $_SESSION['message'] : false;
    ?>
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