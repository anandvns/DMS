<?php

//include '../include/header.php';
include '../cbf_Db.php';
if(isset($_GET['uid']))
{
$UserId = $_GET['uid'];
$result = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND IsReplySent is NULL AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section  JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id  where section.user_id='$UserId')");
}
$header = "List of Pending Daks";
?>
<?php ob_start(); ?>

<div class="box">
  <div class="box-body">
    <table class="table table-bordered" id="mytable" style="border:2px solid black;">
            <thead class="bg-light-blue-active">
                <tr>
                    <th>DAK NO.</th>
                    
                    <th>DATE</th>
                    <th>From Whom</th>
                    <th>Subject</th>
                    <th>File No. </th>
                    <th>Concerning Section</th>
                  
                    
                </tr>
            <thead>
                
            <tbody> 
                <?php
               
                //$un = array();
                while ($row = mysql_fetch_assoc($result)) {

                   // $r = mysql_query("select GROUP_CONCAT(s_id) as s_id from dak_rece_cantt where u_id='$row[CB]'");
                   /* unset($un);
                    while ($a = mysql_fetch_assoc($r)) {
                        $un[] = $a;
                    }*/


                   
                    

                        echo " 
    			<tr>
					<td>&nbsp;$row[CB_DAK_NO]</td>
					
					<td>&nbsp;$row[CB_DAK_DATE]</td>
                    <td>&nbsp;$row[CB_DAK_TOWHOM]</td>
					<td>&nbsp;$row[CB_DAK_SUB]</td>
					<td>&nbsp;$row[CB_DAK_FILENO]</td>";
                        echo "<td>";
                        /* ================================================= */
                       // foreach ($un as $dis) {
                           // $u_id = $dis[s_id];
                            $result1 = mysql_query("select P_NAME from section where S_ID IN (SELECT 
                            s_id FROM `dak_rece_cantt` where u_id =$row[CB])");
                            if($result1)
                            {
                            while ($b = mysql_fetch_assoc($result1)) {
                                echo $b['P_NAME'] . ',<br/>';
                            }
                            }
                            else
                                echo "";
                       // }
                        /* ================================================= */
                        echo "</td>";
                        echo "
                                        
                
                </TR>";
                    
                     
                }
                
                ?>	
        </tbody>
        </table>
           
        
 </div>  
</div>
<?php $page_content = ob_get_clean(); ?>        

<?php include('testmaster.php'); ?>


