<?php
error_reporting(0);

$ID = $_GET['edit'];

@include 'config.php';
@include 'service_head.php';



if(isset($_POST['update_service'])){

    $name = $_POST['servicename'];
    $cost = $_POST['cost'];
    $gender =$_POST['gender'];
    $service= $_POST['service'];
    $image = $_FILES['c_image']['name'];
 
    $customer_image_tmp_name = $_FILES['c_image']['tmp_name'];
    $customer_image_folder = 'upload/'.$image;

    if(empty($name) || empty($cost)  || empty($gender) || empty($service) || empty($image) ){
        $message[] = 'please fill out all!';    
     }else{
     
        $update_data = "UPDATE tblservices SET servicename='$name', Cost='$cost', gender='$gender',type='$service',image='$image' WHERE id = '$ID'";
        $upload = mysqli_query($con,$update_data);
  
        if($upload){
           move_uploaded_file($customer_image_tmp_name, $customer_image_folder);
           $message[] = 'successfull!';  
           header('location:manage-services.php');
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
   <link rel="stylesheet" href="css/services.css">
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
      
      $select = mysqli_query($con, "SELECT * FROM tblservices where id='$ID' ");
      
      

   ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>Edit list of <span>service</span></h3>
            <?php while($row = mysqli_fetch_assoc($select)){ ?>
            <input type="text"value="<?php echo $row['ServiceName']; ?>"  placeholder="Enter service" name="servicename" class="box"required="true">
            <input type="text" value="<?php echo $row['Cost']; ?>" placeholder="Cost for service" name="cost" class="box" required="true">
		    <select type="text" name="service" class="box"required="true">
                <option value =""><?php echo $row['type']; ?></option>
                <option value ="Hair">Hair</option>
                <option value ="wedding">Wedding</option>
			    <option value ="tatto">Tatto</option>
          
             </select>
         <select type="text" name="gender" class="box"required="true">
            <option value ="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
            <option value ="male">MALE</option>
            <option value ="female">FEMALE</option>
            <option value ="both">Both</option>
          
         </select>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="c_image" class="box"required="true">
         
         <input type="submit" value="update Service" name="update_service" class="btn">
        <a href="manage-services.php" class="option-btn">go back!</a>
      </form>

   


<?php };?>

   

</div>

</div>
</body>
</html>