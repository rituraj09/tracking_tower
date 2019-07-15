<style>
table tr th{
    background:#cecece;
}
.red{
   background:#fb0000 !important;
   color:#fff !important;
}
.lightblue
{
   background:#b8e5ff !important; 
}
.darkblue
{
   background:#0276b9 !important; 
   color:#fff !important;
}
.orange
{
   background:#e68c1d !important;  
   color:#fff !important;
}
.green
{
   background:#68c36f !important;  
   color:#fff !important;
}
.yellow
{
   background:#e6dd67 !important;  
}
</style>
<?php 
 
 include("config.php");
 include("header.php");  
 $statusid = "";
 $co_id = "";
 $result ="";
 $siteid="";
 $status="";
 $co_id="";
 $co = mysqli_query($mysqli,"SELECT id, name  from  circle_office"); 
 $c_status = mysqli_query($mysqli,"SELECT id, curr_status  from  status where id<10"); 
 
?>

<?php
 $p_co =   ""; 
 $p_status =   ""; 
 $p_siteid =   ""; 
if(isset($_POST['Submit']))
{  
   if($_POST['ddco']!="")
   {
       $p_co =  " and a.co_id =". $_POST['ddco']; 
       $co_id = $_POST['ddco'];
   }
   if($_POST['status']!="") {
       $p_status =   " and a.curr_status =".$_POST['status']; 
       $status=$_POST['status'];
   }
   if($_POST['siteid']!="") {
       $siteid = $_POST['siteid'];
       $p_siteid =   " and a.site_id like '%".$_POST['siteid']."%'"; 
   } 
}
 
$sql="";
if(isset($_POST['Submit']))
{
   $sql="SELECT COUNT(a.id)  from  master_application a 
   inner join company_master b on a.company_id=b.id inner join track x on a.id = x.app_id and a.curr_status = x.app_status
   inner join circle_office c on a.co_id=c.id  inner join status d on a.curr_status=d.id 
   where  a.is_delete=0 $p_co  $p_status  $p_siteid"; 
}
else{
   $sql = "SELECT COUNT(a.id)  from  master_application a 
   inner join company_master b on a.company_id=b.id inner join track x on a.id = x.app_id and a.curr_status = x.app_status
   inner join circle_office c on a.co_id=c.id  inner join status d on a.curr_status=d.id 
   where  a.is_delete=0";
}
   $x = mysqli_query($mysqli, $sql) ;
   $r = mysqli_fetch_row($x);
   $numrows = $r[0]; 

// number of rows to show per page
$rowsperpage = 20;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

if(isset($_POST['Submit']))
{
   $sql = "SELECT a.id, a.dd_status, a.site_id, a.curr_status as sts, b.name as comp, c.name as co, d.curr_status, x.remarks  from  master_application a 
   inner join company_master b on a.company_id=b.id inner join track x on a.id = x.app_id and a.curr_status = x.app_status
   inner join circle_office c on a.co_id=c.id  inner join status d on a.curr_status=d.id 
   where  a.is_delete=0 $p_co  $p_status  $p_siteid order by a.id  LIMIT $offset, $rowsperpage";
}
else
{
   $sql = "SELECT a.id,  a.dd_status, a.site_id, a.curr_status as sts, b.name as comp, c.name as co, d.curr_status, x.remarks  from  master_application a 
   inner join company_master b on a.company_id=b.id inner join track x on a.id = x.app_id and a.curr_status = x.app_status
   inner join circle_office c on a.co_id=c.id  inner join status d on a.curr_status=d.id 
   where  a.is_delete=0 order by a.id  LIMIT $offset, $rowsperpage";
}
$result = mysqli_query($mysqli, $sql) ;

 

/******  build the pagination links ******/
// range of num links to show
$range = 3;

$sno=($currentpage*20)-19 ; 

$pageid="";
if(isset($_REQUEST['currentpage']))
{ 
   $pageid=$_REQUEST['currentpage'];
}
?>


<div class="container"> 
<div class="row"> 
<div class="col-md-12">
<h3>Report</h3>
</div>
</div>

<div class="row"> 
<div class="col-md-12"> 
<form action="view.php" method="POST"  name="myform" >
<table>
<tr>
<td>
<span style="float:right ; margin: 0 10 0 0">Circle Office : </span>
</td>
<td width="20%">

<select id="ddco"  name="ddco" class="form-control" >
 <option value="">--Select--</option>
