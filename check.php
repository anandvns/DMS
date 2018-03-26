<?php

date_default_timezone_set("Asia/Calcutta");
include_once '../cbf_Db.php';

$date = date("d-m-Y");

$d = date("d");
$m = date("m");
$y = date("Y");
if ($m == "04") {
    if ($d == "01" || $m == "04") {
        $result = mysql_query("select u_date from dak_no");
        while ($a = mysql_fetch_assoc($result)) {
            $d_date = $a['u_date'];
        }
        $l_date = explode("-", $d_date);
        $l_date = $l_date[2];

        if ($l_date < $y) {
            mysql_query("update dak_no set dak_no='1',u_date='$date' where id='1'");
            mysql_query("update dak_no set dak_no='1',u_date='$date' where id='2'");
            mysql_query("update dak_no set dak_no='1',u_date='$date' where id='3'");
        } else {
            return TRUE;
        }
    }
} else {
    return TRUE;
}

//mysql_query("update dak_no set u_date='$date'" );
?>