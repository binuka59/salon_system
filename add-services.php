
<?php

@include 'config.php';
@include 'service_head.php';


if(isset($_POST['submit'])){

   $name = $_POST['servicename'];
   $cost = $_POST['cost'];
   $gender =$_POST['gender'];
   $service= $_POST['service'];
   $status=1;
  
   
   $image = $_FILES['c_image']['name'];

   $customer_image_tmp_name = $_FILES['c_image']['tmp_name'];
   $customer_image_folder = 'upload/'.$image;
   
   

   if(empty($name) || empty($cost)  || empty($gender) || empty($service) || empty($image) ){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO tblservices(ServiceName,Cost,gender,type,image,hide) VALUES('$name','$cost','$gender','$service','$image','$status')";
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
 
   <link rel="stylesheet" href="css/servicess.css">
   

</head>
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Add A New<span> Service </span></h3>
         <input type="text" placeholder="Enter service" name="servicename" class="box"required="true">
         <input type="text" placeholder="Cost for service" name="cost" class="box" required="true">
		 <select type="text" name="service" class="box"required="true">
            <option value ="">Select service</option>
            <option value ="Hair">Hair </option>
            <option value ="beard"> beard</option>
            <option value ="wedding">Wedding</option>
			   <option value ="tatto" >Tatto</option>
            
          
         </select>
         <select type="text" name="gender" class="box"required="true">
            <option value ="">Select your gender</option>
            <option value ="male">MALE</option>
            <option value ="female">FEMALE</option>
            <option value ="both">Both</option>
          
         </select>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="c_image" class="box"required="true">
         
         <input type="submit" class="btn" name="submit" value="add service">
      </form>

   </div>

  

</div>


</body>
</html>