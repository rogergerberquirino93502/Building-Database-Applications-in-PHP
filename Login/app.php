<?php
    session_start();
?>
<html>
    <head></head>
        <body style="font-family: sans-serif;">
            <h1>Cool Application</h1>
            <?php
            if (isset($_SESSION["success"])) {
                echo('<p style="color:green">'.$_SESSION["success"]."</p>\n");
                unset($_SESSION["success"]);
            }

            if (! isset($_SESSION["account"])) {?>
            <p>Please <a href="login.php">Log In </a> to start.</p>
            <?php } else { ?>
                <p>This is where a cool application would be.</p>
                <p>Please <a href="logout.php">Log Out </a> When you are done.</p>
            <?php } ?>
        </body>
</html>