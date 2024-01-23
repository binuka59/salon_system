<?php
error_reporting(0);
@include 'config.php';
$ID = $_GET['appoint'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ru salon</title>

     <!-- font awesome cdn link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel ="stylesheet" href="css/page.css">
    <link rel ="stylesheet" href="css/user.css">
 
    
</head>
<body>
<?php
        $ret1=mysqli_query($con,"select * from  tblappointment where Status='2'");
        $num=mysqli_num_rows($ret1);

        ?>
   
    <section class="header">
    

        <a href="login.php" class="logo"><span>s</span>alon <i class="fas fa-star-half-alt" ><span1>රූ</span1></i></a>

        <nav class="navbar">
        <div id="close-navbar" class="fas fa-times"></div>
        <a href="index.php">Home</a>
        <a href="beard.php">Hair & Beard </a>
        <a href="tatto.php">Tattos</a>
        <a href="wedding.php">Wedding</a>
        <a href="booking.php">Appointment</a>
        <a href="#" class="logi"><i class="fa fa-bell" id="cart-btn"></i><span><?php echo $num;?></span></a>
        <?php echo $ID;?>
            
    </nav>
    

    <form action=""  class="shopping-cart">
       
            
      <h3>You have <?php echo $num;?> new message</h3>
            <?php 
              $ret=mysqli_query($con,"select * from  tblappointment where Status='2'");

     if($num>0){
            while($result=mysqli_fetch_array($ret))
              {
                if($result['Status']=='1')
                {
                  ?>
                 <span class="price"><i class="fas fa-scissors"><a href="view-appointment.php?viewid=<?php echo $result['ID'];?>"> Your Appointment Accepted</a></i></span><br><br><br> 
                <?php
                }if($result['Status']=='2')
                {?>
                   <span class="price"><i class="fas fa-scissors"><a href="view-appointment.php?viewid=<?php echo $result['ID'];?>"> Your Appointment  Rejected</a></i></span><br><br><br> 
                
                <?php  }
               
            ?>

        
          <?php }} else {?>  
          <span class="price"><i class="fas fa-scissors"><a href="all-appointment.php">No New message  Received</a></i></span>
                           
          <?php } ?>
       
    </form>

    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>

        <div class="fas fa-phone" id="login-btn"> </div>
        <div class="spa" id="login-btn"> Contact</div>
    </div>

    <?php
            $ret=mysqli_query($con,"select * from tbladmin  ");
            $cnt=1;
            while ($row=mysqli_fetch_array($ret)) {

        ?>

    <form action="" class="login-form">
    <h3>Contact us</h3>

    <p>Call us:<a href="tel://0774573584">0<?php  echo $row['MobileNumber'];?></a></p>
    <p>E-mail :<a href="mailto:Rusalon@gmail.com"><?php  echo $row['Email'];?></a></p>

    <?php }?>

    </form>
    </section>
<!-- header -->




<script src="js/new.js"></script>


    
</body>
</html>