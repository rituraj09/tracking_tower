<?php 
 
    include("config.php");
    include("header.php"); 
    $msg="" ;
    $comp = mysqli_query($mysqli,"SELECT id, name  from  company_master"); 
    $co = mysqli_query($mysqli,"SELECT id, name  from  circle_office"); 
    $company = "";
    $siteid="";
    $name =   "";
    $location = "";
    $circleoffice="";
    $dagno =   ""; 
    $patta =   "";
    $tower_type="";
    $plot_type =   "";
    $length = "";
    $width="";
    $validity =   ""; 
    $latt =  "";
    $long="";
    $ddno="";
    $dddate="";
    $dd_remarks =   ""; 
    $ddstatus = "";
    $receivedon =   "" ;
    $remarks =   ""; 
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


        $details = mysqli_query($mysqli,"SELECT * from  master_application where id= $id and is_delete=0"); 
        while($r= mysqli_fetch_array($details)) {   
            $p_company =  $r["company_id"];
            $p_siteid=$r["site_id"];
            $p_name =   $r["owner_name"];
            $p_location = $r["owner_address"];
            $p_circleoffice=$r["co_id"];
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
            
            $p_dd_remarks =$r["dd_remarks"]; 
            $p_receivedon = date('d-m-Y', strtotime($r['receivedon']));  
            $p_remarks =   $r["remarks"];
        }
   
    
   
    if(isset($_POST['Submit']))
    { 
        $company =  $_POST['company'];
        $siteid =   strtoupper($_POST['siteid']);
        $name =   strtoupper($_POST['name']) ;
        $location =  $_POST['location'];
        $circleoffice =  $_POST['ddco'];
        $dagno =  $_POST['dag'];
        $patta =  $_POST['patta'];
        $plot_type =  $_POST['plot_type'];
        $tower_type =  $_POST['tower_type'];
        $length =  $_POST['length'];
        $width =  $_POST['width'];       
        $date = explode('-', $_POST['dateupto']);
        $day   = $date[0];
        $month = $date[1];
        $year1  = $date[2];
        $dateupto = $year1.'-'.$month.'-'.$day ;

        $latt =  $_POST['latt'];
        $long =  $_POST['long'];
        $ddno =  $_POST['ddno'];
        $dddate = date('Y-m-d', strtotime($_POST['dddate'])); 
        $dd_remarks =  $_POST['dd_remarks'];
        $ddstatus =  $_POST['ddstatus'];
        $receivedon =  date('Y-m-d', strtotime($_POST['recon']));  
        $remarks =  $_POST['remarks']; 
        $ok="0";
        $isok = "0";

        $s = "SELECT count(1) as cnt from master_application where site_id = '$siteid' and is_delete=0 and id!=$id";
        $sql=mysqli_query($mysqli,$s);
        while($str = mysqli_fetch_array($sql))
        {
            if((int)$str["cnt"]<1)
            { 
                $isok = "1"; 
                $sql1 = mysqli_query($mysqli,"UPDATE track SET remarks ='$remarks' WHERE app_id=$id and app_status=1");
                   
            }
            else
                { 
                    $isok = "0";
                    $msg="<span style='color:red'>Data with this Site ID is already exist.</span>";
                }
        }      
        if($isok=="1") {       
            $sql="update master_application set company_id='$company' , site_id='$siteid', owner_name='$name', 
            owner_address='$location', co_id='$circleoffice', dagno='$dagno', pattano='$patta', 
             plot_type='$plot_type', tower_type='$tower_type', 
                length='$length', width='$width', validity='$dateupto',
            lattitude='$latt', longitude='$long', dd_no='$ddno', dd_date='$dddate', dd_status='$ddstatus', dd_remarks = '$dd_remarks',
             receivedon='$receivedon', remarks='$remarks'
            where id=$id";

                $result=mysqli_query($mysqli,$sql);
                if($result=="1")
                { 
                    $ok="1";
                } 
                if( $ok=="1"){
                    $msg="<span style='color:green'>Successfully Updated.</span>"; 
                  }
                  else
                  {
                      $msg="<span style='color:red'>Somthings went wrong!</span>";
                  }
           
        }
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
    <div class="col-md-10">
        <h3>Edit Application</h3>
    </div>
</div>
<div class="row">
<div class="col-md-1"></div>

<div class="col-md-10">
<p><b><?php echo $msg ?></b></p>
</div>
</div>
<form action="edit.php?id=<?php echo $id ?>&page=<?php echo $page ?>"  method="POST"  name="form1" onsubmit="return validation()">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<table class="table table-striped" width="100%" style="font-size:12px !important;">
<tr>
<th colspan="3">
 <span style="color:red; text-decoration:underline;">Basic Information</span>
</th>
</tr>
<tr>
<th width="40%">
    Company Name:<span class="textmand">*</span>
</th>
<td  width="40%">
<select name="company" required   class="form-control" >
    <option value="">--Select--</option>
<?php while($r= mysqli_fetch_array($comp)) { ?>
    <option value="<?php echo $r["id"]; ?>" <?php if( $r["id"]==$p_company)  echo 'selected';?>   > <?php echo  $r["name"]; ?></option>
  
<?php } ?>
</td>
 <td></td>
</tr>

<tr>
<th>
    Site Id<span class="textmand">*</span>
</th>
<td>
<input type="text" name="siteid"  value="<?php  echo $p_siteid;?>" required class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th>
Name of the Owner<span class="textmand">*</span>
</th>
<td>
<input type="text" name="name"  value="<?php  echo $p_name;?>" required class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th>
Location details( Address of the site)<span class="textmand" required>*</span>
</th>
<td>
<textarea rows="4" cols="50" name="location"  required  class="form-control" >
<?php  echo $p_location;?>
</textarea>
 
 
</td>
 <td></td>
</tr>
<tr>
<th width="40%">
    Circle Office:<span class="textmand">*</span>
</th>
<td  width="40%">
  
    <select name="ddco" required   class="form-control" >
    <option value="">--Select--</option>
<?php while($r= mysqli_fetch_array($co)) { ?>
    <option value="<?php echo $r["id"]; ?>" <?php if( $r["id"]==$p_circleoffice)  echo 'selected';?> > <?php echo  $r["name"]; ?></option>
  
<?php } ?>
</td>
 <td></td>
</tr>

<tr>
<th>
Dag No.<span class="textmand" required>*</span>
</th>
<td>
 <input type="text" name="dag" value="<?php  echo $p_dagno;?>"  onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Patta No.<span class="textmand" required>*</span>
</th>
<td>
 <input type="text" name="patta" value="<?php  echo $p_patta;?>" onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Plot Type<span class="textmand" required>*</span>
</th>
<td>
<select name="plot_type" required   class="form-control" >
    <option value="">--Select--</option>
    <option value="Open Plot"  <?php if($p_plot=='Open Plot') echo 'selected' ?>>Open Plot</option> 
    </select>
</td>
 <td></td>
</tr>
<tr>
<th>
Lattitude<span class="textmand" required>*</span>
</th>
<td>
 <input type="text" name="latt" value="<?php  echo $p_latt;?>" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Longitude<span class="textmand" required>*</span>
</th>
<td>
 <input type="text" name="long" value="<?php  echo $p_long;?>" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th colspan="3">
 <span style="color:red; text-decoration:underline;">Tower information</span>
</th>
</tr>
<tr>
<th>
Tower Type<span class="textmand" required>*</span>
</th>
<td>
<select name="tower_type" required   class="form-control" >
    <option value="">--Select--</option>
    <option value="GBT"  <?php if($p_tower=='GBT') echo 'selected' ?>>GBT</option>
    <option value="RTT" <?php if($p_tower=='RTT') echo 'selected' ?>>RTT</option> 
    </select>
</td>
 <td></td>
</tr>
<tr>
<th>
Required area in Length<span class="textmand" required>*</span>
</th>
<td>
<input type="text" name="length" value="<?php  echo $p_length;?>"  onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Required area in Width.<span class="textmand" required>*</span>
</th>
<td>
<input type="text" name="width" value="<?php  echo $p_width;?>"  onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Validity of licensee<span class="textmand">*</span>
</th>
<td>
<div class='input-group date' class='datetimepicker1'>
<input type="text" name="dateupto" autocomplete="off" id="dateupto" 
class="form-control datepicker date-format"   placeholder="dd-mm-yyyy"
 value="<?php  echo $p_validity;?>" required onblur="ValidateDate(this, event.keyCode);" onkeydown="return DateFormat(this, event.keyCode)" maxlength="10" onfocus="this.select();">
<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
</div>
</td>
 <td>
</td>
</tr> 
<tr>
<th colspan="3">
 <span style="color:red; text-decoration:underline;">Details of Fee and Charge Deposit</span>
</th>
</tr>
<tr>
<th>
DD No./Cheque No./Payment No.<span class="textmand" required>*</span>
</th>
<td>
 <input type="text" name="ddno" value="<?php  echo $p_ddno;?>"  class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Date of Payment<span class="textmand">*</span>
</th>
<td>
<div class='input-group date' class='datetimepicker1'>
<input type="text" name="dddate" autocomplete="off" id="ddate" class="form-control datepicker date-format"   placeholder="dd-mm-yyyy" value="<?php  echo $p_dddate;?>" required
onblur="ValidateDate(this, event.keyCode);" onkeydown="return DateFormat(this, event.keyCode)" maxlength="10" onfocus="this.select();">
<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
</div>
</td>
 <td>
</td>
</tr>
<tr>
<th>
Payment Status<span class="textmand">*</span>
</th>
<td> 
<select name="ddstatus" required   class="form-control" >
    <option value="">--Select--</option>
    <option value="1"  <?php if($p_ddstatus=='1') echo 'selected' ?>>Valid</option>
    <option value="2" <?php if($p_ddstatus=='2') echo 'selected' ?>>Invalid</option> 
    </select>
</td>
 <td></td>
</tr>
<tr>
<th>
Payment Remarks
</th>
<td>
<textarea rows="4" cols="50" name="dd_remarks"   class="form-control" >
<?php  echo $p_dd_remarks;?>
</textarea>
 
 
</td>
 <td></td>
</tr>

<tr>
<th>
Received on:<span class="textmand">*</span>
</th>
<td>
<div class='input-group date' class='datetimepicker1'>
<input type="text" name="recon" autocomplete="off" id="rdate" class="form-control datepicker"   placeholder="dd-mm-yyyy" value="<?php  echo $p_receivedon;?>" required
onblur="ValidateDate(this, event.keyCode);" onkeydown="return DateFormat(this, event.keyCode)" maxlength="10" onfocus="this.select();">
<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
</div>
</td>
 <td></td>
</tr>
<tr>
<th>
Remarks
</th>
<td>
<textarea rows="4" cols="50" name="remarks"   class="form-control" >
<?php  echo $p_remarks;?>
</textarea>
 
 
</td>
 <td></td>
</tr>
<tr>
<td></td>
<td>
<?php if( $_SESSION['type']=="3")
 {  }
 else{ ?>
<input type="submit" name="Submit" value="Update" class="btn btn-info"  ><?php }
?>
        <a class="btn btn-danger" href="view.php?<?php echo $qrystr  ?>">Back</a>
</td>
 <td></td>
</tr>
</table>
</div>
</div>
</div>
</form>



<?php  
    include("footer.php");
?>