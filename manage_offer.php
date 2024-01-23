
<?php

@include 'config.php';
@include 'service_head.php';






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
         <tr>
            <th> Type</th>
            <th>Item 1</th>
            <th>Cost </th>
            <th>Item 2</th>
            <th>Cost </th>
            <th>Item 3</th>
            <th>Cost </th>
            <th>Item 4</th>
            <th>Cost </th>
            <th>dicount</th>
            <th>action</th>
         </tr>
         </thead>
         <tbody> 
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['servicetype']; ?></td>
            <td><?php echo $row['offer1']; ?></td>
            <td><?php echo $row['cost1']; ?> LKR</td>
            <td><?php echo $row['offer2']; ?></td>
            <td><?php echo $row['cost2']; ?> LKR</td>
            <td><?php echo $row['offer3']; ?></td>
            <td><?php echo $row['cost3']; ?> LKR</td>
            <td><?php echo $row['offer4']; ?></td>
            <td><?php echo $row['cost4']; ?> LKR</td>
            <td><?php echo $row['discount']; ?> %</td>
            

            <td>
               <a href="update_offer.php?edit=<?php echo $row['id']; ?>" class="edit-btn"> <i class="fas fa-edit"></i> Edit</a>
               <a href="manage_offer.php?delete=<?php echo $row['id']; ?>" class="del-btn"> <i class="fas fa-trash"></i> Delete </a>
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