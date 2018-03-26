<?php

session_start();
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");

include '../cbf_Db.php';


    $RNO = $_POST['rno'];
    $DATE = $_POST['dd'];
   // $DATE = $DATE . "-";
   // $DATE.=$_POST['mm'];
   // $DATE = $DATE . "-";
   // $DATE.=$_POST['yy'];
    $TOWHOM = $_POST['towhom'];
    $SUB = $_POST['sub'];
    $FNO = $_POST['fno'];
    $FROM = $_POST['fromwhom'];
    $REMARK = $_POST['remark'];
    $TYPE = $_POST['type'];
    $r_no = $_POST['random'];
    $dt = date("j-n-Y");
    
    $rthrough = $_POST['rthrough'];
    $action = $_POST['action'];
try
{   
    if($action == "insert") 
    {
    $result = mysql_query("INSERT INTO cb_dispatch(CB_DAK_NO, CB_DAK_DATE, CB_DAK_TOWHOM, CB_DAK_SUB, CB_DAK_FILENO, CB_DAK_FROM, CB_DAK_REMARK, CB_DAK_TYPE, CB_DAK_N_DATE,CB_DAK_LANG,CB,CB_DAK_RTHROUGH) VALUES ('$RNO', '$DATE', '$TOWHOM', '$SUB', '$FNO', '$FROM', '$REMARK', '$TYPE', '$dt','H','$r_no','$rthrough');");
   
    if ($result) {
        mysql_query("update dak_no set dak_no=(dak_no+1) where id='2'");
        
    }
    }
    else if($action == "update")
    {
        $result = mysql_query("UPDATE cb_dispatch SET CB_DAK_DATE = '$DATE', CB_DAK_TOWHOM='$TOWHOM' ,
        CB_DAK_SUB ='$SUB', CB_DAK_FILENO = '$FNO', CB_DAK_FROM='$FROM', CB_DAK_REMARK = '$REMARK',
        CB_DAK_TYPE ='$TYPE',CB_DAK_RTHROUGH='$rthrough' WHERE CB ='$r_no'");
    }
    
$url = "disHindiView.php"; // targ et of the redirect
$delay = "0"; // 50 second delay
echo '<meta http-equiv = "refresh" content = "' . $delay . ';url = ' . $url . '">';
exit;
}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

?>
