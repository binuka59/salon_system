<?php

@include 'config.php';
@include 'admin_head.php';


session_start();
// if (strlen($_SESSION['bpmsaid']==0)) {
// 	header('location:logout.php');
// 	} else{
  


?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>view invoice</title>

	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<!-- custom css file link  -->
	
	<link rel="stylesheet" href="css/view.css">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	

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
		

		
		
	<div class="appoint-display" id="page-wrapper">
    <h3 class="heading"> Invoice<span> Lists</span></h3>
      <table class="display-table" width="100%" border="1">
    
        <th class="topic">#</th> 
	    <th class="topic">Invoice Id</th> 
		<th class="topic">Customer Name</th> 
		<th class="topic">Invoice Date|time</th> 
		<th class="topic">Action</th>
	 
     <?php
        $ret=mysqli_query($con,"select distinct tblcustomers.Name,tblinvoice.BillingId,tblinvoice.PostingDate from  tblcustomers   
		join tblinvoice on tblcustomers.ID=tblinvoice.Userid  order by tblinvoice.ID desc");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

     ?>
     <tr> 
        <th scope="row"><?php echo $cnt;?></th> 
		<td><?php  echo $row['BillingId'];?></td>
		<td><?php  echo $row['Name'];?></td>
		<td><?php  echo $row['PostingDate'];?></td> 
		<td><a href="view_invoice.php?invoiceid=<?php  echo $row['BillingId'];?>">View</a></td> 

	</tr>
    <?php 
        $cnt=$cnt+1;
        }?>
     </table>

 
 
      
  
 </div>

	</body>
</html>

