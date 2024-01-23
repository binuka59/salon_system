<?php

@include 'config.php';
@include 'customer_head.php';


if(isset($_POST['submit'])){

   $name = $_POST['c_name'];
   $email = $_POST['email'];
   $gender =$_POST['gender'];
   $image = $_FILES['c_image']['name'];
   $mobilenum= $_POST['num'];
   $details =$_POST['details'];
 
   
   $customer_image_tmp_name = $_FILES['c_image']['tmp_name'];
   $customer_image_folder = 'upload/'.$image;

   if(empty($name) || empty($email)  || empty($mobilenum) || empty($gender) || empty($details) || empty($image) ){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO tblcustomers(Name,Email,MobileNumber,Gender,Details,image) VALUES('$name','$email','$mobilenum','$gender','$details','$image')";
      $upload = mysqli_query($con,$insert);
      if($upload){
         move_uploaded_file($customer_image_tmp_name, $customer_image_folder);
         $message[] = 'new customer added successfully';
      }else{
         $message[] = 'could not add the customer';
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
   <title>Customer ru salon</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
  
   <link rel="stylesheet" href="css/customers.css">
   
   

</head>
<body>


<div class="container" >
  

   <div class="admin-product-form-container">
      
      <?php 

      if(isset($message)){
         foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
         }
      }

      ?>

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new <span>Customer</h3>
         <input type="text" placeholder="Enter customer name" name="c_name" class="box"required="true">
         <input type="text" placeholder="Enter E-mail" name="email" class="box" required="true">
         <select type="text" name="gender" class="box"required="true">
            <option value ="">Select your gender</option>
            <option value ="male">MALE</option>
            <option value ="female">FEMALE</option>
          
         </select>
          
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="c_image" class="box"required="true">
		   <input type="text" placeholder ="Enter Mobile number" name ="num" class="box" min="1"  maxlength="10" pattern="[0-9]+" required="true">
         <textarea type="text" placeholder ="Enter details" name ="details" class="box"placeholder="Details" required="true" rows="3" cols="4"></textarea>
         
         <input type="submit" class="btn" name="submit" value="add Customer">
      </form>

   </div>

   <?php

   $select = mysqli_query($con, "SELECT * FROM tblcustomers");
   
   ?>
  

</div>


</body>
</html>