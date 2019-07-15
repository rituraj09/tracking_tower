<?php 
 
    include("config.php");
    include("header.php"); 

    $sql    = "SELECT a.fileno, a.file_date, c.name as co from track a inner join 
    master_application b on a.app_id=b.id inner join circle_office c on 
    b.co_id= c.id where a.app_status=2 group by a.fileno,a.file_date,c.name 
    order by a.file_date desc,a.fileno";
    $result = mysqli_query($mysqli, $sql) ;
?>
<div class="row">

<div class="col-md-1">
</div>
<div class="col-md-7">
<h3>Draft To Circle Office</h3>
</div>
</div>
<div class="row">

<div class="col-md-1">
</div>
<div class="col-md-7">
<table class="table table-bordered" width="100%" style="font-size:13px !important;">
<tr>
<th width="10%">
Sl. No.
</th>
<th width="20%">
Letter No
</th>
<th  width="20%">
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
    <?php echo $r["fileno"];?>
    </td>
    <td>
        <?php echo date('d-m-Y', strtotime($r['file_date']))?> 
    </td>
    <td>
    <?php echo $r["co"];?>
    </td>
    <td>
    <a class='btn btn-xs btn-warning' style="margin-left:10px" target="_blank"
     href='printco.php?date=<?php echo date('d-m-Y', strtotime($r['file_date']))?>&co=<?php echo  $r["co"] ?>&fileno=<?php echo  $r["fileno"] ?>' >Print</a>

    </td>
</tr>
<?php } ?>
</table>
</div>
</div>

<?php  
    include("footer.php");
?>