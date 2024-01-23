
<?php
error_reporting(0);
@include 'config.php';
@include 'service_head.php';

$ID = $_GET['hide'];
$IDS = $_GET['act'];
$hide=0;


   $update_data = "UPDATE tblservices SET hide='$hide' WHERE id = '$ID'";
   $upload = mysqli_query($con,$update_data);

   $active=1;
   $update_data = "UPDATE tblservices SET hide='$active' WHERE id = '$IDS'";
   $upload = mysqli_query($con,$update_data);

   
  
     
    
   





// if(isset($_GET['delete'])){
//    $ID = $_GET['delete'];
//    mysqli_query($con, "UPDATE FROM tblservices WHERE id = $ID");
//    $message[] = 'DElete succesfull ......';
//    header('location:manage-services.php');
// };




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

   $select = mysqli_query($con, "SELECT * FROM tblservices");
   
   ?>
     
   <div class="product-display">
   <h3 class="title1">View<span>Services list</span></h3>
    
      <table class="product-display-table">
         <thead>
         <tr>
            <th> Image</th>
            <th>Style name</th>
            <th>Cost</th>
            <th>Gender</th>
			    <th>Type</th>
            <th>Date/Time</th>
            <th>action</th>
         </tr>
         </thead>
         <tbody> 
         <?php while($row = mysqli_fetch_assoc($select)){ 
            if($row['hide']=='1')
            {

            
            
            ?>
         <tr>
            <td><img src="upload/<?php echo $row['image']; ?>" height="100" width="150" alt=""></td>
            <td><?php echo $row['ServiceName']; ?></td>
            <td>RS: <?php echo $row['Cost']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['CreationDate']; ?></td>
            

            <td>
               <a href="update_service.php?edit=<?php echo $row['ID']; ?>" class="edit-btn"> <i class="fas fa-eye"></i> Edit</a>
               <a href="manage-services.php?hide=<?php echo $row['ID']; ?>" class="del-btn"> <i class="fas fa-trash"></i> Delete </a>

               
            </td>
            <hr>
         </tr>
      <?php } } ?>
      </tbody> 
      </table>
<!-- ------------------------------------------------------------active service------------------------------------------------------- -->
<?php 



$select = mysqli_query($con, "SELECT * FROM tblservices");

?>
        
<div class="product-display">
   <h3 class="title1">View Deactive<span>Services list</span></h3>
    
      <table class="product-display-table">
         <thead>
         <tr>
            <th> Image</th>
            <th>Style name</th>
            <th>Cost</th>
            <th>Gender</th>
			    <th>Type</th>
            <th>Date/Time</th>
            <th>action</th>
         </tr>
         </thead>
         <tbody> 
         <?php while($row = mysqli_fetch_assoc($select)){ 
            if($row['hide']=='0')
            {

            
            
            ?>
         <tr>
            <td><img src="upload/<?php echo $row['image']; ?>" height="100" width="150" alt=""></td>
            <td><?php echo $row['ServiceName']; ?></td>
            <td>RS: <?php echo $row['Cost']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['CreationDate']; ?></td>
            

            <td>
               <a href="update_service.php?edit=<?php echo $row['ID']; ?>" class="edit-btn"> <i class="fas fa-eye"></i> Edit</a>
               <a href="manage-services.php?act=<?php echo $row['ID']; ?>" class="edit-btn"  > <i class="fas fa-edit"></i> Active </a>

              
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