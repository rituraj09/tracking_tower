<?php  
function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}
// Opens a connection to a MySQL server
$connection=mysqli_connect ('localhost', 'root', '','tracking_tower');
if (!$connection) {
  die('Not connected : ' . mysqli_error());
}
$query = "SELECT a.*, b.curr_status as status FROM master_application a inner join status b on a.curr_status=b.id WHERE is_delete=0";
$result = mysqli_query($connection, $query);  
if (!$result) {  
  die('Invalid query: ' . mysql_error());
} 
 
header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . $row['id'] . '" ';
  echo 'site_id="' . parseToXML($row['site_id']) . '" ';
  echo 'curr_status="' . ' *' .parseToXML($row['status']) . '" ';
  echo 'address="' . parseToXML($row['owner_address']) . '" ';
  echo 'lat="' . $row['lattitude'] . '" ';
  echo 'lng="' . $row['longitude'] . '" ';
  $comp='';
  if($row['company_id']=='1')
  {
    $comp="R";
  }
  else
  {
    $comp="A";
  }
  echo 'compid="' . $comp. '" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';  

?> 