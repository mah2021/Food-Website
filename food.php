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
      <title>Food & Drink | More Food</title>
</head>
<body>
    <!-- header section starts  -->

<header>

    <a href="#" class="logo"><img src="Images/logo.png" alt=""></a>

    <div id="menu-bar" class="fas fa-hamburger"></div>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="index.php#home">home</a></li>
            <li><a href="index.php#menu">menu</a></li>
            <li><a href="index.php#popular">popular</a></li>
            <li><a href="index.php#order">Contact</a></li>
            <?php
            if(isset($_GET['email'])){
             echo "<li><a href='logout.php'> ". $_GET['email']."</a></li> ";
            }
            else{
             echo"
            <li><a href='login.php'>Login&nbsp;<i class='fas fa-sign-in-alt'></a></i></li>";
            }
            ?>
            <li><a href="register.php">Register&nbsp;<i class="fas fa-user"></a></i></li>
           
        </ul>
    </nav>

</header>

<!-- header section ends -->

<section class="popular" style="margin-top:100px;">
   <div class="box-container">
         <?php  
          getfoodMore();
          ?>
         
   </div>   
    
</section>
    
    <!-- popular section ends -->
<?php include("include/footer.php"); ?>