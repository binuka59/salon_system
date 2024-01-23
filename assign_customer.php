<?php
session_start();
error_reporting(0);

@include 'config.php';
@include 'customer_head.php';
// if (strlen($_SESSION['bpmsaid']==0)) {
//    header('location:logout.php');
//    } else{

if(isset($_POST['submit'])){


   $uid=intval($_GET['addid']);
   $invoiceid=mt_rand(100000000, 999999999);
   $sid=$_POST['sids'];
   for($i=0;$i<count($sid);$i++){
      $svid=$sid[$i];
   $ret=mysqli_query($con,"insert into tblinvoice(Userid,ServiceId,BillingId) values('$uid','$svid','$invoiceid');");
   
   
   echo'<script>alert("Invoice created successfully. Invoice number is "+"'.$invoiceid.'")</script>';
   echo "<script>window.location.href ='see_invoices.php'</script>";
   }
   }
    
   
   
     ?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>view customer list ru salon</title>

  

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

   
   ?>

<div class="product-display">
   <form method="post">
      <h3>Assign service for <span>Customer</span></h3>
      <table class="product-display-table">
         <thead>
         <tr>
            <th>#</th> 
			<th>Service Name</th> 
			<th>Service Price</th> 
			<th>Action</th> 
         </tr>
         </thead>
         <tbody> 
         <?php
			$ret=mysqli_query($con,"select *from  tblservices");
			$cnt=1;
			while ($row=mysqli_fetch_array($ret)) {

		?>
         <tr>
            <td scope="row"><?php echo $cnt;?></td>
            <td><?php  echo $row['ServiceName'];?></td> 
			<td><?php  echo $row['Cost'];?></td> 
			<td><input type="checkbox" name="sids[]" value="<?php  echo $row['ID'];?>" ></td> 
        </tr>
            <?php 
				$cnt=$cnt+1;
			}?>
            
				
						
				

			
      </tbody> 
      </table>
     
      <input type="submit" class="sub-btn" name="submit" value="Submit">
   </div>
      </form>

</div>


</body>
</html>
