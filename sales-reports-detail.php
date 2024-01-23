
<?php
session_start();
error_reporting(0);

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
    <?php
        $fdate=$_POST['fromdate'];
        $tdate=$_POST['todate'];
        $rtype=$_POST['requesttype'];
    ?>
    <?php if($rtype=='yrwise'){
         $year1=strtotime($fdate);
         $year2=strtotime($tdate);
         $y1=date("Y",$year1);
         $y2=date("Y",$year2);
    ?>

   <div class="appoint-display">

     
      <form method="post" name="bwdatesreport"  action="bwdates-reports-details.php" enctype="multipart/form-data">
            <h3>Sales Report <span> Month Wise</span></h3>
            <?php
                $fdate=$_POST['fromdate'];
                $tdate=$_POST['todate'];

            ?>
            <h5 align="center" >Sales Report  from <?php echo $y1;?> to <?php echo $y2;?></h5>
            
            <table class="display-table"> 
				<thead> 
                <tr>
                    <th>S.NO</th>
                    <th>Year </th>
                    <th>Sales</th>
                </tr>
				</thead>
                <?php
                     $ret=mysqli_query($con,"select year(PostingDate) as lyear,sum(Cost) as totalprice from  tblinvoice join tblservices on tblservices.ID= tblinvoice.ServiceId where date(tblinvoice.PostingDate) between '$fdate' and '$tdate' group by lyear");

                  $cnt=1;
                 while ($row=mysqli_fetch_array($ret)) {

                ?>
                 <tbody>
                     <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php  echo $row['lyear'];?></td>
                        <td><?php  echo $total=$row['totalprice'];?></td>
                    </tr>
                    <?php
                        $ftotal+=$total;
                        $cnt++;
                    }?>
                    <tr>
                    <td colspan="2" align="center">Total </td>
                    <td><?php  echo $ftotal;?></td>
                    </tr>
                 </tbody>
          </table>
 
        <?php } if($rtype=='mtwise'){
        $month1=strtotime($fdate);
        $month2=strtotime($tdate);
        $m1=date("F",$month1);
        $m2=date("F",$month2);
        $y1=date("Y",$month1);
        $y2=date("Y",$month2);
    ?>

   <div class="appoint-display">
        <form method="post" name="bwdatesreport"  action="bwdates-reports-details.php" enctype="multipart/form-data">
            <h3>Sales Report <span> Month Wise</span></h3>
            <?php
                $fdate=$_POST['fromdate'];
                $tdate=$_POST['todate'];

            ?>
            <h5 align="center" >Sales Report  from <?php echo $m1."-".$y1;?> to <?php echo $m2."-".$y2;?></h5>
            
            <table class="display-table"> 
				<thead> 
                <tr>
                    <th>S.NO</th>
                    <th>Month / Year </th>
                    <th>Sales</th>
                </tr>
				</thead>
                <?php
                    $ret=mysqli_query($con,"select month(PostingDate) as lmonth,year(PostingDate) as lyear,sum(Cost) as totalprice from  tblinvoice join tblservices on tblservices.ID= tblinvoice.ServiceId where date(tblinvoice.PostingDate)  between '$fdate' and '$tdate' group by lmonth,lyear");
                    $cnt=1;
                    while ($row=mysqli_fetch_array($ret)) {
                
                ?>
                 <tbody>
                     <tr>
                         <td><?php echo $cnt;?></td>
                         <td><?php  echo $row['lmonth']."/".$row['lyear'];?></td>
                         <td><?php  echo $total=$row['totalprice'];?></td>
                    </tr>
                    <?php  
                        $ftotal+=$total;
                        $cnt++;
                    
                    }?>
                    <tr>
                     <td colspan="2" align="center">Total </td>
                     <td><?php  echo $ftotal;?></td>
                    </tr>
                 </tbody>
          </table>
   
  
    <?php }?>
</div>
</div>

</body>
</html>