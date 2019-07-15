<?php 
 
    include("config.php");
    include("header.php"); 
    if(isset($_REQUEST['letter']))
    {
        $old_file=$_REQUEST['letter'];
        $sql="SELECT a.id, a.file_no, a.file_date, a.old_file, a.old_date, c.name as coname from reminder a inner join track t on a.old_file = t.fileno inner join master_application b on b.id=t.app_id inner join circle_office c on b.co_id = c.id WHERE old_file='$old_file' group by a.id, a.file_no, a.file_date, a.old_file, a.old_date, c.name order by file_date";
        $result = mysqli_query($mysqli, $sql) ;
    }
  ?> 
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <a class="btn btn-danger pull-right" href="reminder.php">Back</a>
    </div>
</div>
  <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10">
  <h3>Reminder letters</h3>
  </div>
  </div>
  <div class="row">
  <div class="col-md-1">
  </div>
  <div class="col-md-10">
  <table class="table table-bordered" width="100%" style="font-size:13px !important;">
  <tr>
  <th width="6%">

  Sl. No.
  </th> 
  <th >
  Reminder Letter No
  </th>
  <th  width="13%">
  Reminder Letter Date
  </th>
  <th >
  Letter No
  </th>
  <th  width="13%">
  Letter Date
  </th>
  <th  width="23%">
  Circle Office
  </th> 
  <th width="20%"></th>
  </tr> 
  <?php $sno=1; while($r= mysqli_fetch_array($result)) { ?>
  <tr>
      <td>

      <?php echo $sno; $sno ++; ?>
      </td>
      
      <td>
      <div class="txt">
        <?php echo $r["file_no"];  ?>
        </div> 
      </td>
      <td>
          <?php echo date('d-m-Y', strtotime($r['file_date']))?> 
      </td>
      <td>
      <?php echo $r["old_file"];  ?>
      </td>
      <td>
          <?php echo date('d-m-Y', strtotime($r['old_date']))?> 
      </td>
      <td>
      <?php echo $r["coname"];?>
      </td>
      <td> 
    
      <a class='btn btn-xs btn-warning' style="margin-left:10px" 
       href='printreminder.php?id=<?php echo $r["id"];  ?>' target="_blank">Print</a> 
   
  
      </td>
  </tr>
  <?php } ?>
  </table>
  </div>
  </div>
  
  <?php  
      include("footer.php");
  ?>
  
  