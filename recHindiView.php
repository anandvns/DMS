<?php
if (!isset($_SESSION)) { session_start(); }
//include '../include/header.php';
include '../cbf_Db.php';
//$rs = mysql_query("select count(*) from cb_recpt where CB_DAK_LANG='E' order by CB_DAK_NO desc");
//include_once '../include/paging1.php';

$result = mysql_query("select * from cb_recpt where CB_DAK_LANG='H' order by CB_DAK_NO");
/*$type = array(
    'A' => "ARMY",
    'N' => "NORMAL",
    'NPS' => 'New Pension Scheme',
    'L' => 'LEAVE'
);
$month = array(
    '01' => "January",
    '02' => "February",
    '03' => "March",
    '04' => "April",
    '05' => "May",
    '06' => "June",
    '07' => "July",
    '08' => "August",
    '09' => "September",
    '10' => "October",
    '11' => "November",
    '12' => "December"
);*/
$header = "Receipt Register (HINDI) -- (डाक प्राप्ति का रजिस्टर)";
?>
<?php ob_start(); ?>

<div class="box">
  <div class="box-body">
    <table class="table table-bordered" id="mytable" style="border:2px solid black;">
            <thead class="bg-light-blue-active">
                <tr>
                    <th>DAK NO.</th>
                    <th>Nos.</th>
                    <th>DATE</th>
                    <th>TO WHOM</th>
                    <th>SUBJECT</th>
                    <th>FILE No. </th>
                    <th>Concerning Section</th>
                    <th>REMARK </th>
                    
                </tr>
            <thead>
                
            <tbody> 
                 <?php
               
                //$un = array();
                while ($row = mysql_fetch_assoc($result)) {
               
                    
                        echo "<tr>";
                    if($_SESSION['utype'] == "D" || $_SESSION['utype'] == "A") 
                          echo "<td>&nbsp;<a href='recptHindi.php?op=edit&Id=$row[CB]'>$row[CB_DAK_NO]</a></td>"; 
					      else 
                          echo "<td>&nbsp;$row[CB_DAK_NO]</td>";
                          
					echo "<td>&nbsp;$row[CB_DAK_REC_NO]</td>
					<td>&nbsp;$row[CB_DAK_DATE]</td>
                    <td>&nbsp;$row[CB_DAK_TOWHOM]</td>
					<td>&nbsp;$row[CB_DAK_SUB]</td>
					<td>&nbsp;$row[CB_DAK_FILENO]</td>";
                        echo "<td>";
                        $result1 = mysql_query("select S_NAME from section where S_ID IN (SELECT 
                            s_id FROM `dak_rece_cantt` where u_id =$row[CB])");
                            if($result1)
                            {
                            while ($b = mysql_fetch_assoc($result1)) {
                                echo $b['S_NAME'] . ',<br/>';
                            }
                            }
                            else
                                echo "";
                      
                        echo "</td>";
                        echo "
                <td>&nbsp;
                $row[CB_DAK_REMARK]</td>                        
                
                </TR>";
                    
                     
                }
                
                ?>	
        </tbody>
        </table>
           
        
 </div>  
</div>
<?php $page_content = ob_get_clean(); ?>        

<?php include('testmaster.php'); ?>


