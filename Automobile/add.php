<?php 
require_once "pdo.php";
session_start();

if (! isset($_SESSION['email']) ) {
	die('ACCESS DENIED');
}


if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

if (isset($_POST['add'])) {
	unset($_SESSION['make']);
	unset($_SESSION['model']);
	unset($_SESSION['year']);
	unset($_SESSION['mileage']);

	if (strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1 || strlen($_POST['year']) < 1 || strlen($_POST['mileage']) < 1) {
		$_SESSION['failure']  = "All fields are required";
		header('Location: add.php');
		return;
	}
	elseif (! is_numeric($_POST['year']) || (! is_numeric($_POST['mileage']))) {
		$_SESSION['failure'] = "Mileage and year must be numeric";
		header('Location: add.php');
		return;
	}
	else {

		$make = htmlentities($_POST['make']);
		$model = htmlentities($_POST['model']);
		$year = htmlentities($_POST['year']);
		$mileage = htmlentities($_POST['mileage']);

		$_SESSION['make'] = $make;
		$_SESSION['model'] = $model;
		$_SESSION['year'] = $year;
		$_SESSION['mileage'] = $mileage;

		$stmt = $pdo->prepare('INSERT INTO autos
        (make, model, year, mileage) VALUES ( :mk, :md, :yr, :mi)');
    	$stmt->execute(array(
        ':mk' => $make,
        ':md' => $model,
        ':yr' => $year,
        ':mi' => $mileage)
    );
    	$_SESSION['green'] = "Record added.";
    	header('Location:index.php');
    	return;

	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Roger Gerber Quirino Tzep Tambriz</title>
<?php
require_once "bot.php";
?>
</head>
<body>
<div class="container">
<h1>Tracking Automobiles for <?= htmlentities($_SESSION['email']); ?></h1>

<?php
//Flash message
if (isset($_SESSION['failure']) ) {
    echo('<p style="color:red">'.htmlentities($_SESSION['failure'])."</p>\n");
    unset($_SESSION['failure']);
}
?>

<form method="post" action="add.php">
<p>Make:
<input type="text" name="make" size="60"/></p>
<p>Model:
<input type="text" name="model" size="60"/></p>
<p>Year:
<input type="text" name="year"/></p>
<p>Mileage:
<input type="text" name="mileage"/></p>
<input type="submit" name="add" value="Add">
<input type="submit" name="logout" value="Cancel">
</form>


</div>
</body>
</html>