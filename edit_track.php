<?php 
 
    include("config.php");
    include("header.php"); 
    $msg="" ;  
    $siteid="";     
    $fileno="";
    $p_file_date = ""; 
    $remarks =   ""; 
    $status = ""; 
    $id=""; 
    $pid=""; 
    if(isset($_REQUEST['id']))
    {  
        $pid=$_REQUEST['pid'];
        $page=$_REQUEST['page'];
        $id=$_REQUEST['id']; 
        $details = mysqli_query($mysqli,"SELECT a.*, b.site_id, s.curr_status from  track a inner join master_application b on a.app_id=b.id  inner join status s on a.app_status=s.id where a.id= $id and a.is_delete=0"); 
        while($r= mysqli_fetch_array($details)) {   
            $p_siteid=$r["site_id"];
            $p_fileno =   $r["fileno"]; 
            $p_file_date = date('d-m-Y', strtotime($r['file_date']));  
            $p_remarks =   $r["remarks"];
            $p_status =   $r["curr_status"];
        }
   
    
   
    if(isset($_POST['Submit']))
    {    
        $fileno =  $_POST['fileno'];
        $file_date =   date('Y-m-d', strtotime($_POST['file_date']));  
        $remarks =  $_POST['remarks'];
        
        $ok="0"; 

        $sql="update track set fileno='$fileno' , file_date='$file_date', remarks='$remarks'     
        where id=$id";
        $result=mysqli_query($mysqli,$sql);
        if($result=="1")
        { 
            $ok="1";
        } 
        if( $ok=="1")
        {
            $msg="<span style='color:green'>Successfully Updated.</span>"; 
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
        <a class="btn btn-danger pull-right" href="details.php?id=<?php echo $pid ?>&page=<?php echo $page ?>">Back</a>
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
<form action="edit_track.php?id=<?php echo $id ?>&pid=<?php echo $pid ?>&page=<?php echo $page ?>"  method="POST"  name="form1" onsubmit="return validation()">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<table class="table table-striped" width="100%" style="font-size:12px !important;">
<tr>
<th width="40%">
    Site ID: 
</th>
<td  width="40%">
<?php  echo $p_siteid;?>
</td>
 <td></td>
</tr>
 <tr>
<th>
Letter No.<span class="textmand">*</span>
</th>
<td>
<input type="text" name="fileno"  value="<?php  echo $p_fileno;?>" required class="form-control" >
</td>
 <td></td>
</tr> 
<tr>
<th>
Letter Date<span class="textmand">*</span>
</th>
<td>
<div class='input-group date' class='datetimepicker1'>
<input type="text" name="file_date" autocomplete="off" id="ddate" class="form-control datepicker date-format"   placeholder="dd-mm-yyyy" value="<?php  echo $p_file_date;?>" required
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
<th>
Status.<span class="textmand">*</span>
</th>
<td>
<?php  echo $p_status;?> 
</td>
 <td></td>
</tr> 
<tr>
<td></td>
<td>
<input type="submit" name="Submit" value="Update" class="btn btn-info"  >
        <a class="btn btn-danger" href="details.php?id=<?php echo $pid ?>&page=<?php echo $page ?>">Back</a>
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