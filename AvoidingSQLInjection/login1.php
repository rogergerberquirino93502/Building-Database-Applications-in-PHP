<?php
    require_once "../PHPDatabaseLibraries/pdo.php";
    if (isset($_POST['email']) && isset($_POST['password'])) {
        echo("<p>Hanling POST data...</p>\n");
        $e = $_POST['email'];
        $p = $_POST['password'];
        $sql = "SELECT name FROM users WHERE email = '$e'
        AND password= '$p'";

        echo("<p>$sql</p>\n");

        $stmt = $pdo->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        var_dump($row);
        echo "-->\n";
        if($row === FALSE){
            echo "<h1>Login incorrect.<h1/>\n";
        }else{
            echo "<p>Login Succes.</p>";
        }
    }
// p' OR '1' = '1
?>
<p>Please Login</p>
<form method="POST">
    <p>Email:
        <input type="text" size="40" name="email"></p>
    <p>Password:
        <input type="text" size="40" name="password">
    </p>
    <p><input type="submit" value="Login/">
    <a href="<?php echo($_SERVER['PHP_SELF']);?>">Refresh</a>
    </p>
</form>
<p>
    Check out his
</p>
<a href="#" target="_blank">XKCD comit that</a>
<!-- 'p' OR '1'='1'