<?php
//session_start();
//error_reporting(0);
include '../cbf_Db.php';
$pno='0';
$rthrough='';
$dd='';
$towhom='';
$sub='';
$fno='';
$rmarks='';
$grp='';
$type='';
$rdate='';
$CB='';
$sections='';
$list='-1';
$action="insert";

if(isset($_GET['op']) && isset($_GET['Id']))
{
    $Id= $_GET['Id'];
    
    $result1 = mysql_query("select * from cb_recpt where CB='$Id' and CB_DAK_LANG='H'");
    $sections = mysql_query("select GROUP_CONCAT(s_id) as s_id from dak_rece_cantt where u_id='$Id'");
    
    while ($row = mysql_fetch_assoc($sections)) 
        $list = explode(',',$row['s_id']);
    
    $rows = mysql_num_rows($result1);
        if ($rows > 0) {
                    while ($row = mysql_fetch_assoc($result1)) 
                            {
                           
                            $dakno  = $row['CB_DAK_NO'];
                            $pno=$row['CB_DAK_REC_NO'];
                            $rthrough=$row['CB_DAK_RTHROUGH'];
                            $dd=$row['CB_DAK_DATE'];
                            $towhom=$row['CB_DAK_TOWHOM'];
                            $sub=$row['CB_DAK_SUB'];
                            $fno=$row['CB_DAK_FILENO'];
                            $rmarks=$row['CB_DAK_REMARK'];
                            $grp=$row['CB_DAK_TYPE'];
                            $type=$row['CB_DAK_RTYPE'];
                            $rdate=$row['CB_DAK_RDATE'];
                            $CB=$row['CB'];
                            $action="update";
                            }
       
    }
}
else
{



include_once '../class/random.php';

$random = random::r();

include_once 'dak_no_recpt.php';
}
//$page_content = 'rrtt1.php';
$header = "Receipt Register (HINDI) -- Add New (डाक प्राप्ति का रजिस्टर)";
?>
<?php ob_start(); ?>
 <div class="box box-info">        
 <form id="myform" role="form" class="form-horizontal" action="recptHindi2.php" onsubmit="return validateForm(this)" enctype="multipart/form-data" method="post" >
     
                 
                <div class="box-body">
                 <div class="form-group">
                   <label for="rno" class="col-sm-3 control-label">रजिस्ट्रेशन नंबर Register No.: </label>
                   <div class="col-sm-1">
                   <input type="text" placeholder=".col-sm-1" class="form-control" size=20 id="rno" name="rno" readonly value="<?php echo $dakno; ?>"/>
                   </div>
                 </div>
                
                 <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">पृष्ट संख्या Nos: </label>
                  <div class="col-sm-1">
                  <input type="text" placeholder=".col-sm-1" size=20 class="form-control" name="no" value="<?php echo $pno; ?>"/>
                  </div>
                 </div>
         
                <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">माध्यम से ( Received Through.)</label>
                  <div class="col-sm-3">
                   <select name="rthrough" onchange="choice1(this)" class="form-control" >
                            <option value="NP" <?php if($rthrough =="NP") echo 'selected="selected"'; ?> >Normal Post</option>
                            <option value="SP" <?php if($rthrough =="SP") echo 'selected="selected"'; ?> >Speed/Registered Post</option>
                            <option value="BH" <?php if($rthrough =="BH") echo 'selected="selected"'; ?> >By Hand</option>
                            <option value="Email" <?php if($rthrough =="Email") echo 'selected="selected"'; ?> >Email</option>
                   </select>
                  </div>
                 </div>
         
                <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">दिनाक ( Date.)</label>
                  <div class="col-sm-3">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" readonly="true" name = "dd" class="form-control pull-right" id="datepicker" value="<?php echo $dd; ?>" >
                  </div>
                 </div>
                </div>
         
                <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">किसके द्वारा From Whom: </label>
                  <div class="col-sm-5">
                  <input type="text" placeholder=".col-sm-5" size=20 class="form-control" name="towhom" value="<?php echo $towhom; ?>" />
                  </div>
                 </div>
         
                <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">विषय Subject: </label>
                  <div class="col-sm-5">
                   <input type="text" placeholder=".col-sm-5" size=20 class="form-control" name="sub" value="<?php echo $sub; ?>" />
                  </div>
                 </div>
         
                <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">फाइल नंबर File Number: </label>
                  <div class="col-sm-3">
                   <input type="text" placeholder=".col-sm-3" size=20 class="form-control" name="fno" value="<?php echo $fno; ?>" />
                  </div>
                 </div>
                    
                <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">सम्बंधित अनुभाग Concern Sections: </label>
                <div class="col-sm-5">
                                   <?php
                                    $quer = mysql_query("select * from section");
                                    echo "<select data-placeholder='Choose Sections ...' placeholder='.col-sm-5'  multiple name='tobox[]' id='tobox' ><option value=''>Select one</option>"; 
                                    
                                    while ($a = mysql_fetch_array($quer)) { ?>
                                        
                                    <option value="<?php echo $a['S_Id']; ?>" <?php if($list != '-1') { if(in_array($a['S_Id'], $list)) echo 'selected="selected"';} ?> ><?php echo $a['S_NAME']; ?></option>
                                    <?php } echo '</select> ' ?>
                                    
                                
                  </div>
                 </div>
                    
                 <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">विवरण Remarks: </label>
                  <div class="col-sm-3">
                   <input type="text" placeholder=".col-sm-3" size=20 class="form-control" name="remark" value="<?php echo $rmarks; ?>" />
                  </div>
                 </div>
                    
                <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">ग्रुप ( Group.)</label>
                  <div class="col-sm-3">
                   <select name="type" class="form-control">
                            <option value="">Select</option>
                            <option value="DGDE" <?php if($grp =="DGDE") echo 'selected="selected"'; ?> >DGDE</option>
                            <option value="PDDE" <?php if($grp =="PDDE") echo 'selected="selected"'; ?> >PDDE</option>
                            <option value="A" <?php if($grp =="A") echo 'selected="selected"'; ?> >Army</option>
                            <option value="OCF" <?php if($grp =="OCF") echo 'selected="selected"'; ?> >OCF</option>
                            <option value="DEO" <?php if($grp =="DEO") echo 'selected="selected"'; ?> >DEO</option>
                            <option value="DM" <?php if($grp =="DM") echo 'selected="selected"'; ?> >Local Administration</option>
                            <option value="L" <?php if($grp =="L") echo 'selected="selected"'; ?> >Leave</option>
                            <option value="N" <?php if($grp =="N") echo 'selected="selected"'; ?> >Normal</option>
                            <option value="NPS" <?php if($grp =="NPS") echo 'selected="selected"'; ?> >New Pension Scheme</option>
                        </select>
                  </div>
                 </div>
                    
                <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">प्रकार ( Type.)</label>
                  <div class="col-sm-3">
                   <select name="rtype" class="form-control" >
                            <option value="">Select</option>
                            <option value="Normal" <?php if($type =="Normal") echo 'selected="selected"'; ?> >Normal</option>
                            <option value="Urgent" <?php if($type =="Urgent") echo 'selected="selected"'; ?> >Urgent</option>
                            <option value="Very-Urgent" <?php if($type =="Very-Urgent") echo 'selected="selected"'; ?> >Very Urgent</option>
                            <option value="VIP" <?php if($type =="VIP") echo 'selected="selected"'; ?> >VIP Ref</option>
                        </select>
                  </div>
                 </div>
                
                <div class="form-group">
                  <label for="rno" class="col-sm-3 control-label">रिप्लाई डेट ( Reply Date.)</label>
                  <div class="col-sm-3">
                  <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" readonly="true" class="form-control pull-right" name="rdd" id="rdate" value="<?php echo $rdate; ?>">
                  </div>
                 </div>
                </div>
                    
                <div class="form-group">
                    <label for="rno" class="col-sm-3 control-label"></label>
                  <div class="col-sm-3">
                       <input type="hidden" name="random" id="random" value="<?php if($action == "insert") echo $random; else echo $CB; ?>" readonly/>
                      <input type="hidden" name="action" id="action" value="<?php echo $action ?>" readonly/>
                        <input id="add_btn" type="submit" class="btn btn-primary" name="submit" value="Submit"/>
                        <input type="reset" class="btn btn-default" name="reset" value="Clear" title="Clear"/>
                  </div>
                 </div>
                    
            </div>
         
     
