<?php include("include/top.php");
      include("function/func.php");
      include("include/db.php");
?>
<style>
  @media (max-width:991px) {
    .form-box{
       margin:50% auto;
    }
  }
  @media (max-width:776px) {
    .form-box{
       margin:50% auto;
    }
  }
</style>
<div class="container-fluid" ><!--container start -->
  <div class="row"><!--row start -->
    <div class="hero"><!--hero start -->
        <div class="form-box">
          <div class="button-box"><!--button-box start-->
         
             <div class="toggle-btn"><p class="text-center pt-3">Log In</p></div>
         
          </div><!--button-box end-->
              <form id="login" class="input-group" action="login.php" method="post">
                <input type="text" class="input-field" placeholder="Email" required  name="email">
                <input type="password" class="input-field" placeholder="Password" required name="password" id="myInput">
                        <span class="eye" style="position:absolute;top:80px;right:0" onclick="myfunction()">
                        <i id="hide2" class="fas fa-eye-slash"></i>
                        <i id="hide1" class="fas fa-eye" style="display:none;"></i>
                       </span>
               
                <a href="#" class="forget">Forget My Password</a>
                <button type="submit" class="submit-btn" name="submit">Log in </button>
              </form>
        </div>
       
    </div><!--hero end -->
     
  </div><!--row end -->

</div><!--container end -->



<?php include("include/footer.php");?>
<?php
if(isset($_POST['submit'])){
    
    $register_username = $_POST['email'];
    $register_password = $_POST['password'];
    $select_customer ="select * from register where email='$register_username' AND password='$register_password'";
    $run_customer = mysqli_query($con,$select_customer);
    $get_ip = getRealIpUser();
    $check_customer = mysqli_num_rows($run_customer);
    $select_cart="select * from cart where ip_add='$get_ip'";
    $run_cart = mysqli_query($con,$select_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_customer==0){
        echo "<script> alert('Your email or password is wrong') </script>";
        exit();
    }
    else 
         {
            $_SESSION['email']=$register_username;
            echo "<script>window.open('index.php?email=".$_SESSION['email']."#popular','_self')</script>";
        }
           
}

?>