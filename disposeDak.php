<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
$ln='';
$sent='';
$rdate='';
$rmarks='';
$Id='';
include '../cbf_Db.php';
//$result = mysql_query("select * from cb_recpt where id=$_GET[Id]");
if(isset($_GET['Id']))
{
    $Id= $_GET['Id'];
    $result = mysql_query("select * from cb_recpt where id=$Id");
    while ($row = mysql_fetch_assoc($result)) 
    {
        $ln = $row['ReplyLetterNo'];
         $sent = $row['IsReplySent'];
         $rdate = $row['ReplyDate'];
         $rmarks = $row['ReplyRemark'];

        }
}

if (isset($_POST['submit'])) {
     
        if (empty($_POST['ReplyLetterNo']) || empty($_POST['dd'])) 
            {
                $error = "Reply Letter No. or Date is Empty or invalid";
            }
        
        else {
                    
                    $ln=$_POST['ReplyLetterNo'];
                    $rdate=$_POST['dd'];
                    $rmarks = $_POST['rmarks'];

                $query = mysql_query("Update cb_recpt set ReplyLetterNo='$ln',ReplyDate='$rdate',ReplyRemark='$rmarks',IsReplySent='Yes' where id=$Id");
                if ($query) 
                    {
                     $error="Updated Successfully!";
                     header("location: index3.php"); // Redirecting To Other Page
                    } 
                    else {
                        /*if (mysql_errno()) { 
                        $error = "MySQL error ".mysql_errno().": ".mysql_error()."\n<br>When executing:<br>\n$query\n<br>";               
                        }*/$error = "DB Error Occured";
                         }
                }
            
}





//$header = "Dak Details";
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

<div class="row">
<div class="col-lg-5 col-xs-5">
  <div class="box-body">
    <table class="table table-bordered" id="mytable" style="border:2px solid black;">
            <thead class="bg-black">
                <tr>
                    <th colspan="2">Dak Details</th>
                    
                    
                </tr>
            <thead>
                
            <tbody class="bg-light-blue"> 
                <?php
               
                mysql_data_seek($result, 0);

                while ($row = mysql_fetch_assoc($result)) {
                  echo " 
                        <tr>
                            <td>Id</td> <td>&nbsp;$row[id]</td> </tr>
                          <tr><td>Dak Type</td> <td>&nbsp;$row[CB_DAK_TYPE]</td></tr>
                           <tr> <td>Dak Date</td><td>&nbsp;$row[CB_DAK_DATE]</td></tr>
                           <tr> <td>Letter No</td><td>&nbsp;$row[CB_DAK_FILENO]</td></tr>
                          <tr>  <td>Received From</td><td>&nbsp;$row[CB_DAK_TOWHOM]</td></tr>
                          <tr>  <td>Subject</td><td>&nbsp;$row[CB_DAK_SUB]</td></tr>
                          <tr>  <td>Entry Date</td><td>&nbsp;$row[CB_DAK_N_DATE]</td></tr>
                          <tr>  <td>Language</td><td>&nbsp;$row[CB_DAK_LANG]</td></tr>
                          <tr>  <td>Received Through</td><td>&nbsp;$row[CB_DAK_RTHROUGH]</td></tr>
                         <tr>   <td>Reply Last Date</td><td>&nbsp;$row[CB_DAK_RDATE]</td></tr>
                          <tr>  <td>Is Reply Sent</td><td>&nbsp;$row[IsReplySent]</td></tr>
                          <tr>  <td>Reply Date</td><td>&nbsp;$row[ReplyDate]</td></tr>
                           
                       ";

                    }
                
                ?>	
        </tbody>
        </table>
     </div>  
</div>
    
<div class="col-lg-5 col-xs-5">
  <div class="box-body">
      <form role="form" class="form-horizontal" action="" onsubmit="return validateForm(this)" enctype="multipart/form-data" method="post" >
     
                 
                
                    <center>&nbsp;<?php if(isset($error)) { echo $error; } ?></center>
                 <div class="form-group">
                  <label for="userid" class="col-sm-4 control-label">Reply Sent </label>
                 <div class="col-sm-4">
                                    <select class='form-control' placeholder='.col-sm-4' name='ReplySent' id='ReplySent'>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    </select>
                                
                  </div>
                 </div>
          
                 <div class="form-group">
                   <label for="rno" class="col-xs-4 control-label">Letter No. </label>
                   <div class="col-xs-6">
                   <input type="text" placeholder=".col-xs-6" class="form-control" size=20 id="rno" name="ReplyLetterNo"  value="<?php echo htmlentities($ln); ?>"/>
                   </div>
                 </div>
                
                <div class="form-group">
                  <label for="rno" class="col-xs-4 control-label">Date.</label>
                  <div class="col-xs-6">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" readonly="true" name = "dd" value="<?php echo htmlentities($rdate); ?>" class="form-control pull-right" id="datepicker">
                  </div>
                 </div>
                </div>
          
                 <div class="form-group">
                  <label for="rno" class="col-sm-4 control-label">Remarks: </label>
                  <div class="col-sm-6">
                  <input type="text" placeholder=".col-sm-6" size=20 class="form-control" name="rmarks" value="<?php echo htmlentities($rmarks); ?>"/>
                  </div>
                 </div>
                
                
         
                <div class="form-group">
                    <label for="rno" class="col-sm-4 control-label"></label>
                  <div class="col-sm-6">
                      
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                        <input type="reset" class="btn btn-default" name="reset" value="Clear" title="Clear"/>
                  </div>
                 </div>
                
                 
                    
           
         
     
</form>
     </div>  
</div> 
    
</div>

 <!--<div class="box box-info">        
 


</div>-->
 
 
<?php $page_content = ob_get_clean(); ?>        

<?php include('testmaster.php'); ?>