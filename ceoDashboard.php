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


 $todaydispose = mysql_query("SELECT  * FROM cb_recpt where STR_TO_DATE(CB_DAK_RDATE, '%d-%m-%Y') = CURRENT_DATE AND IsReplySent is NULL AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id)");
 
 $totalpending = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND IsReplySent is NULL AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id )");

 $totalvippending = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND CB_DAK_TYPE='VIP' AND IsReplySent is NULL AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id )");

 $totalpddepending = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND CB_DAK_TYPE='PDDE' AND IsReplySent is NULL AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id )");

 $totaldgdepending = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND CB_DAK_TYPE='DGDE' AND IsReplySent is NULL AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id )");

$totalotherspending = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND CB_DAK_TYPE NOT IN ('DGDE','PDDE','VIP') AND IsReplySent is NULL AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id )");
 
 $totaldisposed = mysql_query("SELECT  * FROM cb_recpt where CB_DAK_RDATE != 'NM' AND IsReplySent='Yes' AND CB IN (Select DISTINCT dak_rece_cantt.u_id from section  JOIN dak_rece_cantt on section.S_Id = dak_rece_cantt.s_id)");

 $section = mysql_query("SELECT  Count(*) as total,section.User_Id,section.P_NAME FROM cb_recpt 
                                                                  join dak_rece_cantt 
                                                                    on cb_recpt.CB = dak_rece_cantt.u_id 
                                                                  join section
                                                                   on dak_rece_cantt.s_id = section.S_Id
                                                                  where cb_recpt.CB_DAK_RDATE != 'NM' AND cb_recpt.IsReplySent is NULL
                                                                  GROUP BY section.P_NAME,section.User_Id");

 $totaldak= mysql_num_rows($result);
 $header = "Welcome Sir";
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
        
     <div class="row">
         <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo mysql_num_rows($todaydispose); ?></h3>

              <p>Today disposal </p>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         
         <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo mysql_num_rows($totalpending); ?></h3>

              <p>Total Pending </p>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         
         <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo mysql_num_rows($totalvippending); ?></h3>

              <p>Total VIP Ref Pending </p>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo mysql_num_rows($totalpddepending); ?></h3>

              <p>Total PDDE Pending </p>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo mysql_num_rows($totaldgdepending); ?></h3>

              <p>Total DGDE Pending </p>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         
        <div class="col-lg-2 col-xs-2">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo mysql_num_rows($totalotherspending); ?></h3>

              <p>Other Pending </p>
            </div>
           <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         
     </div>
      <!-- /.row -->
    <div class="row"><h3>&nbsp;&nbsp;Total Dak Pending with Concerned Sections</h3></div>
      <div class="row">
          <div class="box">
  <div class="box-body">
    <table class="table table-bordered" id="mytable" style="border:2px solid black;">
            <thead class="bg-light-blue-active">
                <tr>
                    <th>Total Pending</th>
                    
                    <th>Section Head</th>
                    
                </tr>
            <thead>
                
            <tbody> 
                <?php
               
                //$un = array();
                while ($row = mysql_fetch_assoc($section)) {
                    echo " 
    			<tr>
					<td>&nbsp;$row[total]</td>
					
					<td>&nbsp;<a href='pendingList.php?uid=$row[User_Id]'>$row[P_NAME]</a></td>
                     
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