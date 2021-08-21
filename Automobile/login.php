<?php // Do not put any HTML above this line
require_once "pdo.php";
session_start();

if ( isset($_POST['cancel'] ) ) {
    // Redirect the browser to game.php
    header("Location: index.php");
    return;
}


//$failure = false;  // If we have no POST data
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  // Pw is php123

// Check to see if we have some POST data, if we do process it
if ( isset($_POST['email']) && isset($_POST['pass']) ) {
    unset($_SESSION['email']);
    $umsi = htmlentities($_POST['email']); 
    $pass = htmlentities($_POST['pass']);
    $_SESSION['email'] = $umsi;
    if ( strlen($umsi) < 1 || strlen($pass) < 1 ) {
        $_SESSION['error'] = "User name and password are required";
        header('Location: login.php');
        return;
    } 

    elseif ( strpos($umsi,'@') ) {
      //(preg_match("/@/", $who))

      $check = hash('md5', $salt.$pass);
      if ( $check == $stored_hash ) {

        try {
          throw new Exception("Login success ".$umsi);
        }
        catch (Exception $ex) {
          error_log($ex->getMessage());
        }

        $_SESSION["success"] = "Logged in.";
        
        // Redirect the browser to game.php
        header("Location: view.php");
        return;
            
      } else {

          try {
            throw new Exception("Login fail ".$umsi." $check");
          }
          catch (Exception $e) {
            error_log($e->getMessage());
          }
          
          $_SESSION["error"] = "Incorrect password.";
          header("Location: login.php");
          return;

      }
      
    }
    
    else {
        $_SESSION['error'] = "Email must have an at-sign (@)";
        header('Location: login.php');
        return;
    }    
}

// Fall through into the View
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
<h1>Please Log In</h1>
<?php
// Note triple not equals and think how badly double
// not equals would work here...
if ( isset($_SESSION["error"]) ) {
      echo('<p style="color:red">'.htmlentities($_SESSION["error"])."</p>\n");
      unset($_SESSION["error"]);
}
?>
<form method="POST">
<label for="nam">Email</label>
<input type="text" name="email" id="nam" ><br/>
<label for="id_1723">Password</label>
<input type="pass" name="pass" id="id_1723"><br/>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>
For a password hint, view source and find a password hint
in the HTML comments.
<!-- Disregard this hint. Hint: The password is the four character sound a cat
makes (all lower case) followed by 123. -->
</p>
</div>
</body>