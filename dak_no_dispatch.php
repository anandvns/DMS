<?php

include_once '../cbf_Db.php';
include_once 'check.php';

$result = mysql_query("select dak_no from dak_no where id='2'");
while ($a = mysql_fetch_assoc($result)) {
    $dakno = $a['dak_no'];
}
?>
