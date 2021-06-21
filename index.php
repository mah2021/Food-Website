<?php
session_start();
 include("function/func.php");
 include("include/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;500&family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="css/lightbox.min.css" rel="stylesheet" />
    <script  type="text/javascript"  src="js/lightbox-plus-jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
      <title>Food & Drink | Home</title>
</head>
<body>
    <!-- header section starts  -->

<header>

    <a href="#" class="logo"><img src="Images/logo.png" alt=""></a>

    <div id="menu-bar" class="fas fa-hamburger"></div>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="#home">home</a></li>
            <li><a href="#menu">menu</a></li>
            <li><a href="#popular">popular</a></li>
            <li><a href="#order">Contact</a></li>
            <li><a href="register.php">Register&nbsp;<i class="fas fa-user"></a></i></li>
           
            <?php
            if(isset($_GET['email'])){
             echo "<li><a href='logout.php'> ". $_GET['email']."</a></li> ";
             }
            else{
             echo"
            <li><a href='login.php'>Login&nbsp;<i class='fas fa-sign-in-alt'></a></i></li>
          ";
            }
            ?>
           
        </ul>
    </nav>

</header>

<!-- header section ends -->
<!-- home section start -->
<section class="home" id="home">
    <div class="container"><!--CONTAINER START-->
        <div class="row"><!--row start-->
            <div class="col-lg-6"><!--col-lg-6 start-->
                <div class="home-content"><!--home-content start-->
                  <h1>We belive good food<br> offer great smile</h1>
                  <a href="#popular" class="btn mybtn1"> get started</a>
                </div><!--home-content end -->
            </div><!--col-lg-6 end-->
            <div class="col-lg-6 order-first order-lg-last">
                <div class="home-img">
                    <img src="Images/back.jpg">
                </div>
            </div>
    
        </div><!--row end-->
    </div><!--CONTAINER END-->
</section>
<!-- home section ends -->
<section class="menu" id="menu"><!--menu section start-->
    <h1 class="heading"> Special Menu</h1>
    <div class="container"><!--container start-->
    <div class="box"><!--box start-->
      <img class="image" src="Images/s-img-1.png">
      <div class="content"><!--content start-->
        <img src="Images/s-1.png">
        <h3>tasty main food</h3>
        <p>   Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, adipisci, ab sit sapiente necessitatibus vitae autem dignissimos eligendi, porro recusandae repellat saepe voluptatem quas harum quis aperiam consequuntur quod perferendis.</p>
      </div><!--content end-->
    </div><!--box end-->
    <div class="box"><!--box start-->
        <img class="image" src="Images/s-img-2.jpg">
        <div class="content"><!--content start-->
          <img src="Images/s-2.png">
          <h3>tasty pizza</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi inventore soluta nam harum, quisquam architecto amet, praesentium facere quo officiis error ex! Eius qui fugiat minima, ipsum delectus repellendus quibusdam?</p>
        </div><!--content end-->
      </div><!--box end-->
      <div class="box"><!--box start-->
        <img class="image" src="Images/s-img-6.jpg">
        <div class="content"><!--content start-->
          <img src="Images/s-6.png">
          <h3>healthy breakfast</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi inventore soluta nam harum, quisquam architecto amet, praesentium facere quo officiis error ex! Eius qui fugiat minima, ipsum delectus repellendus quibusdam?</p>
        </div><!--content end-->
      </div><!--box end-->
      <div class="box"><!--box start-->
        <img class="image" src="Images/s-img-4.jpg">
        <div class="content"><!--content start-->
          <img src="Images/s-4.png">
          <h3>cold drinks</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi inventore soluta nam harum, quisquam architecto amet, praesentium facere quo officiis error ex! Eius qui fugiat minima, ipsum delectus repellendus quibusdam?</p>
        </div><!--content end-->
      </div><!--box end-->
      <div class="box"><!--box start-->
        <img class="image" src="Images/s-img-5.jpg">
        <div class="content"><!--content start-->
          <img src="Images/s-5.png">
          <h3>tasty sweets</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi inventore soluta nam harum, quisquam architecto amet, praesentium facere quo officiis error ex! Eius qui fugiat minima, ipsum delectus repellendus quibusdam?</p>
        </div><!--content end-->
      </div><!--box end-->
      <div class="box"><!--box start-->
        <img class="image" src="Images/s-img-3.jpg">
        <div class="content"><!--content start-->
          <img src="Images/s-3.png">
          <h3>cold ice-cream</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi inventore soluta nam harum, quisquam architecto amet, praesentium facere quo officiis error ex! Eius qui fugiat minima, ipsum delectus repellendus quibusdam?</p>
        </div><!--content end-->
      </div><!--box end-->
      
  </div><!--container end-->
</section><!--menu section end-->

<!-- popular section starts  -->
<section class="popular" id="popular">

    <h1 class="heading"> most <span>popular</span> foods </h1>
    <div class="box-container">
      
      
          <?php  
          getfood();
          ?>
         
       
     
    
    <?php
    if(isset($_GET['email'])){
      echo"
      <div class='col-md-12' style='margin-left:50px'>
      <a href='food.php?email=".$_GET['email']."'><button class='btn mybtn3'>See More Foods</button></a>
      </div>";
      }
    else{
      echo"
      <div class='col-md-12' style='margin-left:50px'>
      <a href='food.php'><button class='btn mybtn3'>See More Foods</button></a>
      </div>";
      }
    ?>
    </div>
    
    </section>
    
    <!-- popular section ends -->
<!-- steps section starts  -->

<div class="step-container">

  <h1 class="heading">how it <span>works</span></h1>

  <section class="steps">

      <div class="box">
          <img src="images/step-1.jpg" alt="">
          <h3>choose your favorite food</h3>
      </div>
      <div class="box">
          <img src="images/step-2.jpg" alt="">
          <h3>free and fast delivery</h3>
      </div>
      <div class="box">
          <img src="images/step-3.jpg" alt="">
          <h3>easy payments methods</h3>
      </div>
      <div class="box">
          <img src="images/step-4.jpg" alt="">
          <h3>and finally, enjoy your food</h3>
      </div>
  
  </section>

</div>

<!-- steps section ends -->
<!-- order section starts  -->

<section class="order" id="order">

  <h1 class="heading"> make an <span>contact</span> </h1>
  <div class="container">
     <div class="row">
  
      <form action="index.php#order" method="post" data-aos="fade-right">
          <input type="text" placeholder="your name" class="box" name="name">
          <input type="email" placeholder="your email" class="box" name="email">
          <input type="text" placeholder="title" class="box" name="title">
          <textarea cols="30" rows="10" class="box address" placeholder="Message" name="message"></textarea>
          <button type="submit"  class="btn mybtn2" name="submit">send now </button>
      </form>
<!-- php start -->
<?php
include("include/db.php");
if(isset($_POST['submit'])){
  $sender_name = $_POST['name'];
  $sender_email = $_POST['email'];
  $sender_title = $_POST['title'];
  $sender_message = $_POST['message'];
  $insert_message = "insert into contact (name,email,title,message,date)
  values('$sender_name','$sender_email',' $sender_title',' $sender_message',NOW())";

  $run_message = mysqli_query($con,$insert_message);
  if($run_message){
      echo "<script>alert('Your Message sent for us , Thank you very much ')</script>";
      echo "<script>window.open('index.php#order','_self')</script>";
  }
 }
?>
<!--php end -->
      <div class="image" data-aos="fade-left">
          <img src="Images/waitress.jpg" alt="">
      </div>
  
     </div>
  </div>
  </section>
  
  <!-- order section ends -->

  <section class="footer">

    <div class="social-media">
    <a href="images/facebook.png" data-lightbox="mygallery" ><i class="fab fa-facebook"></i></a>
    <a href="images/whatsapp.png" data-lightbox="mygallery" ><i class="fab fa-whatsapp"></i></a>
    <a href="images/telegram.png" data-lightbox="mygallery" ><i class="fab fa-telegram"></i></a>
    <a href="images/linkedin.png" data-lightbox="mygallery" ><i class="fab fa-linkedin"></i></a>
     
    </div>

    <h1 class="credit"> created by <span> Mahboubeh Kianifard </span> </h1>

</section>





<!--script-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>



