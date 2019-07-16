<style> 
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
    $msg="" ; 
    $id="";
    $page="";
    if(isset($_REQUEST['id']))
    {  
        $id=$_REQUEST['id']; 

        $a1 = $a2 = $a3 = $p1='';
        $qrystr="";
        if (isset($_REQUEST['ddco'])) 
        {
           if ($_REQUEST['ddco'] != '') 
           { 
              $a1= '&ddco='. $_REQUEST['ddco']; 
           }
        }
        if (isset($_REQUEST['status']))  
        {
           if ($_REQUEST['status']!='') 
           { 
              $a2= '&status='. $_REQUEST['status']; 
           }
        }
        if (isset($_REQUEST['siteid']))
        {
           if ($_REQUEST['siteid']!='') 
           { 
              $a3= '&siteid='.$_REQUEST['siteid']; 
           }
        }   
        if(isset($_REQUEST['currentpage']) )
        {
           if($_REQUEST['currentpage']!='')
           {
              $p1='currentpage='.$_REQUEST['currentpage'];
           }
        }
        if(isset($_REQUEST['currentpage']) || isset($_REQUEST['ddco']) || isset($_REQUEST['status']) || isset($_REQUEST['siteid']))
        { 
           $qrystr = $p1.$a1.$a2.$a3;
        }



        $details = mysqli_query($mysqli,"SELECT a.* , b.name as comp, c.name as co, d.curr_status as sts, a.curr_status as curr_sts, a.remarks as rmks,
        a.plot_type,a.tower_type,a.length,a.width,a.validity,a.dd_remarks  from  master_application a 
        inner join company_master b on a.company_id=b.id inner join track x on a.id = x.app_id and a.curr_status = x.app_status
        inner join circle_office c on a.co_id=c.id  inner join status d on a.curr_status=d.id 
        where  a.id= $id and a.is_delete=0"); 
        while($r= mysqli_fetch_array($details)) {   
            $p_company =  $r["comp"];
            $p_siteid=$r["site_id"];
            $p_name =   $r["owner_name"];
            $p_location = $r["owner_address"];
            $p_circleoffice=$r["co"];
            $p_dagno =   $r["dagno"];
            $p_patta =   $r["pattano"];
            $p_plot=$r["plot_type"];
            $p_tower=$r["tower_type"];
            $p_length=$r["length"];
            $p_width=$r["width"];  

            $p_date = explode('-', $r['validity']);
            $day   = $p_date[2];
            $month = $p_date[1];
            $year1  = $p_date[0];
            $p_validity = $day.'-'.$month.'-'.$year1 ; 
            $p_latt = $r["lattitude"];
            $p_long=$r["longitude"];
            $p_ddno=$r["dd_no"];
            $p_dddate=date('d-m-Y', strtotime($r['dd_date']));
            $p_ddstatus = $r["dd_status"];
            $p_dd_remarks = $r["dd_remarks"];
            $p_receivedon = date('d-m-Y', strtotime($r['receivedon']));  
            $p_remarks =   $r["rmks"];
            $curr_status= $r["sts"];
            $cur_sts= $r["curr_sts"];
            
            $s = mysqli_query($mysqli,"SELECT a.id, a.updated_on, s.curr_status, a.fileno, a.file_date, a.remarks from track a inner join status s on a.app_status=s.id
            where  a.app_id= $id and a.is_delete=0 order by a.id desc"); 
        } 
    }
?>
<div class="container"> 
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <a class="btn btn-danger pull-right" href="view.php?<?php echo $qrystr  ?>">Back</a>
    </div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-11">
        <h3>Details</h3>
    </div>
</div>
<div class="row">
<div class="col-md-1"></div>

<div class="col-md-11">
<p><b><?php echo $msg ?></b></p>
</div>
</div>
 <div class="row">
<div class="col-md-1"></div>
<div class="col-md-11">
<table class="table table-striped" width="100%" style="font-size:12px !important;">
<tr>
<th colspan="3">
 <span style="color:red; text-decoration:underline;">Basic Information</span>
</th>
</tr>
<tr>
<th width="20%">
    Company Name:
</th>
<td  width="40%">
<?php echo $p_company; ?>
</td>
 <td></td>
</tr>

<tr>
<th>
    Site Id
</th>
<td>
<?php  echo $p_siteid;?>
</td>
 <td></td>
</tr>
<tr>
<th>
Name of the Owner
</th>
<td>
<?php  echo $p_name;?>
</td>
 <td></td>
</tr>
<tr>
<th>
Location details( Address of the site)
</th>
<td>
<?php  echo $p_location;?>
 
 
</td>
 <td></td>
</tr>
<tr>
<th >
    Circle Office:
</th>
<td >
  
<?php echo $p_circleoffice; ?>
</td>
 <td></td>
</tr>

<tr>
<th>
Dag No.
</th>
<td>
<?php  echo $p_dagno;?>
</td>
 <td></td>
</tr>
<tr>
<th>
Patta No.
</th>
<td>
 <?php  echo $p_patta;?> 
</td>
 <td></td>
</tr>
<tr>
<th>
Plot Type
</th>
<td>
 <?php  echo $p_plot;?> 
</td>
 <td></td>
</tr>
<tr>
<th>
Lattitude
</th>
<td>
<?php  echo $p_latt;?>
 
</td>
 <td></td>
</tr>
<tr>
<th>
Longitude
</th>
<td>
<?php  echo $p_long;?>
</td>
 <td></td>
</tr>
<tr>
<tr>
<th colspan="3">
<span style="color:red; text-decoration:underline;">Tower information</span>
</th>
</tr>
<th>
Tower Type
</th>
<td>
 <?php  echo $p_tower;?> 
</td>
 <td></td>
</tr>
<tr>
<th>
Required area in length
</th>
<td>
 <?php  echo $p_length;?> 
</td>
 <td></td>
</tr>
<tr>
<th>
Required area in width
</th>
<td>
 <?php  echo $p_width;?> 
</td>
 <td></td>
</tr>
<tr>
<th>
Validity of Licensee
</th>
<td>
 <?php  echo $p_validity;?> 
</td>
 <td></td>
</tr>
<tr>
<th colspan="3">
<span style="color:red; text-decoration:underline;">Details of Fee and Charge Deposit</span>
</th>
</tr>
<tr>
<th>
DD No./Cheque No./Payment No.
</th>
<td>
<?php  echo $p_ddno;?> 
</td>
 <td></td>
</tr>
<tr>
<th>
Date of Payment
</th>
<td>
<?php  echo $p_dddate;?>
</td>
 <td>
</td>
</tr>
<tr>
<th>
Payment Status
</th>
<td>
<?php  echo $p_dd_remarks;?>
</td>
 <td>
</td>
</tr>

<tr>
<th>
Payment Remarks
</th>
<td> 
 <?php if($p_ddstatus=='1') echo 'Valid' ?>
<?php if($p_ddstatus=='2') echo 'Invalid' ?>
<span  > 
   <?php  
if($p_ddstatus=='1')
   {?>
   <img src="img/circle-blue.png" width="12px" title="Valid DD" alt="Valid">
   <?php } else {?>
      <img src="img/circle-red.png" width="12px"  title="In-Valid DD" alt="In-Valid">
      <?php } ?>
   </span>

</td>
 <td></td>
</tr>
<tr>
<th>
Received on:
</th>
<td>
<?php  echo $p_receivedon;?>
</td>
 <td></td>
</tr>
<tr>
<th>
Remarks
</th>
<td>
<?php  echo $p_remarks;?>
</td>
 <td></td>
</tr>
<tr>
<th>
Current Status
</th>
<td>

<span  class="btn btn-sm <?php
switch($cur_sts){  
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

<b><?php  echo $curr_status;?></b></span>
</td>
 <td></td>
</tr>
<tr>
<th>
 
</th>
<td colspan="2">
 <table  class="table table-striped" width="100%" style="font-size:12px !important;">
        <tr><td width="10%">Date</td>
        <td  width="20%">Status</td>
        <td>Letter No</td>
        <td   width="10%">Letter Date</td>
        <td  width="30%">Last Remarks</td>
        <td  width="6%"> </td>
        </tr>
    <?php $sno=1; while($d= mysqli_fetch_array($s)) { ?>
    <tr>
        <td><?php echo date('d-m-Y', strtotime($d['updated_on']))?></td>
        <td><?php echo $d["curr_status"];?></td>
        <td><?php echo $d["fileno"];?></td>
        <td><?php echo date('d-m-Y', strtotime($d['file_date']))?></td>
        <td><?php echo $d["remarks"];?></td>
        <td>
        <?php if( $_SESSION['type']=="3")
 {  }
 else{ ?>
        <a class='btn btn-xs btn-warning'  href='edit_track.php?id=<?php   echo  $d["id"] ?>&pid=<?php   echo $id.'&'. $qrystr  ?>'>Edit</a>
        <?php } ?>
</td>
    </tr>
    <?php } ?>
 </table>
</td> 
</tr>
<tr>
<td></td>
<td>
<?php if( $_SESSION['type']=="3")
 {  }
 else{ ?>
<a class='btn btn-warning'  href='edit.php?id=<?php   echo  $id ?><?php echo '&'.$qrystr  ?>'>Edit</a>
<?php } ?>
        <a class="btn btn-danger" href="view.php?<?php echo $qrystr  ?>">Back</a>
</td>
 <td></td>
</tr>
</table>
</div>
</div>
</div> 



<?php  
    include("footer.php");
?>