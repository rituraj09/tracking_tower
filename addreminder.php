<?php 
 
    include("config.php");
    include("header.php"); 
    $msg="" ;
    $p_date = "";
    $p_letter="";
    $count = "";
    $currdate=date('d-m-Y') ;
    if(isset($_REQUEST['letter']))
    {  
        $letterno=$_REQUEST['letter'];
        $sql="SELECT a.fileno, a.file_date, c.name as co FROM track a inner join
        master_application b on a.app_id=b.id and a.app_status=b.curr_status 
        inner join circle_office c on b.co_id=c.id where app_status=2 and a.is_delete=0 and 
        b.is_delete=0 and a.fileno ='$letterno'  group by a.fileno, a.file_date";
        
        $result = mysqli_query($mysqli, $sql) ;
        while($r= mysqli_fetch_array($result)) {    
            $p_letter =  $r["fileno"]; 
            $p_date = date('d-m-Y', strtotime($r['file_date']));   

            $sql1="SELECT count(*)  as cnt from reminder WHERE old_file='$p_letter'";
            $r1 = mysqli_query($mysqli, $sql1); 
            while($rs= mysqli_fetch_array($r1)) 
            {  
                 
                $count =$rs["cnt"]+1;
                

            }
            
        }
    }
    if(isset($_POST['Submit']))
    {
        $letterno=$_REQUEST['letter'];
        $sql="SELECT a.fileno, a.file_date, c.name as co FROM track a inner join
        master_application b on a.app_id=b.id and a.app_status=b.curr_status 
        inner join circle_office c on b.co_id=c.id where app_status=2 and a.is_delete=0 and 
        b.is_delete=0 and a.fileno ='$letterno'  group by a.fileno, a.file_date";
        
        $result = mysqli_query($mysqli, $sql) ;
        while($r= mysqli_fetch_array($result)) {    
            $p_letter =  $r["fileno"]; 
            $p_date = date('d-m-Y', strtotime($r['file_date']));   
        }
        $olddate =  date('Y-m-d', strtotime($p_date));  
        $remletter =   $_POST['dd_fileno'].$_POST['fileno']; 
        $remdate =  date('Y-m-d', strtotime($_POST['date']));
        $sql="INSERT INTO reminder(file_no , file_date, old_file, old_date, rem_no) value(
            '$remletter','$remdate','$p_letter','$olddate','$count'
            )"; 
        $result=mysqli_query($mysqli,$sql);
        if($result=="1")
        {
            $msg="<span style='color:green'>Successfully Save.</span>";
        }
    }
?>



<div class="container"> 
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <a class="btn btn-danger pull-right" href="reminder.php">Back</a>
    </div>
</div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<h3>Add Reminder</h3>
</div>
</div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<p><b><?php echo $msg ?></b></p>
</div>
</div>
<form action="addreminder.php?letter=<?php echo $letterno ?>" method="POST"  name="form1" onsubmit="return validation()">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-7">
<table class="table table-striped" width="100%" style="font-size:12px !important;">
<tr>
<th width="40%">
    Reminder to letter No:
</th>
<td  width="50%">
<?php echo $p_letter ?>    
</td>
</tr>
<tr>
<th >
    Reminder to letter Date:
</th>
<td  >
<?php echo $p_date ?>
</td>
</tr>
<tr>
<th>
    Reminder Letter:
</th>
<td>
<?php echo $count; ?>
</td>
</tr>
<tr>
<th>
    Reminder Letter No:<span class="textmand">*</span>
</th>
<td>
<select id="dd_fileno" style="padding:8px; font-size:12px !important;" required  name="dd_fileno" >
    <option value="">--Select--</option>
    <option value="GMJ/03/2017/" >GMJ.03/2017/</option>
    <option value="GMJ.01/2019/pt-1/" >GMJ.01/2019/pt-1/</option> 
    <option value="GMJ.01/2019/pt-2/" >GMJ.01/2019/pt-2/</option> 
  </select>
     <input type="text" id="txtfileno" name="fileno" value="" required style="padding:6px;  font-size:12px !important;" > 

</td>
</tr>
<tr>
<th>
    Reminder Date:<span class="textmand">*</span>  
</th>
<td>
<div class='input-group date' class='datetimepicker1'>
<input type="text" id='txtdate' name="date" autocomplete="off" id="ddate" class="form-control datepicker date-format" required  placeholder="dd-mm-yyyy" 
value="<?php echo $currdate ?>" 
onblur="ValidateDate(this, event.keyCode);" onkeydown="return DateFormat(this, event.keyCode)" maxlength="10" onfocus="this.select();">
<span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                 </span>
</td>
</tr>
<tr>
<td></td>
<td>
<input type="submit" name="Submit" value="Submit" class="btn btn-info"  >
 <a class="btn btn-danger" href="reminder.php">Back</a>
</td>
</tr>
</table>
</form>