<?php include("include/top.php");
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
          <div id="btn"></div>
          <div class="toggle-btn"><p class="text-center pt-3">Register</p></div>
          </div><!--button-box end-->
         
            <form id="register" class="input-group" action="register.php" method="post">
                <input type="text" class="input-field" placeholder="Full-Name" required name="fullname">
                <input type="text" class="input-field" placeholder="Email" required  name="email"  id="email">
                <input type="password" class="input-field" placeholder="Password" required  name="password"  id="pass" onkeypress="isInputNumber(event)">
                <small  style="color:#999">Just Insert Number for password</small>
                <input type="text" class="input-field" placeholder="Phone Number" required  name="phone">
                <textarea  class="input-field" placeholder="Address" required  name="address" ></textarea>
                <button type="submit" class="submit-btn" name="submit">Register </button>
            </form>
        </div>
       
       </div><!--hero end -->
        
     </div><!--row end -->
   
   </div><!--container end -->
   
   
   
   <?php include("include/footer.php");?>


<?php
   
    if(isset($_POST['submit'])){
        $sender_name = $_POST['fullname'];
        $sender_email = $_POST['email'];
        $sender_password = $_POST['password'];
        $sender_phone = $_POST['phone'];
        $sender_address = $_POST['address'];
        $insert_message = "insert into register (fullname,email,password,phone,address,date)
        values('$sender_name','$sender_email',' $sender_password','$sender_phone','$sender_address',NOW())";
      
        $run_message = mysqli_query($con,$insert_message);
        if($run_message){
            echo "<script>alert('Registration completed successfully')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
       }
    
?>