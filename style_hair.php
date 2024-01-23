<?php 
@include 'user_head.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ru salon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/qq.css">

</head>
<body>
 
     <section class="products">

            <h1 class="heading"> FEMALE HAIR <span> STYLES</span></h1>


     <div class="box-container">
      <?php
         $ret=mysqli_query($con,"select *from  tblservices where type='Hair' && gender='female' && hide='1'");
         $cnt=1;
         $num=mysqli_num_rows($ret);
         if($num>0)
         {
         while ($row=mysqli_fetch_array($ret)) {

      ?>
   <form action="" class="box" method="POST">
      <div class="price"><?php echo $row['Cost']; ?> LKR</div>
      <a href="style_booking.php?viewid=<?php echo $row['ID'];?>"  class="apply">Apply</a>
      <img src="upload/<?php echo $row['image']; ?>"class="image" width="100%" height="80%"  alt="">
      <div class="name"><?php  echo $row['ServiceName']; ?></div>
      
   </form>
   <?php
      }
   } else {?>
      <div class="err"><?php echo "Not to adding Style here.....";?></div>
   <?php
   }
   
   ?>

   </div>

</section>







     <?php @include 'footer.php';?>
     
<!-- footer end-->

<script src="js/script1.js"></script>
<script src="js/script2.js"></script>

<!-- visit end-->
</body>
</html>