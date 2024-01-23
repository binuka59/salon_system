<?php

@include 'config.php';
@include 'report_head.php';


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
<!DOCTYPE HTML>
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
           
	        $invid=intval($_GET['invoiceid']);
            $ret=mysqli_query($con,"select DISTINCT  tblinvoice.PostingDate,tblcustomers.Name,tblcustomers.Email,tblcustomers.MobileNumber,tblcustomers.Gender
                from  tblinvoice 
                join tblcustomers on tblcustomers.ID=tblinvoice.Userid 
                where tblinvoice.BillingId='$invid'");
            $cnt=1;
            $gtotal=0;
            while ($row=mysqli_fetch_array($ret)) {

        ?>
	<div class="appoint-display" id="exampl">
    <h3 class="heading">view <span> invoice</span></h3>
    <center>
    <h4>Ru salon</h4>
    <h4>Kandy road, Mawathagama.</h4>
    <h4>011-4567898 / 077-2004005</h4>

    <h4><span>Invoice  number :</span><?php echo $invid;?></h4>
    </center>
      <table class="display-table" width="100%" border="1">
         <th colspan="2"class="topic">Customer Details</th>
            <tr> 
			    <th>Name</th> 
					<td><?php echo $row['Name']?></td> 
			</tr>

            <tr> 
                <th>Contact no.</th> 
					<td><?php echo $row['MobileNumber']?></td>
			</tr> 
            <tr>
                <th>Email </th> 
				    <td><?php echo $row['Email']?></td>
            </tr>

            <tr>
                <th>Gender</th> 
				 <td><?php echo $row['Gender']?></td> 
            </tr>

            <tr>
             <th>Invoice Date</th> 
				<td colspan="3"><?php echo $row['PostingDate']?></td> 
            </tr>

        
     </table>

 <table class="invoice-table"width="100%" border="1">
    <thead>
    
        <th colspan="3" class="topic">Services Details</th>	
   
     <tr>
        <th>#</th>	
        <th>Service</th>
        <th>Cost</th>
     </tr>
   </thead>
   
        <?php
        $ret=mysqli_query($con,"select tblservices.ServiceName,tblservices.Cost  
            from  tblinvoice 
            join tblservices on tblservices.ID=tblinvoice.ServiceId 
            where tblinvoice.BillingId='$invid'");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {
            ?>
        <tr>
         <th><?php echo $cnt;?></th>
             <td><?php echo $row['ServiceName']?></td>	
            
             <td><?php echo $subtotal=$row['Cost']?></td>
        </tr>
            <?php 
            $cnt=$cnt+1;
            $gtotal=$gtotal+$subtotal;
            } ?>
        <tr>
            <th colspan="2" style="text-align:center">Grand Total</th>
            <th><?php echo $gtotal?></th>	

        </tr>
        
    </table>
    <center>
        <h4>Thank you  Come again.....</h4>
        </center>
    <p style="margin-top:1%"  align="center">
            <i class="fa fa-print fa-2x" style="cursor: pointer;"  OnClick="CallPrint(this.value)" ><span> print</span></i>
    </p>
   
    <script>
        function CallPrint(strid) 
        {
            var prtContent = document.getElementById("exampl");
            var WinPrint = window.open('b', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }
    </script>
 
      
  
 </div>

	</body>
</html>
<?php }?>