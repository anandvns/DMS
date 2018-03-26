<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
$sn='';
$pn='';
$usr='';
include '../cbf_Db.php';
$result = mysql_query("select S_Id,S_NAME,P_NAME,User_Id from section order by S_Id");
if(isset($_GET['op']) && isset($_GET['Id']))
{
    $Id= $_GET['Id'];
    $result1 = mysql_query("select S_Id,S_NAME,P_NAME,User_Id from section where S_Id=$Id");
    $rows = mysql_num_rows($result1);
        if ($rows >0 ) {
                    while ($row = mysql_fetch_assoc($result1)) 
                            {
                             $sn = $row['S_NAME'];
                             $pn = $row['P_NAME'];
                             $usr = $row['User_Id'];
                            }
       
    }
}
if (isset($_POST['submit'])) {
     $userName = '';
        if (empty($_POST['sname']) || empty($_POST['pname'])) 
            {
                $error = "Username or Password is Empty or invalid";
            }
        
        else if(isset($_GET['op']) && isset($_GET['Id']))
            {
            if (!empty($_GET['op']) && !empty($_GET['Id'])) 
            {
                if($_GET['op'] == "edit")
                {
                    $id = $_GET['Id'];
                    $sname=$_POST['sname'];
                    $pname=$_POST['pname'];
                    $usr=$_POST['usrid'];

                $query = mysql_query("Update section set S_NAME='$sname',P_NAME='$pname',User_Id='$usr' where S_Id=$id");
                if ($query) 
                    {
                     $error="Section Updated Successfully!";
                     header("location: createSection.php"); // Redirecting To Other Page
                    } 
                    else {
                        $error = "DB Error Occured";
                         }
                }
            }
            }
        else
            {

            $sname=$_POST['sname'];
            $pname=$_POST['pname'];
            $usr = $_POST['usrid'];

            $query = mysql_query("Insert into section(S_NAME,P_NAME,User_Id) values('$sname','$pname','$usr')");
            if ($query) 
                {
                 $error="Section created Successfully!";
                 header("location: createSection.php"); // Redirecting To Other Page
                } 
                else {
                    $error = "Username or Password is DB invalid";
                     }

            } 
}





$header = "Add New Section";
?>
<?php ob_start(); ?>
<script>
        
        function validateForm(a)
        {
            if (a.sname.value == "")
            {
                alert("Plz Enter The Number of Section");
                a.no.focus();
                return false;
            }
            if (a.pname.value == "")
            {
                alert("Plz Enter The Number of Concerned Section");
                a.dd.focus();
                return false;
            }
            

            return true;
        }

       

</script>
 <div class="box box-info">        
 <form role="form" class="form-horizontal" action="" onsubmit="return validateForm(this)" enctype="multipart/form-data" method="post" >
     
                 
                <div class="box-body">
                    <center><?php if(isset($error)) { echo $error; } ?></center>
                 <div class="form-group">
                   <label for="rno" class="col-sm-3 control-label">Section Name: </label>
                   <div class="col-sm-4">
                   <input type="text" placeholder=".col-sm-4" class="form-control" size=20 id="rno" name="sname"  value="<?php echo htmlentities($sn); ?>"/>
                   </div>
                 </div>
                
                 <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">Concerned Person: </label>
                  <div class="col-sm-4">
                  <input type="text" placeholder=".col-sm-4" size=20 class="form-control" name="pname" value="<?php echo htmlentities($pn); ?>"/>
                  </div>
                 </div>
                    
                 
                
                <div class="form-group">
                  <label for="userid" class="col-sm-3 control-label">User: </label>
                 <div class="col-sm-4">
                                   <select class='form-control' placeholder='.col-sm-4' name='usrid' id='usrid'>
                                   <option value="">Select Client</option>
                                   <?php
                                    $quer = mysql_query("select Id,User_Id from cb_login");
                                     
                                    while ($rw = mysql_fetch_array($quer)) { ?>
                                       
                                        <option value="<?php echo $rw['User_Id']; ?>"<?php if($usr ==$rw['User_Id']) echo 'selected="selected"'; ?>><?php echo $rw['User_Id']; ?></option>
                                        <?php } ?>
                                        </select>
                                
                  </div>
                 </div>
         
                <div class="form-group">
                    <label for="rno" class="col-sm-3 control-label"></label>
                  <div class="col-sm-3">
                      
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                        <input type="reset" class="btn btn-default" name="reset" value="Clear" title="Clear"/>
                  </div>
                 </div>
                
                 
                    
            </div>
         
     
</form>


</div>
 
 <div class="box">
  <div class="box-body">
    <table class="table table-bordered" id="mytable" style="border:2px solid black;">
            <thead class="bg-light-blue-active">
                <tr>
                    <th>Id</th>
                    <th>Section Name.</th>
                    <th>Concerned Person</th>
                    <th>User</th>
                    <th>Action</th>
                    
                </tr>
            <thead>
                
            <tbody> 
                <?php
               
                //$un = array();
                while ($row = mysql_fetch_assoc($result)) {
                  echo " 
                        <tr>
                            <td>&nbsp;$row[S_Id]</td>
                            <td>&nbsp;$row[S_NAME]</td>
                            <td>&nbsp;$row[P_NAME]</td>
                            <td>&nbsp;$row[User_Id]</td>
                            <td>&nbsp;<a href='createSection.php?op=edit&Id=$row[S_Id]'><img alt='Edit' src='../images/Edit.png' /></a>
                                &nbsp;&nbsp;<a href='createSection.php?Id=$row[S_Id]'><img alt='Delete' src='../images/Delete.png' /></a></td>
                        </tr>";

                    }
                
                ?>	
        </tbody>
        </table>
           
        
 </div>  
</div>
<?php $page_content = ob_get_clean(); ?>        

<?php include('testmaster.php'); ?>