</form>
<script>
        function choice1(select) {
            if(select.options[select.selectedIndex].value=="SP")
            alert("स्पीड/रजिस्टर्ड  पोस्ट से प्राप्त डाक का नंबर विवरण में लिखें!!!!");
        }
        function validateForm(a)
        {
            if (a.no.value == "")
            {
                alert("Plz Enter The Number of Receipt DAK");
                a.no.focus();
                return false;
            }
            if (a.dd.value == "")
            {
                alert("Plz Select Date");
                a.dd.focus();
                return false;
            }
            if (a.mm.value == "")
            {
                alert("Plz Select Month");
                a.mm.focus();
                return false;
            }
            if (a.yy.value == "")
            {
                alert("Plz Select Year");
                a.yy.focus();
                return false;
            }
            if (a.towhom.value == "")
            {
                alert("Plz Enter Name and Address of The Sender");
                a.towhom.focus();
                return false;
            }
            if (a.sub.value == "")
            {
                alert("Plz Enter Subject");
                a.sub.focus();
                return false;
            }
            //if (a.toBox.value == "")
           // {
               // alert("Plz Select Concerning Section");
               // a.toBox.focus();
               // return false;
           // }
            if (a.type.value == "")
            {
                alert("Plz Select The Type Of Dak");
                a.type.focus();
                return false;
            }
            if (a.rtype.value == "")
            {
                alert("Plz Select The Reply Type Of Dak");
                a.type.focus();
                return false;
            }

            return true;
        }

       

</script>

</div>
<?php $page_content = ob_get_clean(); ?>        

<?php include('testmaster.php'); ?>