
<?php

@include 'config.php';
@include 'user_head.php';



if(isset($_POST['submit'])){

   $name = $_POST['servicename'];
   $cost = $_POST['cost'];
   $gender =$_POST['gender'];
   $service= $_POST['service'];
   $image = $_FILES['c_image']['name'];

   $customer_image_tmp_name = $_FILES['c_image']['tmp_name'];
   $customer_image_folder = 'upload/'.$image;
   
   

   if(empty($name) || empty($cost)  || empty($gender) || empty($service || empty($image)) ){
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



if(isset($_GET['delete'])){
   $ID = $_GET['delete'];
   mysqli_query($con, "DELETE FROM tblservices WHERE id = $ID");
   $message[] = 'DElete succesfull ......';
   header('location:manage_offer.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin offer manage page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/servicess.css">


</head>
<body>


   
   <?php 

	if(isset($message)){
	foreach($message as $message){
		echo '<span class="message">'.$message.'</span>';
	}
	}

   $select = mysqli_query($con, "SELECT * FROM tbloffers ");
   
   ?>
     
   <div class="product-display">
   <h3 class="title1">View offer<span> list</span></h3>
    
      <table class="product-display-table">
         <thead>
         <?php
         
          while($row = mysqli_fetch_assoc($select)){ 
            if($row['id']=='2'){?>
               <tr >
                  <td colspan="8"><?php echo $row['servicetype']; ?></td>
               </tr>
               <tr colspan="8">
            <td colspan="8"></td>
         </tr>

         <tr colspan="8">
            <th>Item 1</th>
            <td colspan="3"><?php echo $row['offer1']; ?></td>
            <th>Cost </th>
            <td colspan="2"><?php echo $row['cost1']; ?> LKR</td>
         </tr>
         <tr colspan="8">
            <td colspan="8"></td>
         </tr>
         <tr>
            <th>Item 2</th>
            <td colspan="3"><?php echo $row['offer2']; ?></td>
            <th>Cost </th>
            <td colspan="2"><?php echo $row['cost2']; ?> LKR</td>
         </tr>
         <tr colspan="8">
            <td colspan="8"></td>
         </tr>

         <tr colspan="8">
            <th>Item 3</th>
            <td colspan="3"><?php echo $row['offer3']; ?></td>
            <th>Cost </th>
            <td colspan="2"><?php echo $row['cost3']; ?> LKR</td>
         </tr>
         <tr colspan="8">
            <td colspan="8"></td>
         </tr>
         

         <tr colspan="8">
            <th>Item 4</th>
            <td colspan="3"><?php echo $row['offer4']; ?></td>
            <th>Cost </th>
            <td colspan="2"><?php echo $row['cost4']; ?> LKR</td>
         </tr>
         <tr colspan="8">
            <td colspan="8"></td>
         </tr>
         <?php
         $total=0;
            $total=$row['cost1']+$row['cost2']+$row['cost3']+$row['cost4'];
         ?>
         </thead>
         <tbody> 
           
         <tr colspan="8">
            <th colspan="6">TOTAL</th>
            <td ><?php echo $total?>LKR</td>
         </tr>
         <?php
         $dis=0;
         $dis=($total/100)*$row['discount'];
?>
       <tr colspan="8">
         <td colspan="7">DISCOUNT of <?php echo $row['discount']?>%</td>
         
         
      </tr>

      <tr colspan="7">
         <th colspan="6">DISCOUNT</th>
         <td ><?php echo $dis?>LKR</td>
      </tr>
      <?php
            }  ?>
              
            
         
      <?php } ?>
      </tbody> 
      </table>
      <!-- <a href="style_booking.php?viewid=<?php echo $row['ID'];?>"  class="bton">Apply Offer</a> -->
   </div>
   
</div>


</body>
</html>