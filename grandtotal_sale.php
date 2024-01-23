<?php

@include 'config.php';
@include 'admin_head.php';


session_start();
error_reporting(0);


?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>calculate today sale</title>

	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<!-- custom css file link  -->
	<link rel="stylesheet" href="css/dit.css">
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
		

		<h3 class="heading"> Today sales<span> Lists</span></h3>
		
	<div class="appoint-display">
    
      <table class="display-table" >
    
        <th class="topic">#</th> 
	    <th class="topic">Service Name</th> 
        <th class="topic">Date/Time</th> 
		<th class="topic">Cost</th> 
		


      <?php
             //Total Sale
             $query9=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost,tblservices.ServiceName,tblinvoice.PostingDate
             from tblinvoice 
             join tblservices  on tblservices.ID=tblinvoice.ServiceId");
			$cnt=0;
            $todysale=0;
			
            while($row9=mysqli_fetch_array($query9))
            {
               $total_sale=$row9['Cost'];
               $totalsale+=$total_sale;
				?>
     <tr> 
        <th scope="row"><?php echo $cnt;?></th>
		<td><?php  echo $row9['ServiceName'];?></td> 
		<td><?php  echo $row9['PostingDate'];?></td>
		<td>RS:<?php  echo $row9['Cost'];?>/</td>
			
		</tr>

	
   
    <?php 
        $cnt=$cnt+1;
      
        }?>
		<tr>
       <td colspan="3" class="cols">Total of  sales:</td><td  class="cols"> RS:<?php  echo   $totalsale;?>/</td> 
		</tr>
     </table>

 
 
      
  
 </div>

	</body>
</html>
