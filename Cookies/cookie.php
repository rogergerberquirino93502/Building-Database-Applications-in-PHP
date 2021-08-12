<?php 
    if (! isset($_COOKIE['zap'])) {
        setcookie('zap', '42', time()+3600);
    }
?>
<pre>
    <?php print_r($_COOKIE); ?>
</pre>
<p><a href="cookie.php"> Click me!</a> or press Refresh</p>