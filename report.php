
<?php

@include 'config.php';
@include 'report_head.php';


if(isset($_POST['submit'])){

   $name = $_POST['servicename'];
   $cost = $_POST['cost'];
   $gender =$_POST['gender'];
   $service= $_POST['service'];
   $image = $_FILES['c_image']['name'];

   $customer_image_tmp_name = $_FILES['c_image']['tmp_name'];
   $customer_image_folder = 'upload/'.$image;
   
   

   if(empty($name) || empty($cost)  || empty($gender) || empty($service) || empty($image) ){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO tblservices(ServiceName,Cost,gender,type,image) VALUES('$name','$cost','$gender','$service','$image')";
      $upload = mysqli_query($con,$insert);
      if($upload){
         move_uploaded_file($customer_image_tmp_name, $customer_image_folder);
         $message[] = 'new service added successfully';
      }else{
         $message[] = 'sorry....could not add the service';
      }
   }

};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/reports.css">

</head>
<body>

   
<div class="container">

   <div class="admin-product-form-container">

     
      <form method="post" name="bwdatesreport"  action="bwdates-reports-details.php" enctype="multipart/form-data">
            <h3>Between Date<span> report</span></h3>
            <p > <?php

            if(isset($message)){
            foreach($message as $message){
                echo '<span class="message">'.$message.'</span>';
            }
            }

            ?>
            </p>
            <div class="form">
                <label for="exampleInputEmail1">From Date:</label><br>
                <input type="date" class="form-control1" name="fromdate" id="fromdate" value="" required='true'> 
            </div> 
            <div class="form"> 
                <label for="exampleInputPassword1">To  Date:</label><br>
                <input type="date" class="form-control1" name="todate" id="todate" value="" required='true'> 
            </div>
                                    
                                    
            <button type="submit" name="submit" class="btn">Submit</button> 
            
      </form> 

   </div>

  

</div>


</body>
</html>