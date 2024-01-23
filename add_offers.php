
<?php

@include 'config.php';
@include 'service_head.php';


if(isset($_POST['submit'])){

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
 
   
   

   if(empty($name1) || empty($cost1)  || empty($offr) || empty($name2) || empty($cost2) || empty($name3) || empty($cost3) || empty($name4) || empty($cost4)|| empty($dis)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO tbloffers(offer1,cost1,offer2,cost2,offer3,cost3,offer4,cost4,servicetype,discount) VALUES('$name1','$cost1','$name2','$cost2','$name3','$cost3','$name4','$cost4','$offr','$dis')";
      $upload = mysqli_query($con,$insert);
      if($upload){
        
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
   <title>admin service add page </title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/dit.css">
   <link rel="stylesheet" href="css/offer.css">

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
         <h3>Add A <span> Offer </span></h3>
         
         <label> Select offer type</label>
         <select type="text" name="offer" class="box"required="true">
            <option value ="">Select offers type</option>
            <option value ="basic">Basic </option>
            <option value ="standard"> standard</option>
            <option value ="premium">premium</option>
         </select>

      <div class="box2">
            <label> DISCOUNT </label>
                <input type="text" placeholder="discount rate (%)" name="disc" class="box"required="true">
              
        </div> 

        <div class="">
            <label> Insert item 1 </label>
                <input type="text" placeholder="Enter offer" name="offname1" class="box"required="true">
                <input type="text" placeholder="Cost for offer" name="cost1" class="box" required="true">
        </div>  

        <div class="box1">
            <label> Insert item 2 </label>
                <input type="text" placeholder="Enter offer" name="offname2" class="box"required="true">
                <input type="text" placeholder="Cost for offer" name="cost2" class="box" required="true">
        </div> 
        <div class="">
            <label> Insert item 3 </label>
                <input type="text" placeholder="Enter offer" name="offname3" class="box"required="true">
                <input type="text" placeholder="Cost for offer" name="cost3" class="box" required="true">
        </div> 
        <div class="box1">
            <label> Insert item 4 </label>
                <input type="text" placeholder="Enter offer" name="offname4" class="box"required="true">
                <input type="text" placeholder="Cost for offer" name="cost4" class="box" required="true">
        </div> 
		 
         <input type="submit" class="btn" name="submit" value="Add Service">
      </form>

   </div>

  

</div>


</body>
</html>