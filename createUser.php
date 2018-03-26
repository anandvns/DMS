<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
$uname='';
$password='';
$usr='';
include '../cbf_Db.php';
$result = mysql_query("select Id,User_Id,Name from cb_login order by Id");
if(isset($_GET['op']) && isset($_GET['Id']))
{
    $Id= $_GET['Id'];
    $result1 = mysql_query("select User_Id,pswd,Name from cb_login where Id=$Id");
    $rows = mysql_num_rows($result1);
        if ($rows >0 ) {
                    while ($row = mysql_fetch_assoc($result1)) 
                            {
                             $uname = $row['Name'];
                             $password = $row['pswd'];
                             $usr = $row['User_Id'];
                            }
       
    }
}
if (isset($_POST['submit'])) {
     $userName = '';
        if (empty($_POST['uname']) || empty($_POST['password'])) 
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
                    $uname=$_POST['uname'];
                    $password=$_POST['password'];
                    $usr=$_POST['UserId'];

                $query = mysql_query("Update cb_login set Name='$uname',pswd='$password',User_Id='$usr' where Id=$id");
                if ($query) 
                    {
                     $error="Section Updated Successfully!";
                     header("location: createUser.php"); // Redirecting To Other Page
                    } 
                    else {
                        $error = "DB Error Occured";
                         }
                }
            }
            }
        else
            {

            $sname=$_POST['uname'];
            $password=$_POST['password'];
            $usr=$_POST['UserId'];

            $query = mysql_query("Insert into cb_login(User_Id,NAME,pswd) values('$usr','$uname','$password')");
            if ($query) 
                {
                 $error="Section created Successfully!";
                 header("location: createUser.php"); // Redirecting To Other Page
                } 
                else {
                    $error = "Username or Password is DB invalid";
                     }

            } 
}





$header = "Add New User";
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
                   <label for="rno" class="col-sm-3 control-label">UserId: </label>
                   <div class="col-sm-4">
                   <input type="text" placeholder=".col-sm-4" class="form-control" size=20 id="rno" name="UserId"  value="<?php echo htmlentities($usr); ?>"/>
                   </div>
                 </div>
                
                 <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">Password: </label>
                  <div class="col-sm-4">
                  <input type="text" placeholder=".col-sm-4" size=20 class="form-control" name="password" value="<?php echo htmlentities($password); ?>"/>
                  </div>
                 </div>
                
                <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">Name: </label>
                  <div class="col-sm-4">
                  <input type="text" placeholder=".col-sm-4" size=20 class="form-control" name="uname" value="<?php echo htmlentities($uname); ?>"/>
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
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Action</th>
                    
                </tr>
            <thead>
                
            <tbody> 
                <?php
               
                //$un = array();
                while ($row = mysql_fetch_assoc($result)) {
                  echo " 
                        <tr>
                            <td>&nbsp;$row[Id]</td>
                            <td>&nbsp;$row[User_Id]</td>
                            <td>&nbsp;$row[Name]</td>
                            <td>&nbsp;<a href='createUser.php?op=edit&Id=$row[Id]'><img alt='Edit' src='../images/Edit.png' /></a>
                                &nbsp;&nbsp;<a href='createUser.php?Id=$row[Id]'><img alt='Delete' src='../images/Delete.png' /></a></td>
                        </tr>";

                    }
                
                ?>	
        </tbody>
        </table>
           
        
 </div>  
</div>
<?php $page_content = ob_get_clean(); ?>        

<?php include('testmaster.php'); ?>