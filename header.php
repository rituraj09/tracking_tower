<html>
<head>
<title>
Tracking Tower
</title> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <style>
 
 .div-inline{
    
    display:inline-block;
} 
.textmand{
    color:red;
}
.navbar-laravel {
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
}
.navbar {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
} 
.divscroll{
        overflow: auto;
        overflow-y: hidden; 
        -ms-overflow-y: hidden;
    }
    .pagination {
    display: inline-block;
}

.pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

.pagination a.active {
    background-color: #999;
    color: white;
    border: 1px solid #999;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<script>

function validation(){ 
    if (confirm("Are you sure to Save the Record!!")) {
        return true;
    }
    else {
        return false;
    }
}
</script>
</head>
<body onkeydown="return (event.keyCode != 116)">
<nav class="navbar navbar-inverse"  >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tracking Tower</a>
    </div> 
    <?php 
session_start();
if( $_SESSION['id']=="")
{        
 header('Location: index.php');
}

 
if(isset($_SESSION['id']))
{
    $uid = $_SESSION['id'];
    if( $uid!= "")
    {
    ?>
        <ul class="nav navbar-nav"> 
        <li ><a href="application.php">Add Application</a></li> 
        <li ><a href="status.php">Update Status</a></li> 
        <li ><a href="view.php">View Status</a></li>   
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Draft Forwarding <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="codraft.php">To Circle Office</a></li>
          <li><a href="reminder.php">Remider Draft</a></li>
          <li><a href="noc.php">Form 4 (NOC)</a></li>
        </ul>
      </li>
        
      <li ><a href="map.php">Map</a></li>   
        </ul> 
    
        <ul class="nav navbar-nav navbar-right">
        <li class="active">
        <a href="#"> <?php
 if($uid!="")
 { 
 echo "Hi,".$_SESSION['name']  ;
 }  
 ?></a>
        </li>
        <li  style="float:right"><a href="logout.php">Logout</a></li> 
</ul>
    
<?php }
 }
 else
 {?>
    <ul class="nav navbar-nav"> 
        <li ><a href="index.php">Login</a></li>   
        </ul>  
<?php  } 

?>
  </div>
</nav> 
 
  