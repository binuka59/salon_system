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
		
		<th class="topic">Cost</th> 
		


      <?php
            //todays sale
            $ret=mysqli_query($con,"select tblinvoice.ServiceId as ServiceId, tblservices.Cost,tblservices.ServiceName,tblservices.CreationDate
            from tblinvoice 
            join tblservices  on tblservices.ID=tblinvoice.ServiceId where date(PostingDate)=CURDATE();");
			
			$cnt=0;
            $todysale=0;
			
            while($row=mysqli_fetch_array($ret))
            {
			
				
               $todays_sale=$row['Cost'];
               $today_serv=$row['ServiceName'];
               $today_name=$row['gender'];
               
               $todysale+=$todays_sale;

				?>
     <tr> 
        <th scope="row"><?php echo $cnt;?></th>
		<td><?php  echo $row['ServiceName'];?></td> 
		
	
		<td>RS:<?php  echo $row['Cost'];?>/</td>
			
		</tr>

	
   
    <?php 
        $cnt=$cnt+1;
      
        }?>
		<tr>
       <td colspan="2" class="cols">Total of Today sales:</td><td  class="cols"> RS:<?php  echo $todysale;?>/</td> 
		</tr>
     </table>

 
 
      
  
 </div>

	</body>
</html>