<?php while($r= mysqli_fetch_array($co)) { ?>
 <option value="<?php echo $r["id"]; ?>"  <?php if( $r["id"]==$co_id)  echo 'selected';    ?>> <?php echo  $r["name"]; ?></option>

<?php } ?>
</td> 
<td width="13%">
<span style="float:right; margin: 0 10 0 0">Current Status : </span>
</td>
<td width="20%">
<select name="status" id="status"  class="form-control" onmousedown="this.value='';">
 <option value="">--Select--</option>
<?php while($r= mysqli_fetch_array($c_status)) { ?>
 <option value="<?php echo $r["id"]; ?>"  <?php if( $r["id"]==$status)  echo 'selected';    ?>> <?php echo  $r["curr_status"]; ?></option>

<?php } ?>
</td>
<td width="8%">
<span style="float:right; margin: 0 10 0 0">Site ID : </span>
</td>
<td width="20%">
<input type="text" name="siteid"  value="<?php echo $siteid ?>" class="form-control" >
</td>
<td>

<input type="submit" name="Submit" style="margin: 0 0 0 10" value="Search" class="btn btn-info"  >
</td>
</tr>
</table>
</form>
</div>
</div>

<div class="row">
<div class="col-md-12">
<table class="table table-bordered" width="100%" style="font-size:13px !important;">
<tr>
<th width="5%">
Sl. No.
</th>
<th width="12%">
Site ID
</th>
<th  width="14%">
Company Name
</th>
<th  width="14%">
Circle Office
</th>
<th>
Current Status
</th>
<th width="15%">
Remarks
</th>
<th width="10%">

</th>
</tr>

<?php $sno=1; while($r= mysqli_fetch_array($result)) { ?>
<tr>
<td  class="<?php
switch($r["sts"]){  
   case 1 :
      echo "";
      break;
   case 2 :
       echo "lightblue";
       break;
   case 3 :
       echo "darkblue";
       break;
   case 4 :
       echo "red";
       break;
   case 5 :
       echo "orange";
       break;
   case 6 :
       echo "red";
       break;
   case 7 :
       echo "red";
       break;
   case 8 :
       echo "green";
       break;
   case 9 :
       echo "yellow";
       break; 
}
?>">
<?php echo $sno; $sno ++; ?>
</td>
<td>
<?php  
echo $r["site_id"];
   ?>

<span class="pull-right"> 
   <?php  
if($r["dd_status"]=='1')
   {?>
   <img src="img/circle-blue.png" width="12px" title="Valid DD" alt="Valid">
   <?php } else {?>
      <img src="img/circle-red.png" width="12px"  title="In-Valid DD" alt="In-Valid">
      <?php } ?>
   </span>
</td>
<td>
<?php  
echo $r["comp"]; 
   ?>
  
</td>
<td>
<?php  
echo $r["co"];
   ?>
</td>
<td>
<?php  
echo $r["curr_status"];
   ?>
</td>
<td>
<?php  
echo $r["remarks"];
   ?>
</td>
<td>
<?php  $pid=$r["id"] ?>
<a class='btn btn-xs btn-success' href='details.php?id=<?php  echo $pid ?>&page=<?php echo $pageid ?>'>View</a>
<a class='btn btn-xs btn-warning' style="margin-left:10px" href='edit.php?id=<?php   echo  $pid ?>&page=<?php echo $pageid ?>'>Edit</a>
</td>
</tr>
<?php } ?>
</table>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div  class="pagination">
<?php 
// if not on page 1, don't show back links
if ($currentpage > 1) {
    // show << link to go back to page 1
    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
    // get previous page num
    $prevpage = $currentpage - 1;
    // show < link to go back to 1 page
    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
 } // end if 
 
 // loop to show links to range of pages around current page
 for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
    // if it's a valid page number...
    if (($x > 0) && ($x <= $totalpages)) {
       // if we're on current page...
       if ($x == $currentpage) {
          // 'highlight' it but don't make a link
          echo "<a class='active'><b>$x</b></a> ";
       // if not current page...
       } else {
          // make it a link
          echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
       } // end else
    } // end if 
 } // end for
 
 // if not on last page, show forward and last page links        
 if ($currentpage != $totalpages) {
    // get next page
    $nextpage = $currentpage + 1;
     // echo forward link for next page 
    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
    // echo forward link for lastpage
    echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a>";
 } // end if
 /****** end build pagination links ******/  
 ?>

</div>
</div>
</div>
 <?php  
 include("footer.php");
?>