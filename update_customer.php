<?php
error_reporting(0);

$ID = $_GET['edit'];

@include 'config.php';
@include 'customer_head.php';



if(isset($_POST['update_customer'])){

   $name = $_POST['c_name'];
   $email = $_POST['email'];
   $gender =$_POST['gender'];
   $image = $_FILES['c_image']['name'];
   $mobilenum= $_POST['num'];
   $details =$_POST['details'];
  

   $customer_image_tmp_name = $_FILES['c_image']['tmp_name'];
   $customer_image_folder = 'upload/'.$image;

   if(empty($name) || empty($email)  || empty($mobilenum) || empty($gender) || empty($details) || empty($image) ){
      $message[] = 'please fill out all!';    
   }else{
   
      $update_data = "UPDATE tblcustomers SET Name='$name', email='$email', gender='$gender',MobileNumber='$mobilenum',details='$details',image='$image' WHERE id = '$ID'";
      $upload = mysqli_query($con, $update_data);

      if($upload){
         move_uploaded_file($customer_image_tmp_name, $customer_image_folder);
         $message[] = 'successfull!';  
         header('location:view_customer.php');
      }else{
         $$message[] = 'please fill out all!'; 
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
   <link rel="stylesheet" href="css/dit.css">
   <link rel="stylesheet" href="css/customer.css">
</head>
<body>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($con, "SELECT * FROM tblcustomers where id='$ID' ");
      
      

   ?>
         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Edit list of <span>Customer </span></h3>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <input type="text" value="<?php echo $row['Name']; ?>"name="c_name" class="box"required="true">
         <input type="text" placeholder="Enter E-mail" value="<?php echo $row['Email']; ?>" name="email" class="box" required="true">
         
         <select type="text" name="gender"  class="box" required="true" >
            
            <option value ="Male"><?php echo $row['Gender']?></option>
            <option value ="Male">Male</option>
            <option value ="FeMale">FeMale</option>

         </select>
          
         <input type="file" class="box" name="c_image"  accept="image/png, image/jpeg, image/jpg" class="box"required="true">
		 <input type="text" placeholder ="Enter Mobile number" value="<?php echo $row['MobileNumber']; ?>" name ="num" class="box" min="1" maxlength="10" pattern="[0-9]+" required="true" >
         <textarea type="text" placeholder ="Enter details" name ="details" class="box" value=""placeholder="Details" required="true" rows="3" cols="4"><?php echo $row['Details']; ?></textarea>
         
      <input type="submit" value="update product" name="update_customer" class="btn">
      <a href="view_customer.php" class="option-btn">go back!</a>
   </form>
   


<?php };?>

   

</div>

</div>
</body>
</html>