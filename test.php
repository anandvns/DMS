<?php
session_start();

$action  = $_POST['action'];
echo $action;

if($action == "insert")
    echo "insert";
else if($action == "update")
    echo "sasasa";
       
        
    

?>
