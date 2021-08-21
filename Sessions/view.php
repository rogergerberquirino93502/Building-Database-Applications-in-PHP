<?php
session_start();
require_once "pdo.php";

// Check if we are logged in!
if (! isset($_SESSION['email']) ) {
	die('Not logged in');
}

// If the user requested logout go back to index.php
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}

$stmt = $pdo->query("SELECT make, year, mileage FROM autos ORDER BY make");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
<title>15991eef</title>
<?php
require_once "bot.php";
?>
</head>
<body>
<div class="container">
<h1>Tracking Autos for <?= htmlentities($_SESSION['email']); ?></h1>
<?php 
if ( isset($_SESSION["success"]) ) {
        echo('<p style="color:green">'.htmlentities($_SESSION["success"])."</p>\n");
        unset($_SESSION["success"]);

    }

?>

<h2>Automobiles</h2>
<p>
<?php
foreach ($rows as $row) {
	echo "<ul><li>";
	echo ($row['year']);
	echo " ";
	echo ($row['make']);
	echo " ";
	echo "/";
	echo " ";
	echo ($row['mileage']);
	echo "</li></ul>\n";
}

?>
<p>
<a href="add.php">Add New</a> |
<a href="logout.php">Logout</a>
</p>
</div>
</body>
</html>