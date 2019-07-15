<?php 
 
    include("config.php");
    include("header.php"); 

    $sql    = "select b.id, a.fileno, a.file_date, c.name as co, b.site_id, b.plot_type, b.tower_type from track a inner join 
    master_application b on a.app_id=b.id inner join circle_office c on 
    b.co_id= c.id where a.app_status=8  
    order by a.file_date desc,a.id desc";
    $result = mysqli_query($mysqli, $sql) ;
?>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-7">
<h3>Form 4 (NOC)</h3>
</div>
</div>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-7">
<table class="table table-bordered" width="100%" style="font-size:13px !important;">
<tr>
<th width="6%">
Sl. No.
</th>
<th width="17%">
Site ID
</th>
<th width="20%">
Letter No
</th>
<th  width="17%">
Letter Date
</th>
<th  width="24%">
Circle Office
</th> 
<th></th>
</tr> 
<?php $sno=1; while($r= mysqli_fetch_array($result)) { ?>
<tr>
    <td>
    <?php echo $sno; $sno ++; ?>
    </td>
    <td>
    <?php echo $r["site_id"];?>
    </td>
    <td>
    <?php echo $r["fileno"];?>
    </td>
    <td>
        <?php echo date('d-m-Y', strtotime($r['file_date']))?> 
    </td>
    <td>
    <?php echo $r["co"];?>
    </td>
    <td>
  <!--  <a class='btn btn-xs btn-info' style="margin-left:10px"  
     href='nocupdate.php?id=<?php echo  $r["id"] ?>'>Update</a> -->

<?php if($r["plot_type"]=="" || $r["tower_type"]=="" ){ } else {?>
    <a class='btn btn-xs btn-warning' style="margin-left:10px" target="_blank"
     href='printnoc.php?id=<?php echo  $r["id"] ?>' >Print</a><?php }?>
 

    </td>
</tr>
<?php } ?>
</table>
</div>
</div>

<?php  
    include("footer.php");
?>

