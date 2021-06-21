<?php 
$con=mysqli_connect("localhost","root","","fooddb");


function getRealIpUser(){

    switch(true){
        case(!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
        case(!empty($_SERVER['HTTP_CLIENTL_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
        case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}



function  getfood(){
    global $con;
    $get_products = "select * from food LIMIT 0,6 ";
    $run_products = mysqli_query($con,$get_products);

    while($row_products = mysqli_fetch_array($run_products)){
        $pro_id = $row_products['id'];
        $pro_title = $row_products['name'];
        $pro_price = $row_products['price'];
        $pro_img = $row_products['image'];
        
        echo  "
        <div class='box' data-aos='fade-left'>
        <img src='Images/$pro_img'>
        <h3>$pro_title </h3>
        <div class='stars'>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
        </div>
        <div class='price'>€ $pro_price</div>";
        if(isset($_GET['email'])){
            echo"
        <a href='order.php?pro_id= $pro_id & email=".$_GET['email']."'><button class='btn mybtn2'>add to cart</button></a>";
        }
        else{
            echo"
            <a href='login.php'><button class='btn mybtn2'>add to cart</button></a>";
        }
        echo"
       </div>
        ";
        
      
    }
}


function  getfoodMore(){
    global $con;
    $get_products = "select * from food LIMIT 6,99 ";
    $run_products = mysqli_query($con,$get_products);

    while($row_products = mysqli_fetch_array($run_products)){
        $pro_id = $row_products['id'];
        $pro_title = $row_products['name'];
        $pro_price = $row_products['price'];
        $pro_img = $row_products['image'];
        
        echo  "
        <div class='box' data-aos='fade-left'>
        <img src='Images/$pro_img'>
        <h3>$pro_title </h3>
        <div class='stars'>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
        </div>
        <div class='price'>€ $pro_price</div>";
        if(isset($_GET['email'])){
            echo"
        <a href='order.php?pro_id= $pro_id & email=".$_GET['email']."'><button class='btn mybtn2'>add to cart</button></a>";
        }
        else{
            echo"
            <a href='login.php'><button class='btn mybtn2'>add to cart</button></a>";
        }
        echo"
       </div>
        ";
        
      
    }
}









?>