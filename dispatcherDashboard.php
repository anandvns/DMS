<?php
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$officeID = $_SESSION['OfficeID'];
$_SESSION['NSR'] = "YES";
$NSR = $_SESSION['NSR'];
include '../cbf_Db.php';

 //$result = mysql_query("select * from cb_recpt where CB IN (Select dak_rece_cantt.u_id from section INNER JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id  where section.user_id='admin')");

 $result = mysql_query("SELECT Count(*) As c FROM cb_recpt");
 $totalinward = mysql_fetch_assoc($result);

 $result = mysql_query("SELECT Count(*) As c FROM cb_dispatch");
 $totaloutward = mysql_fetch_assoc($result);

 $result = mysql_query("SELECT  Count(*) As c FROM cb_recpt Where CB_DAK_LANG='H'");
 $totalinwardH = mysql_fetch_assoc($result);

 $result = mysql_query("SELECT  Count(*) As c FROM cb_dispatch Where CB_DAK_LANG='H'");
 $totaloutwardH = mysql_fetch_assoc($result);

 $result = mysql_query("SELECT  Count(*) As c FROM cb_recpt Where CB_DAK_LANG='E'");
 $totalinwardE = mysql_fetch_assoc($result);

 $result = mysql_query("SELECT  Count(*) As c FROM cb_dispatch Where CB_DAK_LANG='E'");
 $totaloutwardE = mysql_fetch_assoc($result);


 $todaydispose = mysql_query("SELECT  * FROM cb_recpt where STR_TO_DATE(CB_DAK_RDATE, '%d-%m-%Y') = CURRENT_DATE AND IsReplySent is NULL AND CB IN (Select dak_rece_cantt.u_id from section INNER JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id  where section.user_id='admin')");
 
 $totalpending = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND IsReplySent is NULL AND CB IN (Select dak_rece_cantt.u_id from section INNER JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id  where section.user_id='admin')");
 
 $totaldisposed = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND IsReplySent='Yes' AND CB IN (Select dak_rece_cantt.u_id from section INNER JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id  where section.user_id='admin')");

 $totaldak= mysql_num_rows($result);
 $header = "Welcome " . $_SESSION['FName'];
?>
<?php ob_start(); ?>
 <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $totalinward['c']; ?></h3>

              <p>Total Received</p>
              <table>
                  <tr><td>Hindi&nbsp;&nbsp;&nbsp;&nbsp;</td><td>:&nbsp;&nbsp;&nbsp;<strong><?php echo $totalinwardH['c']; ?></strong></td></tr>
                  <tr><td>English&nbsp;&nbsp;</td><td>:&nbsp;&nbsp;&nbsp;<strong><?php echo $totalinwardE['c']; ?></strong></td></tr>
                </table>
              
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          
          
        <!-- ./col -->
        <div class="col-lg-4 col-xs-4">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $totaloutward['c']; ?></h3>

              <p>Total Dispatched</p>
             <table>
                  <tr><td>Hindi&nbsp;&nbsp;&nbsp;&nbsp;</td><td>:&nbsp;&nbsp;&nbsp;<strong><?php echo $totaloutwardH['c']; ?></strong></td></tr>
                  <tr><td>English&nbsp;&nbsp;</td><td>:&nbsp;&nbsp;&nbsp;<strong><?php echo $totaloutwardE['c']; ?></strong></td></tr>
                </table>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        
        
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
      
    </section>
    <!-- /.content -->
<?php $page_content = ob_get_clean(); ?>        

<?php include('testmaster.php'); ?>