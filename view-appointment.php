<?php

@include 'config.php';
@include 'appointment_head.php';


session_start();
error_reporting(0);

if(isset($_POST['submit']))
  {
    
      $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status=$_POST['status'];
     
    
     
   $query=mysqli_query($con, "update  tblappointment set Remark='$remark',Status='$status' where ID='$cid'");
    if ($query) {
    $msg="All remark has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>view appointment</title>

	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<!-- custom css file link  -->
	
	<link rel="stylesheet" href="css/view.css">
	

	</head>
	<body>

		<?php
			if(isset($message))
			{
				foreach($message as $message)
				{
					echo '<span class="message">'.$message.'</span>';
				}
			}

		?>
			   


		

		
		<?php
        $cid=$_GET['viewid'];
        $ret=mysqli_query($con,"select * from tblappointment where ID='$cid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

      ?>
	<div class="appoint-display">
   <h3 class="heading">view <span>  Appointment</span></h3>
      <table class="display-table">
         
         <th class="topic">Topic</th>
         <th class="topic">Data</th>
         
         <tr>
         <th>Appointment Number</th>
            <td><?php  echo $row['AptNumber'];?></td>
         </tr>

         <tr>
         <th>Name</th>
            <td><?php  echo $row['Name'];?></td>
         </tr>

         <tr>
         <th>Email</th>
            <td><?php  echo $row['Email'];?></td>
         </tr>

         <tr>
         <th>Mobile Number</th>
            <td><?php  echo $row['PhoneNumber'];?></td>
       </tr>

       <tr>
         <th>Appointment Date</th>
            <td><?php  echo $row['AptDate'];?></td>
       </tr>
   
       <tr>
         <th>Appointment Time</th>
            <td><?php  echo $row['AptTime'];?></td>
       </tr>
   
       <tr>
         <th>Services</th>
            <td><?php  echo $row['Services'];?></td>
       </tr>

       <tr>
         <th>Apply Date</th>
            <td><?php  echo $row['ApplyDate'];?></td>
       </tr>
   

       <tr>
         <th>Status</th>
         <td> <?php  
         if($row['Status']=="1")
         {
            echo "Selected";
         }

         if($row['Status']=="2")
         {
            echo "Rejected";
         }

         };?></td>
      </tr>

   </table>

   <table class="product-table">
         <?php if($row['Remark']==""){ ?>

      <form name="submit" method="post" enctype="multipart/form-data"> 
         <tr>
            <td>Remark :</td>
            <td><input type="text" name="remark" placeholder="Note this" rows="12" cols="14" class="fomr" required="true"></td>
      
         </tr>

         <tr>
            <td>Status :</td>
                <td>
                  <select name="status" class="fom" required="true" >
                     <option value="" selected="true">Select status here...</option>
                     <option value="1" >Selected</option>
                     <option value="2">Rejected</option>
                  </select>
               </td>
         </tr>

          
               <th colspan="2"><button type="submit" name="submit" class="btn">Submit</button></th>
               
    </form>
    
      <?php } else { ?>
 </table>


 <table class="table-table-bordered">
    <tr>
       <th>Remark</th>
         <td><?php echo $row['Remark']; ?></td>
     </tr>


    <tr>
       <th>Remark date</th>
          <td><?php echo $row['RemarkDate']; ?>  </td>
    </tr>

 </table>
      
  <?php } ?>
 </div>

	</body>
</html>
