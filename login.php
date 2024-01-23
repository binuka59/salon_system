<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = ($_POST['password']);
 

   $select = " SELECT * FROM tbladmin WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['UserName'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }
     
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
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
        <h3 class="logo"><span>S</span>alon <i class='fas fa-star-half-alt'></i> <span1>රූ</span1></h2>
            <div class="text-item">
                <h2>Welcome!</h2>
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
                <form action="" method="post">
                    

                    <?php
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<span class="error-msg">'.$error.'</span>';
                        };
                    };
                    ?>
                    <h2>Sign In</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" name="email" placeholder="Enter Your E-mail" required>
                        <label > E-mail </label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password"  name="password" placeholder="Enter the Password" required>
                        <label> Password </label>
                    </div>
                    <div class="remember-password">
                       
                        <a href="forgot-password.php">Forget Password</a>
                    </div>
                    <button class="btn" name="submit">Login </button>
                    
                </form>
            </div>
            
                </form>
            </div>
        </div>
    </div>
 

    
</body>

</html>