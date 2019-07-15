<?php

include("config.php");
if ($_POST) {

    $ddco = $_POST['ddco'];
    $st = $_POST['status'];  
    $val ="";
    if ($ddco != '') {  
        if($st=="1")
        {
            $val="2,5,7,9";
        }
        else  if($st=="2")
        {
            $val="1,4,5,7,9";
        }
        else if($st=="3" || $st=="5" || $st=="6")
        {
            $val="2";
        }
        else  if($st=="4")
        {
            $val="2,3";
        }
        else if($st=="7")
        {
            $val="1";
        }
        else if($st=="8")
        {
              //  $val="1";
              $val="3";
        }
        else if($st=="9")
        {
            $val="1,2,3,4,5,6,7,8";
        }
        else if($st=="10")
        {
            $val="1,2,3,4,5,6,7,8,9";
        }
       $sql1 = "SELECT * FROM master_application WHERE co_id=" . $ddco . " and curr_status in ($val)";
      
       $result1 = mysqli_query($mysqli,$sql1); 
      
       echo "<select name='siteid' class='form-control' required>";
       echo "<option value=''>Select</option>"; 
       while ($row = mysqli_fetch_array($result1)) {
          echo "<option value='" . $row['id'] . "'>" . $row['site_id'] . "</option>";}
       echo "</select>";
    }
    else
    {
        echo  '';
    }
}
?>