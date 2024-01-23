<?php

@include 'config.php';
@include 'appointment_head.php';


session_start();
error_reporting(0);

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   #header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>appointment</title>

	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<!-- custom css file link  -->
	
	<link rel="stylesheet" href="css/appoinments.css">
	

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
			
			$select = mysqli_query($con, "SELECT * FROM tblcustomers");
			   
			?>

		

		
			
		<div class="product-display">
		<h3 class="heading">All <span> Appointment</span></h3>
			<table class="product-display-table">
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
					$ret=mysqli_query($con,"select *from  tblappointment");
					$cnt=1;
					while ($row=mysqli_fetch_array($ret)) { 
						?>
				<tr>
					
					<td scope="row"><?php echo $cnt;?></td> 
					<td><?php  echo $row['AptNumber'];?></td> 
					<td><?php  echo $row['Name'];?></td>
					<td><?php  echo $row['PhoneNumber'];?></td>
					<td><?php  echo $row['AptDate'];?></td>
					<td><?php  echo $row['AptTime'];?></td> 
						

					<td>
						<a href="view-appointment.php?viewid=<?php echo $row['ID'];?>" class="edit-btn"> <i class="fas fa-eye"></i> View</a>
					</td>
					
				</tr>
					<?php
						$cnt=$cnt+1;
						
					}?>

			</tbody> 
			</table>
		</div>




	</body>
</html>