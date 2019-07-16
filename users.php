<?php 


 include("config.php");
 include("header.php"); 
 
 if( $_SESSION['type']!="1")
 {        
  header('Location: view.php');
 }
$name_err="";
$username_err="";
$password_err ="";
$confirm_password_err ="";
$name = "";
$confirm_password ="";
$user_name =""; 
$ok_username = "";
$msg=""; 
if(isset($_POST['Submit']))
{

    $username =  trim($_POST['username']);
    $name =   $_POST['name']; 
    $password =  $_POST['password']; 
    $confirm_password =  $_POST['confirm_password']; 
    // Validate username 
    if(empty($_POST["name"])){
        $name_err = "Please enter Name.";
    } 
    elseif(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } 
    elseif(empty($_POST["password"])){
        $password_err = "Please enter the password.";
    }    
    elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    }
    elseif(empty($_POST["confirm_password"])){
        $confirm_password_err = "Please confirm the password.";
    }
    elseif($_POST["password"]!=$_POST["confirm_password"]){
        $confirm_password_err = "Password not matching.";
    }
    else
    {  
        $s = "SELECT count(1) as cnt from users where user_name = '$username' and is_delete=0";
        $sql = mysqli_query($mysqli, $s);         
        while($str = mysqli_fetch_array($sql))
        { 
            if((int)$str["cnt"]<1)
            {  
                //$param_password = password_hash($password, PASSWORD_DEFAULT); 
                $sql="Insert into users (name, user_name, password) values ('$name','$username', '$password')";
                $result=mysqli_query($mysqli,$sql);
                if($result=="1")
                {                   
                    $msg="<span style='color:green'>Successfully Save.</span>";
                } else{
                    $msg="<span style='color:red'>Somthings went wrong!</span>";
                }
            }
            else
            {
                $username_err = "User is already available.";
            }
        }            
    }
          
} 
 ?>
 
 <div class="container">
 <div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<p><b><?php echo $msg ?></b></p>
</div>
</div> 
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        
        <form action="users.php" method="POST"  name="form1" onsubmit="return validation()">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_err; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required value="<?php echo $user_name; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control"  required value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password"   required class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
            <input type="submit" name="Submit" value="Submit" class="btn btn-primary"  > 
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
         </div>    
    </div> 
</div>
    <?php  
    include("footer.php");
?>