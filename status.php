
<?php 
 
 include("config.php");
 include("header.php"); 
 $msg="" ;
 $statusid = "";
 $co_id = "";
 $co = mysqli_query($mysqli,"SELECT id, name  from  circle_office"); 
 $siteid = mysqli_query($mysqli,"SELECT id, site_id  from  master_application where co_id= $co_id and is_delete=0 and curr_status in ($statusid)"); 
 $status = mysqli_query($mysqli,"SELECT id, curr_status  from  status"); 
 $app_id =   ""; 
 $curr_status =  ""; 
 $fileno =   ""; 
 $date =   ""; 
 $remarks =  ""; 
 if(isset($_POST['Submit']))
 {
     
     $app_id =   $_POST['siteid']; 
     $curr_status =   $_POST['status']; 
     if( $_POST['fileno'] != "")
     {
         $fileno =  $_POST['dd_fileno'].$_POST['fileno']; 
     }
     if( $_POST['date'] != "")
     {
         $date =  $_POST['date'] ; 
     }
     if( $_POST['remarks'] != "")
     {
         $remarks =   $_POST['remarks']; 
     }
     $date =   date('Y-m-d', strtotime($_POST['date'])); 
     $remarks =   $_POST['remarks'];  
     $sql = "INSERT INTO track(app_id , app_status, fileno, file_date, remarks) value(
         $app_id, $curr_status ,'$fileno','$date' ,'$remarks' 
         )"; 
      $result=mysqli_query($mysqli,$sql);
      if($result=="1")
      { 
         if($curr_status!='10')
         {
             $sql1 = mysqli_query($mysqli,"update master_application set curr_status=$curr_status  where id=$app_id");
       
             $msg="<span style='color:green'>Successfully Save.</span>";
         }
         else
         {
             $sql1 = mysqli_query($mysqli,"update master_application set curr_status=$curr_status, is_delete=1  where id=$app_id");
        
             $msg="<span style='color:green'>Successfully deleted.</span>";
         }
      } 
 }
?>
<div class="container"> 
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<h3>Update Status</h3>
</div>
</div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<p><b><?php echo $msg ?></b></p>
</div>
</div>
<form action="status.php" method="POST"  name="myform" onsubmit="return validation()">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<table class="table table-striped" width="100%" style="font-size:12px !important;">
<tr>
<th width="40%">
 Circle Office:<span class="textmand">*</span>
</th>
<td  width="40%">

 <select id="ddco"  name="ddco" required   class="form-control"  onchange="get_siteid();">
 <option value="">--Select--</option>
<?php while($r= mysqli_fetch_array($co)) { ?>
 <option value="<?php echo $r["id"]; ?>"  > <?php echo  $r["name"]; ?></option>

<?php } ?>
</td>
<td></td>
</tr>
<tr>
<th width="40%">
 Status:<span class="textmand">*</span>
</th>
<td  width="40%">
<select name="status" id="status"  required  class="form-control" onmousedown="this.value='';" onchange="hideshow(this.value); get_siteid();">
 <option value="">--Select--</option>
<?php while($r= mysqli_fetch_array($status)) { ?>
 <option value="<?php echo $r["id"]; ?>"  > <?php echo  $r["curr_status"]; ?></option>

<?php } ?>
</td>
<td></td>
</tr> 

<tr id="trfileno" style="display:none;">
 <th>
 Letter No:<span class="textmand">*</span>
 </th>
 <td>
  <select id="dd_fileno" style="padding:8px; font-size:12px !important;"  name="dd_fileno" >
    <option value="">NA</option>
    <option value="GMJ/03/2017/" >GMJ.03/2017/</option>
    <option value="GMJ.01/2019/pt-1/" >GMJ.01/2019/pt-1/</option> 
 
  </select>
     <input type="text" id="txtfileno" name="fileno" value=""  style="padding:6px;  font-size:12px !important;" > 
 </td> <td></td>
</tr>
<tr  id="trdate" style="display:none;">
<th >
Letter Date:<span class="textmand">*</span>
     </th>
 <td>
 <div class='input-group date' class='datetimepicker1'>
