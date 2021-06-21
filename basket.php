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
            <li><a href='login.php'>Login &nbsp;<i class='fas fa-sign-in-alt'></a></i></li>";
            }
            ?>
           
        </ul>
    </nav>

</header>

<!-- header section ends -->
<div id="content" style="margin-top:200px;height:70vh;"><!--content start-->
 
    <div class="container"><!--container start-->
     <div class="row">
        <div id="cart" class="col-md-9"><!--col-md-9 start-->
           <div class="box"><!--box start-->
            <form action="basket.php?email=<?php echo $_GET['email'] ; ?>" method="post" enctype="multipart/form-data">
                <h1> Cart</h1>
                <?php 
                global $con;
                 $username=$_GET['email'];
                 $connect_cart = "select * from cart where username='$username'";
                 $run_cart = mysqli_query($con,$connect_cart);
                 $count = mysqli_num_rows($run_cart);

                 ?>
                <p class="text-muted"> You Have <span style="color:red;"><?php  echo $count ; ?></span> Items in Your Cart </p>
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-danger  text-white">
                        <tr>
                           
                            <th >Food</th>
                            <th>Price</th>
                            <th>Number</th>
                            <th >Delete</th>
                            <th colspan="2">Total Price</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                       $total = 0;
                       while($row_cart = mysqli_fetch_array($run_cart)){
                      $id=$row_cart['id'] ;  
                      $username = $row_cart['username'];
                      $food = $row_cart['name'];
                      $price = $row_cart['price'];
                      $num= $row_cart['num'];
                    
                      $sub_total = $row_cart['price'] * $num;
                      $total += $sub_total;
                      
                    ?>
                        <tr>
                          
                            <td>
                            <?php echo $food;  ?>
                            </td>
                            <td>
                            <?php echo $price;  ?>
                            </td>
                            <td>
                            <?php echo $num;  ?>
                            </td>
                            <td>
                               <input type="checkbox" name="remove[]" value="<?php echo  $id;  ?>">
                            </td>
                            <td>
                            <?php echo $sub_total;  ?>
                            </td>
                        </tr>
                        <?php 
                          
                       }
                       ?>
                    </tbody>
                    <tfooter>
                        <tr>
                            <th colspan="5">Totla Price </th>
                            <th colspan="2" ><span dir="rtl"> € &nbsp;</span> <?php echo $total;  ?> </th>
                        </tr>
                    </tfooter>

                </table>
            </div>
            <div class="box-footer">
               <div class="left"  style="float:left;">
                   <a href="index.php?email=<?php echo $_GET['email'] ;?>" class="btn btn-success">
                     <i class="fa fa-chevron-left"></i>  continue Your Order
                   </a>
               </div>
               <div class="right" style="float:right">
               
                   <button type="submit" name="update"  class="btn btn-success">
                     <i class="fa fa-sync-alt"></i>  Update and Delete
                    </button>
                  
               </div>
            </div>
            </form>
           </div><!--box end-->
        </div><!--col-md-9 end-->

        <div class="col-md-3"><!--col-md-3 start-->
          <div id="order-summary" class="box" style="box-shadow:0px 1px 5px rgba(0, 0, 0, 0.2) ; box-sizing: border-box;">
              <div class="box-header">
                  <h3 class="text-center bg-warning">Your Order</h3>
              </div>
              <p class="text-muted text-center">
              Transport cost
              </p>
              <div class="table-responsive">
                  <table class="table">
                      <tbody>
                          <tr>
                              <td>Total</td>
                              <td dir="rtl" style="padding-right:20px"> € <?php echo $total; ?></td>

                          </tr>
                          <tr>
                              <td>
                              Transport cost
                              </td>
                              <td dir="rtl" style="padding-right:20px">€ 0</td>
                          </tr>
                          <tr class="total">
                              <td>
                                  Total
                              </td>
                              <td dir="rtl" style="padding-right:20px"> € <?php echo $total; ?></td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
        </div><!--col-md-3 end-->
       
    </div>
</div><!--container end-->
</div><!--content end-->
<br>
<br><br>

<?php include("include/footer.php"); ?>


<?php   
            function  update_cart(){
                global $con;
                if(isset($_POST['update'])){

                foreach($_POST['remove'] as $remove_id){
                    $delete_product = "delete from cart where id='$remove_id'";
                    $run_delete = mysqli_query($con,$delete_product);
                    if($run_delete){
                        echo "<script>window.open('basket.php?email=".$_GET['email']."','_self')</script>";
                    }
                }
            }
        }
       echo @$up_cart = update_cart();

        ?>