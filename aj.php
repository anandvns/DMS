<?php
    session_start();
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$officeID = $_SESSION['OfficeID'];
$_SESSION['NSR'] = "YES";
$NSR = $_SESSION['NSR'];
include '../cbf_Db.php';

   
    $result = mysql_query("SELECT CONCAT(`CB_DAK_FILENO`,' dt: ',`CB_DAK_DATE`) As FileNo,id from cb_recpt 
            WHERE CB_DAK_FILENO LIKE '%".$_GET['query']."%' LIMIT 5");

    $data = [];

    while($row = mysql_fetch_assoc($result)){
         $data[] = $row['FileNo'].'|'.$row['id'];
    }

    echo json_encode($data);
?>

