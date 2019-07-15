<style>
body {
  background: rgb(204,204,204); 
  
}
page[size="A4"] {
  background: white;
  width: 21cm;
  height: 29.7cm;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm; 
}
@media print {
  body, page[size="A4"] {
    margin: 0;
    box-shadow: 0;
  }
}
h1, h2, h3, h4, h5, h6{
  line-height: 8px; 
  text-align: center;
}
p{
    text-align:justify;
}
.content{
    line-height: 23px; 
    padding:40px 60px 40px 60px;
    font-family: "Cambria";
}
</style>
<?php
    include("config.php");
$file_no=$_REQUEST['fileno'];
$sql="SELECT a.site_id , c.name  FROM `master_application`a inner join track b on a.id= b.app_id inner join company_master c on a.company_id=c.id
 where b.app_status=2 and b.fileno='$file_no' order by b.id"; 
 $result = mysqli_query($mysqli, $sql) ;
 $sno = 0;

 $sqlx="SELECT  c.name  FROM `master_application`a inner join track b on a.id= b.app_id inner join company_master c on a.company_id=c.id
 where b.app_status=2 and b.fileno='$file_no' group by c.name order by b.id";  
 $rx = mysqli_query($mysqli, $sqlx) ;
?>

<center>
<input type="button" style="padding:6px 4px; cursor:pointer;" onclick="printDiv('printableArea')" value="Print" /> 
<div id="printableArea" style="margin-top:20px;">
<page size="A4" >
<div class="content">
<h3>GOVT. OF ASSAM</h3>
<h3>OFFICE OF THE DEPUTY COMMISSIONER::: ::: ::: GOLAGHAT</h3>
<h3>(MAGISTRACY BRANCH)</h3>
<hr>
<div style="text-align:left">
No.: <?php echo $_REQUEST['fileno'];?>			                           	          
<span style="float:right">Dated: <?php echo $_REQUEST['date'];?>	</span>	
<br><br>
To, <br>
 <div style=" text-indent: 50px;">The Circle Officer, </div> 
 <div style=" text-indent: 50px;"> <?php echo $_REQUEST['co'];?>	</div>
    <br> 
Sub: 	<span style="padding-left:20px;">Permission/Renewal of installation of overground telegraph infrastructure.</span><br>
Ref: 	<span style="padding-left:20px;"><?php 
$dis = array();

while($r= mysqli_fetch_array($result)) {
  $sno++;
$dis[] = $r['site_id'];
}
$val = implode(', ', $dis);  
    echo $val ;?></span>
 
<br><br>
Sir/Madam<br>
<p style=" text-indent: 50px;">With reference to the subject cited above, I am directed you to examine the
 application<?php if($sno >1){ echo 's'; } ?> received from  
 <?php while($rs= mysqli_fetch_array($rx)) { 
  
  $sc[] = $rs['name'];
  }
  $val1 = implode(' and ', $sc);  
      echo $val1;

  ?>
 
  with 
 respect to the parameters in the enclosed Template as per the Right of Way 
 (ROW) guidelines of the Govt. of Assam.</p>

 <p style=" text-indent: 50px;">You are therefore requested to submit the report within <b style="font-size:18px !important;">five</b> official working days from the receipt of this letter positively.</p>	
 <p style=" text-indent: 50px;">This is for your kind information and necessary action.</p> 
    <p>Enclosed: As stated above.</p> 
<p> <span style="float:right; padding-right:40px;"> Yours Faithfully, </span>  </p>
<br><br><br>
								<br>
<p><span style="float:right"> Addl. Deputy Commissioner,</span>  </p><br>
 <span style="float:right; padding-right:60px;">  Golaghat</span> 
 <br>
Memo No.: <?php echo $_REQUEST['fileno'];?>      -A            			   

 <span style="float:right; padding-right:30px;">  Dated:  <?php echo $_REQUEST['date'];?>	</span>
<br>
Copy to:<br>
<ol>
  <li>The CA/PA to the Deputy Commissioner, Golaghat for kind appraisal of the Deputy Commissioner, Golaghat.</li>
  <li>Office Copy. </li>
</ol> <br> 
<br>
<p><span style="float:right"> Addl. Deputy Commissioner,</span>  </p><br>
 <span style="float:right; padding-right:60px;">  Golaghat</span> 
	</div>							                 
    </div>
</page> 
</div>
</center>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>