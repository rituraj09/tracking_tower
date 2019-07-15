<?php 
 
    include("config.php");
    include("header.php"); 
    $msg="" ; 
    $year = "";
    $tower_type="";
    $plot_type =   "";
    $length = "";
    $width="";
    $validity =   ""; 
 
    $id="";
    if(isset($_REQUEST['id']))
    {  
        $id=$_REQUEST['id']; 
        $details = mysqli_query($mysqli,"SELECT * from  master_application where id= $id and curr_status=8 and is_delete=0"); 
        while($r= mysqli_fetch_array($details)) {    
            $p_siteid=$r["site_id"];
            $p_name =   $r["owner_name"];
            $p_location = $r["owner_address"];
            $p_year=$r["year"];
            $p_plot=$r["plot_type"];
            $p_tower=$r["tower_type"];
            $p_length=$r["length"];
            $p_width=$r["width"];  

            $p_date = explode('-', $r['validity']);
            $day   = $p_date[2];
            $month = $p_date[1];
            $year1  = $p_date[0];
            $p_validity = $day.'-'.$month.'-'.$year1 ; 
        }
   
    
   
    if(isset($_POST['Submit']))
    { 
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


        $sql="UPDATE master_application SET year ='$year',
                 plot_type='$plot_type', tower_type='$tower_type', 
                length='$length', width='$width', validity='$dateupto'
                 WHERE id=$id";   
                 
                $result=mysqli_query($mysqli,$sql);
                if($result=="1")
         {  
            $msg="<span style='color:green'>Successfully Updated.</span>";
         } 
               
    }
}
?>
<div class="container"> 
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
        <a class="btn btn-danger pull-right" href="noc.php">Back</a>
    </div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h3>Update NOC details</h3>
    </div>
</div>
<div class="row">
<div class="col-md-1"></div>

<div class="col-md-10">
<p><b><?php echo $msg ?></b></p>
</div>
</div>
<form action="nocupdate.php?id=<?php echo $id ?>"  method="POST"  name="form1" onsubmit="return validation()">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<table class="table table-striped" width="100%" style="font-size:12px !important;"> 
<tr>
<th width="30%">
    Site Id 
</th>
<td width="40%">
 <b><?php  echo $p_siteid;?> </b>
</td>
 <td></td>
</tr>
<tr>
<th>
Name of the Owner and details
</th>
<td>
 <?php  echo $p_name;?>;  <?php  echo $p_location;?>
</td>
 <td></td>
</tr>
  

<tr>
<th>
Year<span class="textmand" required>*</span>
</th>
<td>
 <input type="text" name="year" value="<?php  echo $p_year;?>"  onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
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
Length<span class="textmand" required>*</span>
</th>
<td>
<input type="text" name="length" value="<?php  echo $p_length;?>"  onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Width.<span class="textmand" required>*</span>
</th>
<td>
<input type="text" name="width" value="<?php  echo $p_width;?>"  onkeydown="return numeric(this, event.keyCode)" class="form-control" required> 
 
</td>
 <td></td>
</tr>
<tr>
<th>
Validity<span class="textmand">*</span>
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
<td></td>
<td>
<input type="submit" name="Submit" value="Update" class="btn btn-info"  >
        <a class="btn btn-danger" href="noc.php">Back</a>
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