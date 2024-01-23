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
	<title>calculate yesterday  sale</title>

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
		

		<h3 class="heading"> yesterday sales<span> Lists</span></h3>
		
	<div class="appoint-display">
    
      <table class="display-table" >
    
        <th class="topic">#</th> 
	    <th class="topic">Service Name</th> 
		
		<th class="topic">Cost</th> 
		


		<?php
            //Yesterday's sale
            $query7=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost,tblservices.ServiceName
            from tblinvoice 
            join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE()-1;");
            $yesterdaysale=0;
            while($row7=mysqli_fetch_array($query7))
            {
               $yesterdays_sale=$row7['Cost'];
               $yesterdaysale+=$yesterdays_sale;

            
         ?>
           
		<tr> 
			<th scope="row"><?php echo $cnt;?></th>
			<td><?php  echo $row7['ServiceName'];?></td> 
			
		
			<td>RS:<?php  echo $row7['Cost'];?>/</td>
			
		</tr>

	
   
    <?php 
        $cnt=$cnt+1;
      
        }?>
		<tr>
       <td colspan="2" class="cols">Total of yesterday sales:</td><td  class="cols"> RS:<?php  echo $yesterdaysale;?>/</td> 
		</tr>
     </table>

 
 
      
  
 </div>

	</body>
</html>
