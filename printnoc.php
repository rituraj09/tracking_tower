<style>
body {
  background: rgb(204,204,204); 
  
}
page[size="Legal"] {
  size: 8.5in 11in;
  background: white;
  width: 8.5in ;
  height: 14in;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;  
}
@media print {
  body,  {
    
    margin: 0;
    box-shadow: 0;
  }
}
h1, h2, h3, h4, h5, h6{
  line-height: 5px; 
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
$siteid=""; 
$year="";
$fileno="";
$file_date="";
$comp_name="";
$comp_details="";
$owner_name="";
$owner_location="";
$dagno="";
$pattano="";
$plottype="";
$towertype="";
$latt="";
$long="";
$lenght="";
$width="";
$val="";
$validity="";


$sql="SELECT a.*, b.fileno, b.file_date,c.name , c.details FROM `master_application`a inner join track b on a.id= b.app_id
inner join company_master c on a.company_id=c.id where b.app_status=8 and a.id='$id'"; 
 $result = mysqli_query($mysqli, $sql) ;
 while($r= mysqli_fetch_array($result)) {
    $fileno= $r["fileno"];
    $file_date= date('d-m-Y', strtotime($r["file_date"]));
    $comp_name= $r["name"];
    $comp_details=$r["details"];
    $siteid=$r["site_id"]; 
    $owner_name=$r["owner_name"]; 
    $owner_location=$r["owner_address"]; 
    $dagno=$r["dagno"]; 
    $pattano=$r["pattano"]; 
    $plottype=$r["plot_type"]; 
    $latt=$r["lattitude"]; 
    $long=$r["longitude"]; 
    $towertype=$r["tower_type"]; 
    $lenght=$r["length"]; 
    $width=$r["width"]; 
    $year= date('Y', strtotime($r["file_date"]));;
    
    $p_date = explode('-', $r['validity']);
    $day   = $p_date[2];
    $month = $p_date[1];
    $year1  = $p_date[0];
    $validity = $day.'-'.$month.'-'.$year1 ;  
    $l = (int)$lenght;
    $w = (int)$width;
    $val=$l*$w;
 }
?>

<center>
<input type="button" style="padding:6px 4px; cursor:pointer;" onclick="printDiv('printableArea')" value="Print" /> 
<div id="printableArea" style="margin-top:20px;">
<page size="Legal" >
<div class="content">
 
<h4>FORM-4</h4>
<h4>GOVT. OF ASSAM</h4>
<h4>OFFICE OF THE DEPUTY COMMISSIONER, GOLAGHAT</h4>
<h4>(MAGISTRACY BRANCH)</h4>
<h4>CASE No. <?php echo $siteid;?>	& Year  <?php echo $year?></h4>



<hr>
<div style="text-align:left">
No.: <?php echo $fileno;?>			                           	          
<span style="float:right">Dated: <?php echo $file_date;?>	</span>	
<br><br>
To, <br>
 <div style=" text-indent: 50px;">The <?php echo $comp_name;?>, </div> 
 <div>
 <div style=" padding-left: 50px; width:250px;"> <?php echo $comp_details;?>	</div>
 </div>
    <br> 
<table>
<tr>
<td  valign="top" width="45px;">Sub: 	
</td>
<td >
Grant of permission for erection, installation or establishment of aboveground telegraph infrastructure     under Rule 9 of Telegraph Right of Way Rule 2018 and order made there-under
</td>
<tr>
<td  valign="top" width="45px; " style="padding-top:10px;">Ref: 	
</td>
<td style="padding-top:10px;">
<?php echo $siteid; ?>
</td>
<table> 
 
  <br>
 <table>
 <tr>
 <td width="30px" valign="top">
 1)
</td>
 <td valign="top">
<p>The above applicant/licensee has applied to accord permission for erection, installation or establishment of aboveground telegraph infrastructure under Rule 9 of Telegraph Right of Way Rule 2016 read with Para 5 of these guidelines Dated 18th Feb 2018 issued by Deputy Commissioner, Government of Assam.
</p>
<p>
The permission has been applied on the land or building mentioned below.</p>
 <table width="100%"  border="1" cellspacing="0" cellpadding="0">
<tr>
<th width="40%">Details of location (Name of village, city, ward no. Street name, road name etc.)</th>
<th width="45%">Details of Plot No./ Building/land/structure</th>
<th>Area in Sq. Mt</th>
</tr>
<tr>
<td valign="top" height="100px" style="padding:7px;">

<?php if($owner_name!='NA'){ echo $owner_name.'; ';} echo $owner_location ?>
</td>
<td valign="top" style="padding:7px;">
Plot No.: Dag No. <?php echo $dagno ?>; Patta No.: <?php echo $pattano ?><br>
Plot Type: <?php echo $plottype ?><br>
Tower Type: <?php echo $towertype ?>

</td>
<td valign="top" style="padding:7px;">
<?php echo $val ?>
</td>
</tr>
</table>  
</td>
</tr>
<tr>
 <td width="30px" valign="top"  style="padding-top:20px;">
 2)
</td>
</td>
 <td valign="top"style="padding-top:20px;" >
