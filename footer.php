<?php

@include 'config.php';

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="big-deal">
    <h1 class="section-heading text-pure"></h1>
   <div class="container">
   
       <div class="timer">
           
           <div>
               <span></span>
               <span></span>
           </div>
           <div>
               <span></span>
               <span></span>
           </div>
           <div>
               <span> Ru salon Shop</span>
               <span>Sri lankan <i class="fas fa-shop"></i></span>
           </div>
       </div>
   </div>
   
</section>


<!-- footer -->

<section class="footer">

    <div class="box-container">
 
       <div class="box">
          <h3><i class="fas fa-shop" ></i> Find us here </h3>
          <p>Beauty begins the moment you decide to be your self.......</p>
          <div class="share">
             <a href="#" class="fab fa-facebook-f"></a>
             <a href="#" class="fab fa-whatsapp"></a>
             <a href="#" class="fab fa-instagram"></a>
             <a href="#" class="fab fa-linkedin"></a>
          </div>
       </div>

        <?php
            $ret=mysqli_query($con,"select * from tbladmin");
            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {

        ?>

       <div class="box">
        <h3><i class="fas fa-phone" ></i> contact us</h3>
        <p><a href="tel://o774573584"><?php  echo $row['MobileNumber'];?></a></p>

        <h3><i class="fas fa-message" ></i> Mail us</h3>
        <p><a href="mailto:Rusalon@gmail.com"><?php  echo $row['Email'];?></a></p>

        </div>
     <div class="box">
        <h3><i class="fas fa-location" ></i> localization</h3>
        <p>No,23 <br>
          Kandy road, <br>
          Mawathagama.</p>
     </div>
     <?php } ?>
    </div>
 
    <div class="credit"> created by <span>Binuka lakshan</span> | all rights reserved! </div>
 
 </section>





<!-- footer end-->
</body>
</html>