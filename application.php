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
    $ddstatus = "";
    $ddremarks = "";
    $receivedon =   "" ;
    $remarks =   ""; 
    if(isset($_POST['Submit']))
    { 
        $company =  $_POST['company'];
        $siteid =   strtoupper($_POST['siteid']);
        $name =   strtoupper($_POST['name']) ;
        $location =  $_POST['location'];
        $circleoffice =  $_POST['ddco'];
        $dagno =  $_POST['dag'];
        $patta =  $_POST['patta'];

        $year =  $_POST['year']; 
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
        $ddstatus =  $_POST['ddstatus'];
        $ddstatus =  $_POST['dd_remarks'];
        $receivedon =  date('Y-m-d', strtotime($_POST['recon']));  
        $remarks =  $_POST['remarks']; 
        $ok="0";
        $isok = "0";
        $s = "SELECT count(1) as cnt from master_application where site_id = '$siteid' and is_delete=0";
        $sql=mysqli_query($mysqli,$s);
        while($str = mysqli_fetch_array($sql))
        {
            if((int)$str["cnt"]<1)
            { 
                $isok = "1";
            }
            else
                { 
                    $isok = "0";
                    $msg="<span style='color:red'>Data with this Site ID is already exist.</span>";
                }
        }      
        if($isok=="1") {       
            $sql="INSERT INTO master_application(company_id , site_id, owner_name, owner_address, co_id, dagno, pattano,plot_type,tower_type,length,width,validity lattitude, longitude, dd_no, dd_date, dd_status, receivedon, remarks, curr_status) value(
                '$company','$siteid','$name','$location','$circleoffice','$dagno','$patta','$plot_type','$tower_type','$length','$width','$dateupto','$latt','$long','$ddno','$dddate','$ddstatus','$receivedon','$remarks',1
                )";

                $result=mysqli_query($mysqli,$sql);
                if($result=="1")
                {
                    $app_id= $mysqli->insert_id;
                    $sql1 = mysqli_query($mysqli,"INSERT INTO track (app_id , app_status,remarks) value ($app_id, 1,'$remarks')");
                   
                    $ok="1";
                } 
                if( $ok=="1"){
                    $msg="<span style='color:green'>Successfully Save.</span>";
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
                    $ddstatus = "";
                    $ddremarks = "";
                    $receivedon =   "" ;
                    $remarks =   ""; 
                  }
                  else
                  {
                      $msg="<span style='color:red'>Somthings went wrong!</span>";
                  }
           
        }
    }
?>
<div class="container"> 
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<h3>Add Application</h3>
</div>
</div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<p><b><?php echo $msg ?></b></p>
</div>
</div>
<form action="application.php" method="POST"  name="form1" onsubmit="return validation()">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<table class="table table-striped" width="100%" style="font-size:12px !important;">
<tr>
<th colspan="3">
 <span style="color:red; text-decoration:underline;">Besic Information</span>
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
    <option value="<?php echo $r["id"]; ?>"  > <?php echo  $r["name"]; ?></option>
  
<?php } ?>
</td>
 <td></td>
</tr>

<tr>
<th>
    Site Id<span class="textmand">*</span>
</th>
<td>
<input type="text" name="siteid"  value="" required class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th>
Name of the Owner<span class="textmand">*</span>
</th>
<td>
<input type="text" name="name"  value="" required class="form-control" >
</td>
 <td></td>
</tr>
<tr>
<th>
Location details( Address of the site)<span class="textmand" required>*</span>
</th>
<td>
<textarea rows="4" cols="50" name="location" required  class="form-control" >
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
    <option value="<?php echo $r["id"]; ?>"  > <?php echo  $r["name"]; ?></option>
  
<?php } ?>
</td>
 <td></td>
</tr>

<tr>
<th>
Dag No.<span class="textmand" required>*</span>
</th>
<td>
 <input type="text" name="dag" value=""  onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Patta No.<span class="textmand" required>*</span>
</th>
<td>
 <input type="text" name="patta" value="" onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
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
    <option value="Open Plot"  >Open Plot</option> 
    </select>
</td>
 <td></td>
</tr>
<tr>
<th>
Lattitude<span class="textmand" required>*</span>
</th>
<td>
 <input type="text" name="latt" value="" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Longitude<span class="textmand" required>*</span>
</th>
<td>
 <input type="text" name="long" value="" class="form-control" required> 
 
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
    <option value="GBT"  >GBT</option>
    <option value="RTT"  >RTT</option> 
    </select>
</td>
 <td></td>
</tr>

<tr>
<th>
Required area in Length<span class="textmand" required>*</span>
</th>
<td>
<input type="text" name="length"   onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Required area in Width.<span class="textmand" required>*</span>
</th>
<td>
<input type="text" name="width"  onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Validity of Licensee<span class="textmand">*</span>
</th>
<td>
<div class='input-group date' class='datetimepicker1'>
<input type="text" name="dateupto" autocomplete="off" id="dateupto" 
class="form-control datepicker date-format"   placeholder="dd-mm-yyyy"
   required onblur="ValidateDate(this, event.keyCode);" onkeydown="return DateFormat(this, event.keyCode)" maxlength="10" onfocus="this.select();">
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
 <input type="text" name="ddno" value=""  onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Date of Payment<span class="textmand">*</span>
</th>
<td>
<div class='input-group date' class='datetimepicker1'>
<input type="text" name="dddate" autocomplete="off" id="ddate" class="form-control datepicker date-format"   placeholder="dd-mm-yyyy" value="" required
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
    <option value="1" >Valid</option>
    <option value="2" >Invalid</option> 
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
<input type="text" name="recon" autocomplete="off" id="rdate" class="form-control datepicker"   placeholder="dd-mm-yyyy" value="" required
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
</textarea>
 
 
</td>
 <td></td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" name="Submit" value="Save" class="btn btn-info"  >
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