<input type="text" id='txtdate' name="date" autocomplete="off" id="ddate" class="form-control datepicker date-format"   placeholder="dd-mm-yyyy" value="" 
onblur="ValidateDate(this, event.keyCode);" onkeydown="return DateFormat(this, event.keyCode)" maxlength="10" onfocus="this.select();">
<span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                 </span>
</div>
 </td> <td></td>
</tr>

<tr  id="trsiteid" style="display:none;">
<th>

Site ID:<span class="textmand">*</span>
</th>
<td>  
<div id="siteid"></div> 

 </td>
 <td >     </td>
</tr>
<tr  id="trremarks" style="display:none;">
<th>
Remarks
</th>
<td>
<textarea rows="4" cols="50" id='txtremarks' name="remarks"   class="form-control" >
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

<script>
 function hideshow(val)
 {
     if(val==1)
     {
         $('#trsiteid').show();
         $('#trremarks').show();
         
         $('#trfileno').hide();
         $('#trdate').hide();
         $('#txtfileno').removeAttr('required');
         $('#txtdate').removeAttr('required');
     }
     else if(val==2)
     {
        $('#trsiteid').show();
         $('#trremarks').show();
         
         $('#trfileno').show();
         $('#trdate').show();
         $('#txtfileno').attr('required', true);
         $('#txtdate').attr('required', true);
     }
     else if(val==3)
     {
        $('#trsiteid').show();
         $('#trremarks').show();
         
         $('#trfileno').show();
         $('#trdate').show();
         $('#txtfileno').attr('required', true);
         $('#txtdate').attr('required', true);
     }
     else if(val==4)
     {
        $('#trsiteid').show();
         $('#trremarks').show();
         
         $('#trfileno').show();
         $('#trdate').show();
         $('#txtfileno').attr('required', true);
         $('#txtdate').attr('required', true);
     }
     else if(val==5)
     {
        $('#trsiteid').show();
         $('#trremarks').show();
         
         $('#trfileno').hide();
         $('#trdate').hide();
         $('#txtfileno').removeAttr('required');
         $('#txtdate').removeAttr('required');
     }
     else if(val==6)
     {
        $('#trsiteid').show();
         $('#trremarks').show();
         
         $('#trfileno').show();
         $('#trdate').show();
         $('#txtfileno').attr('required', true);
         $('#txtdate').attr('required', true);
     }
     else if(val==7)
     {
        $('#trsiteid').show();
         $('#trremarks').show();
         
         $('#trfileno').hide();
         $('#trdate').hide();
         $('#txtfileno').removeAttr('required');
         $('#txtdate').removeAttr('required');
     }
     else if(val==8)
     {
        $('#trsiteid').show();
         $('#trremarks').show();
         
         $('#trfileno').show();
         $('#trdate').show();
         $('#txtfileno').attr('required', true);
         $('#txtdate').attr('required', true);
     }
     else if(val==9)
     {
        $('#trsiteid').show();
         $('#trremarks').show();
         
         $('#trfileno').hide();
         $('#trdate').hide();
         $('#txtfileno').removeAttr('required');
         $('#txtdate').removeAttr('required');

     }
     else if(val==10)
     {
        $('#trsiteid').show();
         $('#trremarks').show();
         
         $('#trfileno').hide();
         $('#trdate').hide();
         $('#txtfileno').removeAttr('required');
         $('#txtdate').removeAttr('required');
     }
     else{
        $('#trsiteid').hide();
         $('#trremarks').hide();
         
         $('#trfileno').hide();
         $('#trdate').hide();
         $('#txtfileno').removeAttr('required');
         $('#txtdate').removeAttr('required');
     }
 }
</script>
<script type="text/javascript">
function get_siteid() { // Call to ajax function
 $('#txtfileno').val('');
 $('#dd_fileno').val('');
 $('#txtdate').val('');
 $('#txtremarks').val('');
 var ddco1 = $('#ddco').val();
 var status = $('#status').val();
 var ddco = ddco1; 
 $.ajax({
     type: "POST",
     url: "getsite.php", // Name of the php files 
     data: {ddco, status},
     success: function(html)
     {
         $("#siteid").html(html);
     }
 });
}
</script>
<?php  
 include("footer.php");
?>