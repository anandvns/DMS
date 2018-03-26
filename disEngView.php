<?php
if (!isset($_SESSION)) { session_start(); }

include '../cbf_Db.php';


$result = mysql_query("select * from cb_dispatch where CB_DAK_LANG='E' order by CB_DAK_NO desc");

$header = "Dispatch Register (ENGLISH) -- (डाक भेजने का रजिस्टर)";
?>
<?php ob_start(); ?>

<div class="box">
  <div class="box-body">
    <table class="table table-bordered" id="mytable" style="border:2px solid black;">
            <thead class="bg-light-blue-active">
                <tr>
                    <th>DAK NO.</th>
                    
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
                          echo "<td>&nbsp;<a href='dispatchEnglish.php?op=edit&Id=$row[CB]'>$row[CB_DAK_NO]</a></td>"; 
					      else 
                          echo "<td>&nbsp;$row[CB_DAK_NO]</td>";

                        echo "<td>&nbsp;$row[CB_DAK_DATE]</td>
                    <td>&nbsp;$row[CB_DAK_TOWHOM]</td>
					<td>&nbsp;$row[CB_DAK_SUB]</td>
					<td>&nbsp;$row[CB_DAK_FILENO]</td>";
                        echo "<td>";
                       
                            $result1 = mysql_query("select S_NAME from section where S_ID =$row[CB_DAK_FROM]");
                            while ($b = mysql_fetch_assoc($result1)) 
                                echo $b['S_NAME'];
                            
                      
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


