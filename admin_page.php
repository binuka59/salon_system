<?php

@include 'config.php';
@include 'admin_head.php';

session_start();
error_reporting(0);

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   #header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>රූ salon admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/aiyo.css">



   

</head>
<body>
   


<section class="dashboard">

   <h1 class="heading">Admin<span>dashboard</span></h1>

   <div class="box-container">

      <div class="box">
         <?php $query1=mysqli_query($con,"Select * from tblcustomers");
            $totalcust=mysqli_num_rows($query1);
         ?>
         <h3><?php echo $totalcust; ?></h3>
         <p>Total Customer</p>
         <a href="view_customer.php" class="btn">See Customer</a>
      </div>

      <div class="box">
         <?php $query2=mysqli_query($con,"Select * from tblappointment");
         $totalappointment=mysqli_num_rows($query2);
         ?>
         <h3><?php echo $totalappointment;?></h3>
         <p>Total Appoinment</p>
         <a href="all-appointment.php" class="btn">See Appoinment</a>
      </div>

      <div class="box">
         <?php $query3=mysqli_query($con,"Select * from tblappointment where Status='1'");
         $totalaccapt=mysqli_num_rows($query3);
         ?>
         <h3><?php echo $totalaccapt; ?></h3>
         <p>Accepted Appoinment</p>
         <a href="accept_appoinment.php" class="btn">See More</a>
      </div>

      <div class="box">
         <?php $query4=mysqli_query($con,"Select * from tblappointment where Status='2'");
         $totalrejapt=mysqli_num_rows($query4);
         ?>
         <h3><?php echo $totalrejapt; ?></h3>
         <p>Rejected Appoinment</p>
         <a href="reject_appoinment.php" class="btn">See More</a>
      </div>

      <div class="box">
         <?php $query5=mysqli_query($con,"Select * from  tblservices");
            $totalser=mysqli_num_rows($query5);
         ?>
         <h3><?php echo $totalser; ?></h3>
         <p>Total Services </p>
         <a href="manage-services.php" class="btn">More Services</a>
      </div>

      <div class="box">
         <?php
            //todays sale
            $query6=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost
            from tblinvoice 
            join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE();");
            $todysale=0;
            while($row=mysqli_fetch_array($query6))
            {
               
               $todays_sale=$row['Cost'];
               $todysale+=$todays_sale;

            }
         ?>
         <h3><?php echo $todysale; ?></h3>
         <p>Today Sales </p>
         <a href="today_sales.php" class="btn">See More</a>
      </div>

      <div class="box">
         <?php
            //Yesterday's sale
            $query7=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost
            from tblinvoice 
            join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE()-1;");
            $yesterdaysale=0;
            while($row7=mysqli_fetch_array($query7))
            {
               $yesterdays_sale=$row7['Cost'];
               $yesterdaysale+=$yesterdays_sale;

            }
         ?>
         <h3><?php echo $yesterdaysale; ?></h3>
         <p>Yesterday Sale</p>
         <a href="yesterday_sales.php" class="btn">See More</a>
      </div>

      

      <div class="box">
         <?php
            //Total Sale
            $query9=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost
            from tblinvoice 
            join tblservices  on tblservices.ID=tblinvoice.ServiceId");
            while($row9=mysqli_fetch_array($query9))
            {
               $total_sale=$row9['Cost'];
               $totalsale+=$total_sale;

            }
         ?>
         <h3><?php echo $totalsale; ?></h3>
         <p>Total Sales</p>
         <a href="grandtotal_sale.php" class="btn">See More</a>
      </div>

   </div>

</section>



<script src="js/script.js"></script>

</body>
</html>