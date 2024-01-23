
<?php
$ID = $_GET['edit'];

@include 'config.php';
@include 'service_head.php';


if(isset($_POST['update_offer'])){

   $name1 = $_POST['offname1'];
   $cost1 = $_POST['cost1'];
   $name2 = $_POST['offname2'];
   $cost2 = $_POST['cost2'];
   $name3 = $_POST['offname3'];
   $cost3 = $_POST['cost3'];
   $name4 = $_POST['offname4'];
   $cost4 = $_POST['cost4'];
   $dis = $_POST['disc'];
   $offr= $_POST['offer'];
 
   
   

   if(empty($name1) || empty($cost1)  || empty($offr) || empty($name2) || empty($cost2) || empty($name3) || empty($cost3) || empty($name4) || empty($cost4) || empty($offr)|| empty($dis)){
      $message[] = 'please fill out all';
   }else{
      $update_data= " UPDATE tbloffers SET offer1='$name1',cost1='$cost1',offer2='$name2',cost2='$cost2',offer3='$name3',cost3='$cost3',offer4='$name4',cost4='$cost4',servicetype='$offr',discount='$dis' WHERE id = '$ID'";
      $upload = mysqli_query($con,$update_data);
      if($upload){
        
         $message[] = 'updated  successfully';
         header('location:manage_offer.php');
      }else{
         $message[] = 'sorry....could not update the service';
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
   <title>admin service add page </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   
   <link rel="stylesheet" href="css/offer.css">

</head>
<body>
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

      
$select = mysqli_query($con, "SELECT * FROM tbloffers where id='$ID' ");




?>
   
<div class="container">

   <div class="admin-product-form-container">
        
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Add A <span> Offer </span></h3>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <label> Select offer type</label>
         <select type="text" name="offer" class="box"required="true">
            <option value="<?php echo $row['servicetype']; ?>"><?php echo $row['servicetype']; ?> </option>
         </select>
      <br>
      
      <div class="box2">
            <label> DISCOUNT </label>
                <input type="text" value="<?php echo $row['discount'];?>"name="disc" class="box"required="true">
              
        </div> 

        <div class="">
            <label> Insert item 1 </label>
                <input type="text" value="<?php echo $row['offer1']; ?>" name="offname1" class="box"required="true">
                <input type="text" value="<?php echo $row['cost1']; ?>" name="cost1" class="box" required="true">
        </div>  

        <div class="box1">
            <label> Insert item 2 </label>
                <input type="text"value="<?php echo $row['offer2']; ?>" name="offname2" class="box"required="true">
                <input type="text" value="<?php echo $row['cost2']; ?>" name="cost2" class="box" required="true">
        </div> 
        <div class="">
            <label> Insert item 3 </label>
                <input type="text" value="<?php echo $row['offer3']; ?>" name="offname3" class="box"required="true">
                <input type="text" value="<?php echo $row['cost3']; ?>" name="cost3" class="box" required="true">
        </div> 
        <div class="box1">
            <label> Insert item 4 </label>
                <input type="text" value="<?php echo $row['offer4']; ?>" name="offname4" class="box"required="true">
                <input type="text" value="<?php echo $row['cost4']; ?>" name="cost4" class="box" required="true">
        </div> 
		 
         
         <input type="submit" value="update Service" name="update_offer" class="btn">
         <a href="manage_offer.php" class="opt-btn">go back!</a>
      </form>

   </div>

   <?php };?>

</div>


</body>
</html>