<?php 
 
 include("config.php");
 include("header.php"); 

 $siteid = "";
 $status = "";
 $file = "";
 if(isset($_POST['Submit']))
 { 
 $siteid =   strtoupper($_POST['siteid']);
 $status =   $_POST['status'];
 $file =   $_POST['file'];
    $s = "SELECT count(1) as cnt from sites where site_id = '$siteid'";
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
            echo "Duplicate entry";
        }
    }
    
    if($isok=="1") {  
    $sql="INSERT INTO sites(site_id , status, file) value(
        '$siteid','$status' ,'$file' 
        )";
        $result=mysqli_query($mysqli,$sql);
        if($result=="1")
        {
            echo "Saved";
        }
        else
        {
            
            echo $sql;
        }
    }
 }
 ?>
 
<form action="sites.php" method="POST"  name="form1" >
<table style="margin-left:50px;">
<tr>
<th>
Site ID
</th>
<td>
<input type="text" name="siteid" id="siteid"  value="" required class="form-control" >
<td>
</tr>
<tr>
<th>
Status
</th>
<td>
<select id="status" name="status"  required class="form-control"  >
    <option value="">--Select--</option>
    <option value="Send To Co" <?php if($status=='Send To Co') echo 'selected' ?> >New Send To Co</option>
    <option value="In DC Office" <?php if($status=='In DC Office') echo 'selected' ?>>In DC Office</option>
    <option value="Get NOC" <?php if($status=='Get NOC') echo 'selected' ?>>Get NOC</option>
    <option value="Not Return From CO" <?php if($status=='Not Return From CO') echo 'selected' ?>>Not Return From CO</option>
    <option value="Lost" <?php if($status=='Lost') echo 'selected' ?>>Lost</option> 
    <option value="NULL" <?php if($status=='NULL') echo 'selected' ?>>Null</option> 
    </select>
<td>
</tr>
<tr>
<th>
File
</th>
<td>
<select id="file" name="file"  required class="form-control"  >
    <option value="">--Select--</option>
    <option value="1" <?php if($file=='1') echo 'selected' ?> >Old One</option>
    <option value="2" <?php if($file=='2') echo 'selected' ?>>From my PC Status</option>
    <option value="3" <?php if($file=='3') echo 'selected' ?>>Report Send To DITEC</option>
    <option value="4" <?php if($file=='4') echo 'selected' ?>>NOC Given By Khagen</option>
    <option value="5" <?php if($file=='5') echo 'selected' ?>>New List</option> 
    </select>
<td>
</tr>
<tr>
<td>
</td>
<td>

<input type="submit" name="Submit" value="Save" class="btn btn-info"  >
</td>
</tr>
</table>
</form>
<script>
$(function() {
  $('#siteid').focus();
});    
</script>
 <?php  
 include("footer.php");
?>