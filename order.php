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
      <title>Food & Drink | Order</title>
</head>
<body>
    <!-- header section starts  -->

<header>

    <a href="#" class="logo"><img src="Images/logo.png" alt=""></a>

    <div id="menu-bar" class="fas fa-hamburger"></div>

    <nav class="navbar">
        <ul>
            <li><a class="active" href="index.php?email=<?php echo $_GET['email']; ?>#home">home</a></li>
            <li><a href="index.php?email=<?php echo $_GET['email']; ?>#menu">menu</a></li>
            <li><a href="index.php?email=<?php echo $_GET['email']; ?>#popular">popular</a></li>
            <li><a href="index.php?email=<?php echo $_GET['email']; ?>#order">Contact</a></li>
            <?php
            if(isset($_GET['email'])){
             echo "<li><a href='logout.php'> ". $_GET['email']."</a></li> ";
            }
            else{
             echo"
            <li><a href='login.php'>Login&nbsp;<i class='fas fa-sign-in-alt'></a></i></li>";
            }
            ?>
               
        </ul>
    </nav>

</header>

<!-- header section ends -->
<?php
global $con;
if((isset($_GET['pro_id']))&&(isset($_GET['email']))){
$id=$_GET['pro_id'];
$username=$_GET['email'];
$get_products = "select * from food where id=$id";
$run_products = mysqli_query($con,$get_products);
while($row_products = mysqli_fetch_array($run_products)){
    $foodname = $row_products['name'];
    $price = $row_products['price'];
    echo"
        <section class='order' style='margin-top:200px;height:70vh;'>
        <div class='container'>
            <div class='row'>
        
                <form action='' method='post' data-aos='fade-right'>
                    <input type='text'  class='box' name='name' value='$username'>
                    <input type='text'  class='box' name='food'  value='$foodname'>
                    <input type='text'  class='box' name='price'  value='$price'>
                    <lable >Number of your order : </lable> <input type='number' class='box' name='num' min='1' value='1' style='width:300px;'>
                    
                    <input type='submit' name='submit' value='Check out' class='btn  mybtn2'>
                    
                </form>       
            <div class='image' data-aos='fade-left'>
                <img src='Images/order.jpg' >
            </div>
        
            </div>
        </div>
        </section>
        ";
    }
}
   
?>
<?php include("include/footer.php");?>






<?php
if(isset($_GET['email'])){
    if(isset($_POST['submit'])){
        global $con;
        $ip_add=getRealIpUser();
        $name=$_POST['name'];
        $food=$_POST['food'];
        $price=$_POST['price'];
        $num=$_POST['num'];
        $insert_food = "insert into cart (ip_add,username,name,price,num,date)
            values('$ip_add','$name',' $food','$price','$num',NOW())";
          
            $run_message = mysqli_query($con,$insert_food);
            if($run_message){
                echo "<script>window.open('basket.php?email=".$_GET['email']."','_self')</script>";
            }
    }
}


?>