<p>That, I have examined the application and documents/statements submitted by the applicant/licensee. He/She has deposited the necessary fee and charges I have examined the reports received from Local Body and field agencies. I am of the opinion that the desired permission is consonance with provisions of above mentioned Rules and guidelines.
</p>
</td>
</tr>
<tr>
 <td width="30px" valign="top" style="padding-top:20px;">
 3)
</td>
</td>
 <td valign="top" style="padding-top:20px;">
 <p>Therefore, I hereby grant the permission for erection, installation or establishment of following telegraph infrastructure on the land or building herein above mentioned.
 </p>
 <table width="100%" border="1" cellspacing="0" cellpadding="0">
                <tr>
        <th width="10%">Sl. No.</th>
        <th width="46%">Items</th>
        <th  width="46%">Details ( to be mentioned by Nodal Officer )</th>
    </tr>
                <tr>
                <td valign="top" style="padding:7px;">1. </td>
                <td valign="top" style="padding:7px;">The nature and location including exact latitude and longitude  of  the  post/tower  or  other  aboveground contrivances which are to be established</td>
                <td valign="top" style="padding:7px;">
                Latt: <?php echo $latt; ?><br>
                Long: <?php echo $long; ?>

                </td>
                </tr>
                <tr>
                <td valign="top" style="padding:7px;">2.</td>
                <td valign="top" style="padding:7px;">The extent of land required for establishment of the
aboveground telegraph infrastructure
</td>
                <td valign="top" style="padding:7px;">
                <?php echo $lenght; ?>m X 
               <?php echo $width; ?>m = <?php echo $val; ?> sq.m
                </td>
                </tr>
                <tr>
                <td valign="top" style="padding:7px;">3.</td>
                <td valign="top" style="padding:7px;">The details of building or structure where the aboveground telegraph infrastructure is to be established.</td>
                <td valign="top" style="padding:7px;">
                <?php echo $plottype ?><br>
                <?php if($towertype == 'GBT') { echo 'Ground based Tower with 9 Antennae'; } 
                else { echo 'Roof Top Tower with 9 Antennae' ;} ?>
                </td>
                </tr>
              </table>
 </td>
</tr>

</table>
</div>
</div>

</page> 
<page size="Legal" >
<div class="content">
<br><br>
<table> 
<tr>
<td width="30px" valign="top">
</td>
<td>
         
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tr>
        <th width="10%">Sl. No.</th>
        <th width="46%">Items</th>
        <th  width="46%">Details ( to be mentioned by Nodal Officer )</th>
    </tr>
   <tr>
                <td valign="top" style="padding:7px;">4.</td>
                <td valign="top" style="padding:7px;">The mode of and time duration for, execution of work.</td>
                <td valign="top" style="padding:7px;">  30 days in manual methodology</td>
                </tr>
                <tr>
                <td valign="top" style="padding:7px;">5.</td>
                <td valign="top" style="padding:7px;">In case of micro cells/Wi-Fi points on street lights/poles/bus shelters/ govt. building.. Give details.</td>
                <td valign="top" style="padding:7px;">NA</td>
                </tr>
                </table>
</td>
</tr> 
<tr>
 <td width="30px" valign="top">
 4)
</td>
</td>
 <td valign="top">
<p>	The permission is granted on following terms and conditions :-</p>
<ol type='i'>
<li>
<p>The Radiation norms fixed by DoT have to be strictly followed by the licensee. Any citizen can approach the TERM Cell with regard to grievance on any issue relating to radiation.
</p></li><li>
<p>Sign boards and Warning Signs ("Danger", "Warning", "Caution", etc.) as per guidelines of DoT shall be provided at towers and antenna sites which are clearly visible and identifiable.
  </p></li><li>
  <p>The licensee shall be permitted to erect/install telegraph infrastructure on open land including private/Govt lands, lands and buildings of Government or Government owned/controlled Statutory or Non-Statutory institutions/bodies or at other public/private locations including roads, parks, playgrounds, schools, colleges, land earmarked for public utilities.
</p></li><li>
<p>In the walled city area or in the area of Heritage importance the Pole/Mast shall be designed keeping in view the Heritage character of the area.
  </p></li><li>	Installation of infrastructure shall not be permitted on right of way.</p>
</li><li>
<p>The licensee shall be granted permission to install micro cells/Wi-Fi access points and other required services on street light poles/bus shelters/government buildings.
  </p></li><li>
	<p>The licensee shall fix the equipments which cause minimum noise and environmental pollution for power back-up in the earmarked boundary adjacent to mobile tower/post.
  </p></li><li>
	<p>The structural stability of the towers/posts and building in which it is erected, shall be ensured by the licensee and the towers/posts and their foundations shall be designed accordingly. He shall be solely responsible for any mishap, if it takes during or after erection of towers
  </p></li>
    </ol>

</td>
</tr>
<tr>
 <td width="30px" valign="top">
 5)
</td>
</td>
 <td valign="top">
	This permission shall be valid from this date up-to the period of license granted to
   the licensee by DoT .(i.e. dated  
   
    <?php 
    
    echo $validity;?> ) .
  </p></td>
</tr>
</table>
<p style=" text-indent: 30px;">The permission is granted on this date  <?php echo $file_date;?>  under signature and seal of the undersigned.

</p>

<br>
<br>
<br>
<br>

<span style="float:right;">
Deputy Commissioner</span><br>
<span style="float:right; padding-right:50px;">	Golaghat</span>


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