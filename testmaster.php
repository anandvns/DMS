<?php if (!isset($_SESSION)) { session_start(); }
$dash='Anand';
    if($_SESSION['utype'] == "U") 
        $dash = 'userDashboard.php';
    else if($_SESSION['utype'] == "C") 
        $dash = 'ceoDashboard.php';
    else if($_SESSION['utype'] == "D") 
        $dash = 'dispatcherDashboard.php';
    else if($_SESSION['utype'] == "A") 
        $dash = 'adminDashboard.php';
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
  <!--<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap-multiselect.css">-->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/chosen.css">
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
    
    
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        #tobox {
  width: 500px;

}
        .chosen-choices {
  background-color: red;
  background-image: none;
}
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
     
    <center class="navbar navbar-static-top">
        <H1>CANTONMENT BOARD SHAHJAHANPUR - DAK MANAGEMENT SYSTEM</H1>
    </center>
  </header>
    
    
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="padding-top:0px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-center image">
          <img src="../images/Cantt%20Logo.JPG" class="img-circle" alt="User Image">
        </div>
        
      </div>
      
        
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigation</li>
        <li><a href="<?php echo $dash ?>" ><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
       
        <?php if($_SESSION['utype'] == "D" || $_SESSION['utype'] == "A") {
        echo '<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Dispatch</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dispatchEnglish.php"><i class="fa fa-circle-o"></i> Dispatch English</a></li>
            <li><a href="disHindi.php"><i class="fa fa-circle-o"></i> Dispatch Hindi</a></li>
            
          </ul>
        </li>
          
         <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Receipt</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="recptEng.php"><i class="fa fa-circle-o"></i> Receipt English</a></li>
            <li><a href="recptHindi.php"><i class="fa fa-circle-o"></i> Receipt Hinid</a></li>
            
          </ul>
        </li>';
         } ?>
          
        <?php if($_SESSION['utype'] == "A") {
        echo '<li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="createUser.php"><i class="fa fa-circle-o"></i> Create User</a></li>
            <li><a href="createSection.php"><i class="fa fa-circle-o"></i> Create Section</a></li>
            
          </ul>
        </li>';
         } ?>
          
        
        
        
        
        
        
          
        <li class="header">Reports</li>
        <li><a href="recEngView.php"><i class="fa fa-book"></i> <span>View Receipt English</span></a></li>
        <li><a href="recHindiView.php"><i class="fa fa-book"></i> <span>View Receipt Hindi</span></a></li>
        <li><a href="disEngView.php"><i class="fa fa-book"></i> <span>View Dispatch English</span></a></li>
        <li><a href="disHindiView.php"><i class="fa fa-book"></i> <span>View Dispatch Hindi</span></a></li>
          
        <li class="header">Operation</li>
        <li><a href="logout.php"><i class="fa fa-circle-o"></i> <span>Logout</span></a></li>
          
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php 
          if(isset($header))
          echo $header; ?>
      </h1>
      
    </section>
       <section class="content"> 
        <div class="row">
    <?php echo $page_content;?>
           </div>
      </section>
  </div>
    
    
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Designed & Developed by</strong> Anand Gupta Programmer,Cantonment Board Shahjahanpur.
    reserved.
  </footer>

  
 
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/datatables.net-bs/js/jquery-1.12.4.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap 
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart 
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script> -->
<!-- daterangepicker 
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    
<script src="bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="bower_components/datatables.net-bs/js/buttons.flash.min.js"></script>
<script src="bower_components/datatables.net-bs/js/jszip.min.js"></script>
<script src="bower_components/datatables.net-bs/js/pdfmake.min.js"></script>
<script src="bower_components/datatables.net-bs/js/vfs_fonts.js"></script>
<script src="bower_components/datatables.net-bs/js/buttons.html5.min.js"></script>
<script src="bower_components/datatables.net-bs/js/buttons.print.min.js"></script>

<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- Multiple Select -->
<!--<script src="bower_components/bootstrap/dist/js/bootstrap-multiselect.js"></script>-->
<script src="bower_components/bootstrap/dist/js/chosen.jquery.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


 <script>
 var dst="{'cb_dispatch':[{'Col1':'id'},{'Col2':'CB_DAK_NO'}, {'Col3':'CB_DAK_TOWHOM'}]}";
 //var jString=JSON.stringify(dst);
     
  $(function () {
     //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      ignoreReadonly: true
    })
    
    $('#rdate').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      ignoreReadonly: true
    })
    
   /* $('#tobox').multiselect({
       
       includeSelectAllOption: true
    });*/
    
    $('#tobox').chosen();
   
      
     $('#mytable').DataTable({
          "aaSorting": [[0, "desc"]],
          "pageLength": 10,
          "dom": 'Bfrtip',
          "buttons": [
            'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
        ]
     })
     
    /* $('#mytable1').DataTable({
         "bProcessing": true,
		"bServerSide": true,
		"sAjaxSource": "getData.php",
         "fnServerParams": function ( aoData ) {
         aoData.push( {"name": "tname", "value": "cb_dispatch"} );
         aoData.push( {"name": "cols", "value": "id,CB_DAK_NO,CB_DAK_TOWHOM"} );
        //     aoData['tName'] = dst;
         },
         "pageLength": 10,
         "aaSorting": [[0, "desc"]]
         
     });*/
  });
</script>   

</body>
</html>
