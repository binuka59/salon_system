<?php

@include 'config.php';

session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>රූ salon</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">
   <?php include "user_head.php";?>

   
</head>
</head>

<body>

<!-- header -->
    <div class="Section_top">

       
         <section class="home" id="homes">

            <div class="content">
                <span>......Welcome......</span>
                <h3>We make <br><span1> hair beautiful </span1><br> & unique ...</h3>
            </div>
        
        </section>
        
    </div> 

<!-- home -->

<!--          ===========================================about us      ================================================== -->

<section class="about" id="about">

    <h1 class="heading">About us</h1>

    <div class="row" >

        <div class="content">

            <h3 class="title">Introduction</h3>
            <p>Ru salon Is a private salon located at Mawathagama and its owner Mr.Rumesh Ekanayake.
            At present, in the salon conducts cut hair and cut beard and tattooing. At present the staff 
            of this salon is very diligent in many of the above functions and the stationery is also used 
            extensively for this purpose. This system is designed to facilitate the above salon this 
            condition.</p>
            <h3 class="title">Mission</h3>
            <p>Our mission is to help clients express their individual styles with outsiding salon services while making them feel among friends.</p>        
            <p>our aim is to provide a comfortable and relaxing atmosphere to every client where their needs and met and expectations are surpassed.</p>
            
            <div class="icons-container">
                <div class="icons">
                   <img src="images/about-icon-1.png" alt="">
                   <h4>Professional Tools</h4>
                   <a href="profetional.php"><button>Read more</button></a>
                </div>
                <div class="icons">
                   <img src="images/about-icon-2.png" alt="">
                   <h4>Quality Products</h4>
                   <a href="Quality.php"><button>Read more</button></a>
                </div>
                <div class="icons">
                   <img src="images/about-icon-3.png" alt="">
                   <h4>Hair Washing</h4>
                   <a href="Hair.php"><button>Read more</button></a>
                </div>
             </div>
        </div>

    </div>

</section>

<!-- about us end -->

<section class="services" id="services">

    <h1 class="heading">Choose your styles</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/services-2.jpg" alt="">
            <div class="content">
                <a href="style_wedding.php"><h3>wedding styles </h3></a>
            </div>
        </div>

        

        <div class="box">
            <img src="images/q.png" alt="">
            <div class="content">
                <a href="style_haircut.php"><h3>manly haircut</h3></a>
            </div>
        </div>

        <div class="box">
            <img src="images/services-4.jpg" alt="">
            <div class="content">
                <a href="style_beard.php"><h3>beard trimming</h3></a>
            </div>
        </div>

        <div class="box">
            <img src="images/o (2).jpg" alt="">
            <div class="content">
                <a href="style_hair.php"><h3>Hair styling</h3></a>
            </div>
        </div>

    </div>

</section>


<!------------------------------------------------------------------ pricing---------------------------------------------------------->


<section class="pricing" id="pricing">

    <h1 class="heading">Offers and Pricing</h1>
    
<?php

$select = mysqli_query($con, "SELECT * FROM tbloffers ");

?>
    <div class="box-container">
    
    <?php
    while($row = mysqli_fetch_assoc($select)){ 
            if($row['id']=='1'){
                
                $total=0;
                $total=$row['cost1']+$row['cost2']+$row['cost3']+$row['cost4'];
                ?>

    
        <div class="box">
          <h3 class="title">Basic</h3>
            <div class="price">
                <span class="currency">LKR </span>
                <span class="amount"><?php echo ($total/100)*$row['discount']?></span>
                
            </div>
          <ul>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer1']; ?></li>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer2']; ?> </li>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer3']; ?></li>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer4']; ?></li>
          </ul> 
          <a href="basic.php"><button>book a visit</button></a>
        </div>
        <?php } elseif($row['id']=='2'){  
            
            $total=0;
            $total=$row['cost1']+$row['cost2']+$row['cost3']+$row['cost4'];
            ?>
   
        <div class="box">
          <h3 class="title">Standard</h3>
            <div class="price">
                <span class="currency">LKR</span>
                
                <span class="amount"><?php echo ($total/100)*$row['discount']?></span>
            </div>
          <ul>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer1']; ?></li>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer2']; ?> </li>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer3']; ?></li>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer4']; ?></li>
          </ul>
 
          
          <a href="Standard.php"><button>book a visit</button></a>
        </div>
            <?php } elseif($row['id']=='3'){
                
                $total=0;
                $total=$row['cost1']+$row['cost2']+$row['cost3']+$row['cost4'];
                ?>
        <div class="box">
          <h3 class="title">Premium</h3>
            <div class="price">
                <span class="currency">LKR</span>
                
                <span class="amount"><?php echo ($total/100)*$row['discount']?></span>
            </div>
          <ul>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer1']; ?></li>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer2']; ?> </li>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer3']; ?></li>
                <li> <i class="fas fa-scissors"></i> <?php echo $row['offer4']; ?></li>


          </ul>
          
          <a href="Premium.php"><button>book a visit</button></a>
        </div>
        <?php } ?>
      
      
        
              
            
         
      <?php } ?>
    
       
    </div>
   
</section>

<!-- pricing end -->

<?php @include 'footer.php';?>


    <script src="js/script1.js"></script>
    <script src="js/script2.js"></script>
</body>

</html>