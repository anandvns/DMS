<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
include '../cbf_Db.php';
$UserId='';
$name='';
$utype='';

if (isset($_POST['submit'])) {
     $userName = '';
if (empty($_POST['user']) || empty($_POST['pswd'])) 
    {
        $error = "Username or Password is Empty or invalid";
    }
else
    {
    // Define $username and $password
    $username=$_POST['user'];
    $password=md5($_POST['pswd']);
    

    $query = mysql_query("select User_Id,NAME,USER_TYPE from cb_login where USER_ID='$username' and PSWD='$password'");
    $rows = mysql_num_rows($query);
        if ($rows >0 ) {
                    while ($row = mysql_fetch_assoc($query)) 
                            {
                            $name = $row['NAME'];
                            $UserId= $row['User_Id'];
                            $utype = $row['USER_TYPE'];
                            }

                    $_SESSION['FName']=$name; // Initializing Session
                    $_SESSION['UserId'] = $UserId;
                    $_SESSION['utype'] = $utype;
                    if($utype == 'D')
                        header("location: dispatcherDashboard.php");
                    else if($utype == 'U')
                        header("location: userDashboard.php"); // Redirecting To Other Page
                    else if($utype == 'C')
                        header("location: ceoDashboard.php");
                    else if($utype == 'A')
                        header("location: adminDashboard.php");
                    //exit();
                    /*$url = "test.php"; // targ et of the redirect
                    $delay = "3"; // 50 second delay	
                    echo '<meta http-equiv = "refresh" content = "' . $delay . ';url = ' . $url . '">';*/
                        } 
        else {
            $error = "Username or Password is DB invalid";
             }

    } 
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cantonment Board Shahjahanpur</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Multiple Select -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-multiselect.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/js/buttons.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


<script>
            function validateForm()
            {
                if (document.logonForm.user.value == "")
                {
                    alert("Please Enter User Name");
                    document.logonForm.user.focus();
                    return false;
                }
                else if (document.logonForm.pswd.value == "")
                {
                    alert("Please Enter Password");
                    document.logonForm.pswd.focus();

                    return false;
                }
            }
        </script> 

    
  
</head>
<body class="hold-transition login-page">


  
     
       
        
  <div class="login-box">
  <div class="login-logo">
    <img src="../images/Cantt%20Logo.JPG">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to Dak Management System</p>
   <span><?php if(isset($error)) { echo $error; } ?></span>
    <form name="logonForm" action="" method="post" onSubmit="return validateForm();">
      
      <div class="form-group has-feedback">
        <input name="user" type="text" class="form-control" placeholder="Email"/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
        
        <div class="form-group has-feedback">
        <input name="pswd" type="password" class="form-control" placeholder="Password"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
        
        
        <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
         <input class="btn btn-primary btn-block" type="submit" value="submit" name="submit">
         <input class="btn btn-default btn-block" type="reset" value="Reset" name="B2">
          
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    

  </div>
  <!-- /.login-box-body -->
</div>
           
     
  
    
    
  

  
 




</body>
</html>
