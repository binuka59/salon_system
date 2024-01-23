
<?php@include 'config.php';?>
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

    <link rel ="stylesheet" href="css/admin_style.css">
    <link rel ="stylesheet" href="css/set.css">
   
   
   
    

    

</head>
<body>
        <?php
        $ret1=mysqli_query($con,"select ID,Name from  tblappointment where Status=''");
        $num=mysqli_num_rows($ret1);

        ?>
    <section class="header">
      <nav class="navbar">
      <div id="close-navbar" class="fas fa-times"></div>
      <a href="admin_page.php">Home</a>
      <a href="add-services.php">Services</a>
      <a href="all-appointment.php">Appointment</a>
      <a href="add_customer.php">Customer</a>
      <a href="report.php">Reports</a>
      <a href="see_invoices.php">Invoices</a>
      <a href="search_appoinment.php">search </a>
      <a href="#" class="logi"><i class="fa fa-bell" id="cart-btn"></i><span class="bar"><?php echo $num;?></span></a>
      <a href="login.php" id="login">Log out</a>

   

    <form action=""  class="shopping-cart">
       
            
      <h3>You have <?php echo $num;?> new notification</h3>
        <?php if($num>0){
            while($result=mysqli_fetch_array($ret1))
              {
            ?>
        <span class="price"><i class="fas fa-scissors"><a href="view-appointment.php?viewid=<?php echo $result['ID'];?>"> New appointment received from <?php echo $result['Name'];?></a></i></span><br><br><br>
          <?php }} else {?>  
          <span class="price"><i class="fas fa-scissors"><a href="all-appointment.php">No New Appointment Received</a></i></span>
                           
          <?php } ?>
        <div class="bottom">
          <a href="new_appoinment.php">See all notifications</a>
        </div>
    </form>

  
    
    </section>
    
    
    
<!-- header -->
<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


<script src="js/script1.js"></script>



    
</body>
</html>