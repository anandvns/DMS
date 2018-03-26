<?php

//include '../include/header.php';
include '../cbf_Db.php';

$header = "Dispatch Register (ENGLISH) -- (??? ????? ?? ???????)";
?>
<?php ob_start(); ?>

<div class="box">
  <div class="box-body">
    <table class="table table-bordered" id="mytable1" style="border:2px solid black;">
            <thead class="bg-light-blue-active">
                <tr>
                     <th>Id</th>
                    <th>DAK NO.</th>
                    <th>TO WHOM</th>
                  
                    
                </tr>
            </thead>
                
          
        </table>
           
        
 </div>  
</div>
<?php $page_content = ob_get_clean(); ?>        

<?php include('testmaster.php'); ?>


