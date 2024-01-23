<?php
session_start();
error_reporting(0);
@include 'config.php';
@include 'customer_head.php';


 
   ?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>view customer list ru salon</title>

   <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

   <!-- custom css file link  -->
   
   <link rel="stylesheet" href="css/customers.css">
   

</head>
<body>

<?php
   
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }

   $ret=mysqli_query($con,"select *from  tblcustomers");
   $cnt=1;
   
   ?>

<div class="product-display">
      <h3>Assign service for <span>Customer</span></h3>
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Customer image</th>
            <th>Customer name</th>
            <th>E-mail</th>
            <th>Gender</th>
			   <th>Mobile number</th>
            <th>Date/Time</th>
            <th>Action</th>
         </tr>
         </thead>
         <tbody> 
         <?php while ($row=mysqli_fetch_array($ret)) { ?>
         <tr>
            <td><img src="upload/<?php echo $row['image']; ?>" height="100" width="100" alt=""></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Gender']; ?></td>
            <td><?php echo $row['MobileNumber']; ?></td>
            <td><?php echo $row['CreationDate']; ?></td>
            

            <td>
               
               <a href="assign_customer.php?addid=<?php echo $row['ID'];?>"class="edit-btn"><i class="fas fa-edit"></i>Assign Services</a>
               
            </td>
            <hr>
         </tr>
      <?php } ?>
      </tbody> 
      </table>
   </div>

</div>


</body>
</html>
