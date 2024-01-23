<?php

session_start();


@include 'config.php';

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ru salon admin login</title>
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
                
                    
				<form role="form" method="post" action="">
					
                   
                    <h2>Forgot password</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="text" name="email" class="lock"  required="true">
                        <label > E-mail </label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="text" name="contactno" class="lock"  required="true" maxlength="10" pattern="[0-9]+">
                        <label> Contact number</label>
						
							
						
                    </div>
                    <div class="remember-password">
                       
                        <a href="login.php">Already Have an Account</a>
                    </div>
                    <button class="btn" name="submit" value="reset">Reset</button>
                    
                </form>
            </div>
            
                </form>
            </div>
        </div>
    </div>
 

    
</body>

</html>