<?php 
require_once "pdo.php";
session_start();

if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

$stmt = $pdo->query("SELECT autos_id, make, model, year, mileage FROM autos ORDER BY mileage ASC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
<h2>Welcome to the Automobiles Database</h2>
<?php 

	if (! isset($_SESSION['email'])){ 
?>
	<p><a href="login.php">Please log in</a></p>
	<p>Attempt to <a href="add.php">add data</a> without logging in</p>
<?php 
	} 
	else { 

?>
<?php

if (isset($_SESSION['error']) ) {
    echo('<p style="color:red">'.htmlentities($_SESSION['error'])."</p>\n");
    unset($_SESSION['error']);
}

if ( isset($_SESSION['green']) ) {
    echo '<p style="color:green">'.$_SESSION['green']."</p>\n";
    unset($_SESSION['green']);
}
	
if ($rows == false) {
	echo "<p>No rows found</p>";
}
else {
	echo ('<table border="1">'."\n");
	echo ("<thead><tr>");
	echo ("<th>Make</th>");
	echo ("<th>Model</th>");
	echo ("<th>Year</th>");
	echo ("<th>Mileage</th>");
	echo ("<th>Action</th>");
	
	
	foreach ($rows as $row) {

			
		echo ("<tr><td>");
	    echo(htmlentities($row['make']));
	    echo("</td><td>");
	    echo(htmlentities($row['model']));
	    echo("</td><td>");
	    echo(htmlentities($row['year']));
	    echo("</td><td>");
	    echo(htmlentities($row['mileage']));
	    echo("</td><td>");
	    echo('<a href="edit.php?autos_id='.$row['autos_id'].'">Edit</a> / ');
	    echo('<a href="delete.php?autos_id='.$row['autos_id'].'">Delete</a>');
	    echo("</td></tr>\n");
	}
	
	echo ("</thead></tr>\n");
	echo('</table>'. "\n");
	echo "<br>";
}
?>
	
	<p><a href="add.php">Add New Entry</a></p>
	<p><a href="logout.php">Logout</a></p> 
<?php
	} 
?>

