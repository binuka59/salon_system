<?php

session_start();
error_reporting(0);

@include 'config.php';

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=$_POST['newpassword'];

        $query=mysqli_query($con,"UPDATE tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ");
   if($query)
   {
	echo "<script>alert('Password successfully changed');</script>" ;
    header('location:login.php');
	session_destroy();

	
   }
  
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
alert('Password successfully changed');
return true;

} 

</script>
<head>
    <title>ru salon admin reset password</title>
    <link rel="stylesheet" href="css/index.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <!-- NAVBAR CREATION -->
   <header class="header">
  
   </header>
    <!-- LOGIN FORM CREATION -->
    <div class="background"></div>
    <div class="container">
        <div class="item">
            <h2 class="logo"><span>S</span>alon <i class='fas fa-star-half-alt'></i> <span1>R</span1>u</h2>
            <div class="text-item">
                <h2>Welcome! <br><span>
                 
                </span></h2>
                <p>We   make  hair  beautiful  &  unique</p>
                <div class="social-icon">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-whatsapp'></i></a>
                    <a href="#"><i class='bx bxl-youtube'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                
                </div>

                

            </div>
        </div>
        <div class="login-section">
            <div class="form-box login">
                
                    
			<form role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">
				<p style="font-size:16px; color:red" align="center"> <?php if($msg){
				echo $msg;
  				}  ?> </p>  
                    <h2>Reset password</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="password" name="newpassword" class="lock" placeholder="New Password" required="true">
                        <label >New password</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="confirmpassword" class="lock" placeholder="Confirm Password" required="true">
                        <label> Confirm Password</label>
						
							
						
                    </div>
                    <div class="remember-password">
                       
                        <a href="login.php">Already Have an Account</a>
                    </div>
                    <button class="btn" name="submit" value="reset">Enter</button>
                    
                </form>
            </div>
            
                </form>
            </div>
        </div>
    </div>
 

    
</body>

</html>