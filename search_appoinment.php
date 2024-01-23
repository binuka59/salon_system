
<?php
error_reporting(0);
@include 'config.php';
@include 'admin_head.php';


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
  
   <link rel="stylesheet" href="css/searchs.css">

</head>
<body>

   
<div class="container">

   <div class="admin-product">

     
   <form method="post" name="search" action="">
            <h3>Search<span> Appoinment</span></h3>
            <p > <?php

            if(isset($message)){
            foreach($message as $message){
                echo '<span class="message">'.$message.'</span>';
            }
            }

            ?>
            </p>
             <h4>Search Appointment / Name / Contact number:</h4>
           
				<form method="post" name="search" action="">
					<p style="font-size:16px; color:red" align="center"> <?php if($msg)
                    {
                     echo $msg;
                    }  ?> 
               </p> 

              <div class="form-group"> 
					<label for="exampleInputEmail1">Search by Appointment:</label> <br>
						<input id="searchdata" type="text" name="searchdata" required="true" class="form-control"><br>

					<button type="submit" name="search" class="btn btn-primary btn-sm">Search</button> </form> 
			    </div>
            </form>

           
                <?php
        if(isset($_POST['search']))
        { 

        $sdata=$_POST['searchdata'];
    ?>
</div>  
    

    <div class="product-display">
    <h4 align="center">Result against <span>"<?php echo $sdata;?>"</span> keyword </h4> 
      <table class="display-table">
         <thead>
             <tr>
                    <th>#</th>
                    <th>Appointment Number</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Action</th>
             </tr>
         </thead>
         <tbody> 
  
                <?php
                    $ret=mysqli_query($con,"select *from  tblappointment where AptNumber like '%$sdata%' || Name like '%$sdata%' || PhoneNumber like '%$sdata%'");
                    $num=mysqli_num_rows($ret);
                    if($num>0){
                    $cnt=1;
                    while ($row=mysqli_fetch_array($ret)) {

                ?>
              <tr>
                    <th scope="row"><?php echo $cnt;?></th> 
                    <td><?php  echo $row['AptNumber'];?></td> 
                    <td><?php  echo $row['Name'];?></td>
                    <td><?php  echo $row['PhoneNumber'];?></td>
                    <td><?php  echo $row['AptDate'];?></td>
                    <td><?php  echo $row['AptTime'];?></td> 
                    

                    <td>
                        <a href="view-appointment.php?viewid=<?php echo $row['ID'];?>"> <i class="fas fa-eye"></i> View</a>
                    </td>
             </tr>
             <?php 
                $cnt=$cnt+1;
                } } else { ?>
                    <tr>
                        <td colspan="8"> No record found against this search</td>

                    </tr>
        
             <?php } }?>
     
         </tbody> 
      </table>
   </div>




</body>
</html>
