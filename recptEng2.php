<?php

session_start();
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");

include '../cbf_Db.php';


    $RNO = $_POST['rno'];
    $NO = $_POST['no'];
    $DATE = $_POST['dd'];
    //$DATE = $DATE . "-";
    //$DATE.=$_POST['mm'];
    //$DATE = $DATE . "-";
    //$DATE.=$_POST['yy'];
    $TOWHOM = $_POST['towhom'];
    $SUB = $_POST['sub'];
    $FNO = $_POST['fno'];
    //$DEPT = $_POST['dept'];
    $REMARK = $_POST['remark'];
    $TYPE = $_POST['type'];
    $r_no = $_POST['random'];
    $dt = date("d-m-Y");
    
    $rtype = $_POST['rtype'];
    $RDATE = $_POST['rdd'];
    //$RDATE = $RDATE . "-";
   // $RDATE.=$_POST['rmm'];
    //$RDATE = $RDATE . "-";
    //$RDATE.=$_POST['ryy'];
    $rthrough = $_POST['rthrough'];
    $action = $_POST['action'];


    //echo $RNO.$NO.$TOWHOM.$SUB.$FNO.$REMARK.$TYPE.$r_no.$dt.$DATE;
try
{   
    if($action == "insert") 
    {
     $result = mysql_query("INSERT INTO cb_recpt(CB_DAK_NO, CB_DAK_REC_NO, CB_DAK_DATE, CB_DAK_TOWHOM, CB_DAK_SUB, CB_DAK_FILENO, CB_DAK_REMARK, CB_DAK_TYPE, CB_DAK_N_DATE,CB_DAK_LANG,CB, CB_DAK_RTYPE,CB_DAK_RDATE, CB_DAK_RTHROUGH) VALUES ('$RNO', '$NO', '$DATE', '$TOWHOM', '$SUB', '$FNO', '$REMARK', '$TYPE', '$dt','E','$r_no','$rtype','$RDATE','$rthrough');");

     foreach ($_POST['tobox'] as $x ) 
        mysql_query("insert into dak_rece_cantt(u_id,s_id,Received) value('$r_no','$x','N');");
     if ($result) 
        mysql_query("update dak_no set dak_no=(dak_no+1) where id='1'");
     }
    else if($action == "update")
    {
      $result = mysql_query("update cb_recpt SET CB_DAK_REC_NO = '$NO', CB_DAK_DATE = '$DATE', CB_DAK_TOWHOM='$TOWHOM' ,
      CB_DAK_SUB ='$SUB', CB_DAK_FILENO = '$FNO', CB_DAK_REMARK = '$REMARK', CB_DAK_TYPE ='$TYPE' ,CB_DAK_RTYPE ='$rtype', CB_DAK_RDATE ='$RDATE', CB_DAK_RTHROUGH = '$rthrough'
      WHERE CB ='$r_no'");
    mysql_query("delete from dak_rece_cantt where u_id='$CB'");

    foreach ($_POST['tobox'] as $x ) 
        mysql_query("insert into dak_rece_cantt(u_id,s_id,Received) value('$r_no','$x','N');");
   }
    
  $url = "recEngView.php"; // targ et of the redirect
  $delay = "0"; // 50 second delays
  echo '<meta http-equiv = "refresh" content = "' . $delay . ';url = ' . $url . '">';
  exit;
}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}



?>
