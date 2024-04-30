<?php include('layouts/header.php'); ?>
<?php

include('server/connection.php');

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;

}

if(isset($_POST['login_btn'])){

  $email=$_POST['email'];
  $password = md5($_POST['password']);

  $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email = ? AND user_password = ? LIMIT 1");

  $stmt->bind_param('ss',$email,$password);

  if($stmt->execute()){
    $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
    $stmt->store_result();
    if($stmt->num_rows() == 1){
      $stmt->fetch();

      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_email'] = $user_email;
      $_SESSION['logged_in'] = true;

      header('location: account.php?login_success=Logged in Successfully!');


    }else{
      header('location: login.php?error=Could not verify your account :(');
    }
  }else{
    //error
    header('location: login.php?error=Something went wrong :(');
  }



}


?>





  <!-- login -->

<section class="my-5 py-5">
   
    <div class="mx-auto container mt-3 pt-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="container text-center">
                    <h2 class="font-weight-bold text-primary">LOGIN</h2>
                </div>
        <form action="login.php" method="POST" id="login-form">
            <?php if(isset($_GET['cartcheckerror'])) {  ?>
        <p class="text-center" style="color:red ;" ><?php echo $_GET['cartcheckerror'] ?></p>
    <?php } ?>
          <p style="color:red" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];}?>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" id="login-email" name="email" placeholder="Enter Your Email" required>
            </div>

            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" id="login-password" name="password" placeholder="Enter Your Password" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn" id="login-btn"  name="login_btn" value="Login">
            </div>

            <div class="form-group">
                <a href="register.php" id="register-url" class="btn">Don't have an account? <br>Register Now!</a>
            </div>

        </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mt-5">
            <img src="assets/imgs/login-bg.jpg" alt="" class="img-fluid">
        </div>
</div>
    </div>

</section>

<!-- login ends -->




<?php include('layouts/footer.php'); ?>