<?php
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");

include '../cbf_Db.php';
/*header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");*/
/*$totaldak;
$totalunattended;
$todaypending;
$totalpending;
$totaldisposed;*/
 $UserId = $_SESSION['UserId'];
 
 $header = "Welcome " . $_SESSION['FName'];
 
 $result = mysql_query("select * from cb_recpt where CB IN (Select DISTINCT dak_rece_cantt.u_id from section JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id  where section.user_id='$UserId')");

 $todaysdak = mysql_query("SELECT  * FROM cb_recpt where STR_TO_DATE(CB_DAK_N_DATE, '%d-%m-%Y') = CURRENT_DATE AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id  where section.user_id='$UserId')");
  
 $todaydispose = mysql_query("SELECT  * FROM cb_recpt where STR_TO_DATE(CB_DAK_RDATE, '%d-%m-%Y') = CURRENT_DATE AND IsReplySent is NULL AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id  where section.user_id='$UserId')");
 
 $totalpending = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND IsReplySent is NULL AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section  JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id  where section.user_id='$UserId')");
 
 $totaldisposed = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND IsReplySent='Yes' AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section  JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id  where section.user_id='$UserId')");

 $totaldak= mysql_num_rows($result);

?>
<?php ob_start(); ?>
 <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $totaldak; ?></h3>

              <p>Total Dak Marked </p>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
          
          
        <!-- ./col -->
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo mysql_num_rows($todaysdak); ?></h3>

              <p>Today Marked</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo mysql_num_rows($todaydispose); ?></h3>

              <p>Dispose by Today</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo mysql_num_rows($totalpending); ?></h3>

              <p>Total Pending dak</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo mysql_num_rows($totaldisposed); ?></h3>

              <p>Total disposed dak</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row"><h3>&nbsp;&nbsp;Today's Dak List</h3></div>
      <div class="row">
          <div class="box">
  <div class="box-body">
    <table class="table table-bordered" id="mytable" style="border:2px solid black;">
            <thead class="bg-light-blue-active">
                <tr>
                    <th>Letter No. </th>
                    
                    <th>Date</th>
                    <th>From </th>
                    <th>Subject</th>
                    
                   
                    <th>Reply Last Date </th>
                    <th>Disposed </th>
                    <th>Dispose Date </th>
                </tr>
            <thead>
                
            <tbody> 
                <?php
               
                //$un = array();
                while ($row = mysql_fetch_assoc($result)) {
                    echo " 
    			<tr>
					<td>&nbsp;<a href='disposeDak.php?Id=$row[id]'>$row[CB_DAK_FILENO]</a></td>
					
					<td>&nbsp;$row[CB_DAK_DATE]</td>
                    <td>&nbsp;$row[CB_DAK_TOWHOM]</td>
					<td>&nbsp;$row[CB_DAK_SUB]</td>
					
                    <td>&nbsp;
                    $row[CB_DAK_RDATE]</td>                        
                    <td>&nbsp;
                    $row[IsReplySent]</td> 
                    <td>&nbsp;
                    $row[ReplyDate]</td>  
                    </TR>";
                    
                     
                }
                
                ?>	
        </tbody>
        </table>
           
        
 </div>  
</div>
        </div>
      
    </section>
    <!-- /.content -->
<?php $page_content = ob_get_clean(); ?>        

<?php include('testmaster.php'); ?>