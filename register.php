<?php include('layouts/header.php'); ?>
<?php

include('server/connection.php');

//if useer has already registered, take them to account page directly
if(isset($_SESSION['logged_in'])){

  header('location: account.php');
  exit;


}


if(isset($_POST['register'])){

  $name = $_POST['name'];
  $email= $_POST['email'];
  $password= $_POST['password'];
  $confirmPassword= $_POST['confirmPassword'];

  //if passwords don't match
  if($password != $confirmPassword){
     header('location: register.php?error=Confirm Password dont match with previous Password');
  

  //if password is less than 6 character 
}else if(strlen($password)<6){
    header('location: register.php?error=Password must be at least 6 Characters');
  

 //if there is no error
}else{
  //check whether there is a user with this email or not
  $stmt1= $conn->prepare("SELECT count(*) FROM users where user_email=?");
  $stmt1->bind_param('s',$email);
  $stmt1->execute();
  $stmt1->bind_result($num_rows);
  $stmt1->store_result();
  $stmt1->fetch();

  //if there is a user already registered with this email
  if($num_rows != 0){
    header('location: register.php?error= User with this email already exists');
  
  
  //if no user registered with this name before
  }else{

      //create a new user
      $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
               VALUES (?,?,?)");

      $stmt->bind_param('sss',$name,$email,md5($password));
      
      //if account was created successfully
      if($stmt->execute()){
        $user_id = $stmt->insert_id;
        $_SESSION['user_id']=$user_id;
        $_SESSION['user_email']=$email;
        $_SESSION['user_name']=$name;
        $_SESSION['logged_in']=true;
        header('location: account.php?register_success=You registered successfully!');

        //account could not be created
      }else{
        header('location: register.php?error=Could not create an account at the moment.Try again!');
      }
  }
}

}

?>






  <!-- register -->

  <section id="register" class="my-5 py-5">
   
    <div class="mx-auto container mt-3 pt-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="container text-center">
                    <h1 style="color:rgb(128, 110, 254);">REGISTER</h1>
                </div>
        <form action="register.php" id="register-form" method="POST">
          <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="register-name" name="name" placeholder="Enter Your Name" required>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" id="register-email" name="email" placeholder="Enter Your Email" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" id="register-password" name="password" placeholder="Enter Your Password" required>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Your Password" required>
            </div>

            <div class="form-group">
                <input type="submit" class="btn" id="register-btn" name="register" value="Register">
            </div>

            <div class="form-group">
                <a href="" id="login-url"  href="login.php " class="btn">Do you already have an account? <br>Login Now!</a>
            </div>

        </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mt-5 pt-5">
            <img src="assets/imgs/register-bg.jpg" alt="" class="img-fluid">
        </div>
</div>
    </div>

</section>







<!-- regester ends -->


<?php include('layouts/footer.php'); ?>