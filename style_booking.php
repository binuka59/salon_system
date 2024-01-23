

<?php

@include 'config.php';

session_start();

if(isset($_POST['submit']))
  {

    $name=$_POST['name'];
    $email=$_POST['Email'];
    $services=$_POST['services'];
    $adate=$_POST['adate'];
    $atime=$_POST['atime'];
    $phone=$_POST['phone'];
   
    $aptnumber = mt_rand(100000000, 999999999);
  

    if(empty($name) ){
        $message[] = 'please fill out all';
     }else{
        $query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
        if ($query) {
            $ret=mysqli_query($con,"select AptNumber from tblappointment where Email='$email' and  PhoneNumber='$phone'");
            $result=mysqli_fetch_array($ret);
            $_SESSION['aptno']=$result['AptNumber'];
           
           $message[] = 'Appoinment sent successfully';
        }else{
           $message[] = 'Sorry try agin your appoinment';
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
    <title>Ru salon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 
     <link rel="stylesheet" href="css/styles.css">
     <?php include 'user_head.php';?>
</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>


    <!-- =====================================================visit===================================================================== -->

<section class="visit" id="visit">

    

        <div class="row">

            <div class="image">
                <img src="images/e.jpg" alt="">
            </div>
    
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h2>Book Your Appointment</h2>
                <div class="inputBox">
                    <input type="text" placeholder="Enter your name" name="name" required>
                </div>

                <div class="inputBox">
                    <input type="text" placeholder="Enter your email"  name="Email" pattern=".+@gmail.com" required="true" title="Example@gmail.com">
                </div>
                <div class="inputBox">
                  
                        
                        
                  <?php 
                   $cid=$_GET['viewid'];
                   $query=mysqli_query($con,"select * from tblservices where id='$cid'");
                  while($row=mysqli_fetch_array($query))
                  {
                  ?>
                  <input type="text" value="<?php echo $row['ServiceName'];?>" id="name" name="services" required="true" >
           
                  <?php } ?> 
    
                </div>

                <div class="inputBox">
                    <input type="numbers" placeholder ="Enter mobile number" id="phone" name="phone" placeholder="Phone" required="true" maxlength="10" pattern="[0-9]+">
                </div>
                <!-- <div class="inputBox">
                    <input type="text" placeholder ="Type message here" name ="message">
                </div>

                <div class="inputBox">
                <select type="text" placeholder="" name="gender" class="box"required>
                <option value ="">Chose your gender</option>
                <option value ="male">MALE</option>
                <option value ="female">FEMALE</option>
                </select>
                </div> -->
                
                <div class="inputBox">
                    <input type="time" placeholder ="Enter time here" name="atime" id='atime' required="true"  >
                </div>

                <div class="inputBox">
                    <input type="date" placeholder ="Enter date here" name="adate" id='adate' required="true">
                </div>
    
                
               
                <input type="submit" class="btn" name="submit" value="Appoinment">
              
            </form>
    
            
            
        </div>

</section>


<?php @include 'footer.php';?>

<!-- footer end-->

<script src="js/login.js"></script>
<script src="js/script2.js"></script>

<!-- visit end-->
</body>
</html>