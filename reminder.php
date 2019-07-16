<?php 
 
    include("config.php");
    include("header.php"); 
 
    $sql="SELECT a.fileno, a.file_date, c.name as co FROM track a inner join
     master_application b on a.app_id=b.id and a.app_status=b.curr_status 
     inner join circle_office c on b.co_id=c.id where app_status=2 and a.is_delete=0 and 
     b.is_delete=0 and DATEDIFF(CURDATE(), a.file_date) >10 group by a.fileno, a.file_date order by file_date";
    $result = mysqli_query($mysqli, $sql) ;

   
  ?>
  <style> 
  @media print { 
  .noprint 
    {
      visibility: hidden; 
    }
}
.txt{
    float:left;
    width:"40%"; 
}
.numberCircle {
  margin-left:6px;
  border-radius: 50%;
  behavior: url(PIE.htc);
  /* remove if you don't care about IE8 */
  float:left;
  width: 20px;
  height: 20px;
  padding: 3px;
  background: #e02469;
  border: 1px solid #666;
  color: #fff;
  text-align: center;
  font: 11px Arial, sans-serif;
}
.blink_me {
  animation: blinker 2s linear infinite;
  margin-left:6px;
  border-radius: 50%;
  behavior: url(PIE.htc);
  /* remove if you don't care about IE8 */
  float:left;
  width: 20px;
  height: 20px;
  padding: 3px;
  background: #e02469;
  border: 1px solid #666;
  color: #fff;
  text-align: center;
  font: 11px Arial, sans-serif;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>
 <div class="row">
 <div class="col-md-11"> <input type="button" style="cursor:pointer; float:right;" class="btn btn-info" onclick="printDiv('printableArea')" value="Print" /> 
</div>
</div>
<div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10">
  <h3>Old letters not reply from Circle Office</h3>
  </div>
  </div>
  <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10" id="printableArea" >

  <table class="table table-bordered" width="100%" style="font-size:13px !important;">
  <tr>
  <th width="6%">

  Sl. No.
  </th> 
  <th class="no-print">
  Letter No
  </th>
  <th  width="13%">
  Letter Date
  </th>
   
  <th  width="23%">
  Circle Office
  </th> 
  <th width="20%"  ></th>
  </tr> 
  <?php $sno=1; while($r= mysqli_fetch_array($result)) { ?>
  <tr>
      <td>

      <?php echo $sno; $sno ++; ?>
      </td>
      
      <td>
      <div class="txt" >
      <a  style="margin-left:10px" target="_blank"
     href='printco.php?date=<?php echo date('d-m-Y', strtotime($r['file_date']))?>&co=<?php echo  $r["co"] ?>&fileno=<?php echo  $r["fileno"] ?>' ><?php echo $r["fileno"];  ?></a>

        
        </div>
        <?php   $old_file=$r["fileno"];
            $sql1="SELECT * from reminder WHERE old_file='$old_file'";
            $r1 = mysqli_query($mysqli, $sql1); 
            if ($r1->num_rows > 0)
            {
                $s=1; 
                while($rs= mysqli_fetch_array($r1)) 
                {   
               ?>     
                  <div class="numberCircle"> <?php echo $s;  ?> </div>
       
                 <?php   $s ++;  
                } 
            }
            else
            {?>
              <div class="blink_me">
              1
                  </div>
                  <?php  }
            
            $sql2="SELECT count(*) +1  as cnt from reminder WHERE old_file='$old_file'  and DATEDIFF(CURDATE(), file_date) >10 ";
            $r2 = mysqli_query($mysqli, $sql2); 
            
            while($rs= mysqli_fetch_array($r2)) 
            { 
              if ((int)$rs["cnt"] > 1)
            {
              ?>
         
              <div class="blink_me">
              <?php echo  $rs["cnt"]; ?> 
                  </div>
                  
            <?php } 
            }
           ?>
 

      </td>
      <td>
          <?php echo date('d-m-Y', strtotime($r['file_date']))?> 
      </td>
      <td>
      <?php echo $r["co"];?>
      </td>
      <td class='no-print'> 
      <?php if( $_SESSION['type']=="3")
 {  }
 else{ ?>
      <a class='btn btn-xs btn-info'  
       href='addreminder.php?letter=<?php echo $r["fileno"];  ?>' >Add Reminder</a> <?php } ?>
       <?php if ($r1->num_rows > 0)
            { ?>
      <a class='btn btn-xs btn-success' style="margin-left:10px" 
       href='viewreminder.php?letter=<?php echo $r["fileno"];  ?>' >View Reminder</a> 
   
       <?php    }?>
      </td>
  </tr>
  <?php } ?>
  </table>
  </div>
  </div>
  <script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
  <?php  
      include("footer.php");
  ?>
  
  