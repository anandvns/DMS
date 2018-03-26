<?php
session_start();
error_reporting(0);


//unset($_SESSION['UserId']);
//unset($_SESSION['FName']);

//session_unset();
session_destroy();
$url  =  "index.php"; // targ et of the redirect
$delay  =  "0"; // 50 second delay	
echo '<meta http-equiv = "refresh" content = "'.$delay.';url = '.$url.'">';   
?> 