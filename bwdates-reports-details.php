
<?php

@include 'config.php';
@include 'report_head.php';


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
  
   <link rel="stylesheet" href="css/reports.css">

</head>
<body>

   
<div class="container">

   <div class="appoint-display">

     
      <form method="post" name="bwdatesreport"  action="bwdates-reports-details.php" enctype="multipart/form-data">
            <h3>Between Date<span> report</span></h3>
            <?php
                $fdate=$_POST['fromdate'];
                $tdate=$_POST['todate'];

            ?>
            <h5 align="center" ><span>Report from </span><?php echo $fdate?><span> to </span><?php echo $tdate?></h5>
            <table class="display-table"> 
				<thead> 
                    <tr> 
						<th>#</th> 
						<th>Invoice Id</th> 
					    <th>Customer Name</th> 
						<th>Invoice Date</th> 
						<th>Action</th>
					</tr> 
				</thead>
                 <tbody>
                        <?php
                        $ret=mysqli_query($con,"select distinct tblcustomers.Name,tblinvoice.BillingId,tblinvoice.PostingDate from  tblcustomers   
                            join tblinvoice on tblcustomers.ID=tblinvoice.Userid  where date(tblinvoice.PostingDate) between '$fdate' and '$tdate'");
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
                 </tbody>
          </table> 
            
      </form> 

   </div>

  

</div>


</body>
</html>