<?php
error_reporting(0);
@include 'config.php';
@include 'customer_head.php';

$ID = $_GET['hide'];
$IDS = $_GET['act'];

$hide=0;
$update_data = "UPDATE tblcustomers SET status='$hide' WHERE id = '$ID'";
$upload = mysqli_query($con,$update_data);

$active=1;
$update_data = "UPDATE tblcustomers SET status='$active' WHERE id = '$IDS'";
$upload = mysqli_query($con,$update_data);

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

// if(isset($_GET['delete'])){
//    $ID = $_GET['delete'];
//    mysqli_query($con, "DELETE FROM tblcustomers WHERE id = $ID");
//    $message[] = 'DElete succesfull ......';
//    header('location:view_customer.php');
// };

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>රූ salon view customer </title>

  

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

   $select = mysqli_query($con, "SELECT * FROM tblcustomers");
   
   ?>

<div class="product-display">
      <h3>view  list of <span>Customer</span></h3>
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
         <?php while($row = mysqli_fetch_assoc($select)){ 
            if($row['status']=='1')
            {?>
         <tr>
            
            <td><img src="upload/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Gender']; ?></td>
            <td><?php echo $row['MobileNumber']; ?></td>
            <td><?php echo $row['CreationDate']; ?></td>
            

            <td>
               <a href="update_customer.php?edit=<?php echo $row['ID']; ?>" class="edit-btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="view_customer.php?hide=<?php echo $row['ID']; ?>" class="del-btn"> <i class="fas fa-trash"></i> Delete </a>
            </td>
            <hr>
         </tr>
      <?php } } ?>
      </tbody> 
      </table>
<!-- -------------------------------------------------------activate customer-------------------------------------------------------- -->
      <?php
   
   $select = mysqli_query($con, "SELECT * FROM tblcustomers");
   
   ?>

      <h3>view  list of Deactivate<span>Customer</span></h3>
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
         <?php while($row = mysqli_fetch_assoc($select)){ 
            if($row['status']=='0')
            {?>
         <tr>
            
            <td><img src="upload/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Email']; ?></td>
            <td><?php echo $row['Gender']; ?></td>
            <td><?php echo $row['MobileNumber']; ?></td>
            <td><?php echo $row['CreationDate']; ?></td>
            

            <td>
               <a href="update_customer.php?edit=<?php echo $row['ID']; ?>" class="edit-btn"> <i class="fas fa-edit"></i> edit </a>
             
               <a href="view_customer.php?act=<?php echo $row['ID']; ?>" class="del-btn"  > <i class="fas fa-edit"></i> Active </a>
            </td>
            <hr>
         </tr>
      <?php } } ?>
      </tbody> 
      </table>
   </div>

</div>


</body>
</html>