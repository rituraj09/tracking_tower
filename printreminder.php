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
$id=$_REQUEST['id'];
$sql="SELECT a.id, a.file_no, a.file_date, a.old_file, a.old_date, c.name as coname from reminder a inner join track t on a.old_file = t.fileno inner join master_application b on b.id=t.app_id inner join circle_office c on b.co_id = c.id WHERE a.id='$id' group by a.id, a.file_no, a.file_date, a.old_file, a.old_date, c.name order by file_date";     
 $result = mysqli_query($mysqli, $sql) ;
 
?>

<?php while($r= mysqli_fetch_array($result)) {  
$s='';
$sno=1;
 $o_file=$r['old_file'];
 $sql1="SELECT file_no, file_date from reminder  where old_file = '$o_file'  and id < $id";   
 $x = mysqli_query($mysqli, $sql1) ; 
 $xx = mysqli_query($mysqli, $sql1) ;
  while($x1= mysqli_fetch_array($xx)) { $s='s'; $sno++;  }  
  ?>
<center>
<input type="button" style="padding:6px 4px; cursor:pointer;" onclick="printDiv('printableArea')" value="Print" /> 
<div id="printableArea" style="margin-top:20px;">
<page size="A4" >
<div class="content"> 
<span style="float:right; text-decoration:underline;">Reminder <?php echo $sno ?></span><br>
<h3>GOVT. OF ASSAM</h3>

<h3>OFFICE OF THE DEPUTY COMMISSIONER::: ::: ::: GOLAGHAT</h3>
<h3>(MAGISTRACY BRANCH)</h3>
<hr>
<div style="text-align:left">
No.: <?php echo $r['file_no'];?>			                           	          
<span style="float:right">Dated:  <?php echo date('d-m-Y', strtotime($r['file_date']))?>	</span>	
<br><br>
To, <br>
 <div style=" text-indent: 50px;">The Circle Officer, </div> 
 <div style=" text-indent: 50px;"> <?php echo $r['coname'];?>	</div>
    <br> 
Sub: 	<span style="padding-left:20px;">Permission/Renewal of installation of overground telegraph infrastructure.</span><br>
Ref: 	<span style="padding-left:20px;">This office Letter<?php  echo $s; ?> </span>
                <ol style="padding-left:90px;">
                   <li> <?php echo $r['old_file'];?> Dated Golaghat, <?php echo  date('d-m-Y', strtotime($r['old_date'])); ?> </li>
                   <?php while($x1= mysqli_fetch_array($x)) {  ?>
                  
                    <li>  <?php echo $x1['file_no'];  ?>  Dated Golaghat, <?php echo  date('d-m-Y', strtotime($x1['file_date']));?></li>
                   <?php } ?>
                   </ol>
<br><br>
Sir/Madam<br>
<p style=" text-indent: 50px;">With reference to office earlier letter<?php echo $s ?>  cited above, you are therefore requested to submit the report within five official working days from the receipt of this letter positively.</p>

 <p style=" text-indent: 50px;">This is for your kind information and necessary action.</p> 
 
<p> <span style="float:right; padding-right:40px;"> Yours Faithfully, </span>  </p>
<br><br><br>
								<br>
<p><span style="float:right"> Addl. Deputy Commissioner,</span>  </p><br>
 <span style="float:right; padding-right:60px;">  Golaghat</span> 
 <br>
Memo No.: <?php echo $r['file_no'];?>      -A            			   

 <span style="float:right; padding-right:30px;">  Dated:   <?php echo date('d-m-Y', strtotime($r['file_date']))?>	</span>
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
<?php } ?>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>