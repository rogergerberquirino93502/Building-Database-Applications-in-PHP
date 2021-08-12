<?php
    require_once "../PHPDatabaseLibraries/pdo.php";
    

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try{
    $stmt = $pdo->prepare("SELECT * FROM users where user_id = :xyz");
    $stmt->execute(array(":pizza" => $_GET['user_id']));
}
catch(Exception $ex){
    echo("Exception message: ".$ex->getMessage());
    return;
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>