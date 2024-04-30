<?php include('layouts/header.php'); ?>
<?php


 include('server/connection.php'); 

 if(!isset($_SESSION['logged_in'])){
    header('location: typelogin.php');
    exit;
 }

 if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;
  }
 }

 if(isset($_POST['change_password'])){
    $password= $_POST['password'];
    $confirmPassword= $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];

      //if passwords don't match
    if($password != $confirmPassword){
      header('location: account.php?error=Confirm Password dont match with previous Password');
 

      //if password is less than 6 character 
    }else if(strlen($password)<6){
      header('location: account.php?error=Password must be at least 6 Characters');

    }else{ //no errors

      $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
      $stmt->bind_param('ss',md5($password),$user_email);

      if($stmt->execute()){
        header('location: account.php?message=Password has been updated successfully!');
      }
      else{
        header('location: account.php?error=Could not update password :(');
      }

    }

 }

 //get orders
 if(isset($_SESSION['logged_in'])){

    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT * FROM orders where user_id=?");

    $stmt->bind_param('i',$user_id);

    $stmt->execute();

    $orders= $stmt->get_result();

 }

?>



  <!-- Account -->

  <section id="account" class="my-5 pt-5">
    <img src="assets/imgs/account-bg.jpg" alt="" class="img-fluid">
    
<div class="row container mx-auto my-5 py-5">
    
    <div class="col-lg-6 col-md-12 col-sm-12 text-center mt-3 pt-5">
    <p class="text-center" style="color:green"><?php if(isset($_GET['register_success'])){echo $_GET['register_success'];}?></p>
    <p class="text-center" style="color:green"><?php if(isset($_GET['login_success'])){echo $_GET['login_success'];}?></p>
       
        <h3 class="font-weight-bold">Account Info</h3>
        <hr class="mx-auto">
        <div class="account-info bg-primary text-white font-weight-bold p-5 rounded-pill">
            <p>Name: <span><?php if(isset($_SESSION['user_name'])) { echo $_SESSION['user_name'];}?></span></p>
            <p>Email: <span><?php if(isset($_SESSION['user_email'])) {echo $_SESSION['user_email'];}?></span></p>
            <p><a href="#orders" id="order-btn" class="btn btn-light">Your Orders</a></p>
            <p><a href="account.php?logout=1" id="logout-btn" class="btn btn-light">Logout</a></p>
        </div>
    </div>

    <!-- change password -->

    <div class="col-lg-6 col-md-12 col-sm-12">
        <form action="account.php" method="POST" id="account-form">
          <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
          <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){echo $_GET['message'];}?></p>
            <h3>Change Password</h3>
            <hr class="mx-auto">
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="account-password" class="form-control" 
               name="password" placeholder="Enter Your new password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" id="account-password-confirm" class="form-control" 
               name="confirmPassword" placeholder="Confirm Your new password">
            </div>
            <div class="form-group">
                <input type="submit" id="change-pass-btn" class="btn" value="Change Password" name="change_password">
            </div>
        </form>
    </div>
</div> 
</section>

<!-- Account ends -->


 <!-- orders -->

 <section id="orders" class="orders container-fluid my-5 py-3">
    <div class="container mt-5">
        <h2 class="font-weight-bolde text-center" style="color:   rgb(8, 51, 116);">Your Orders</h2>
        <hr class="mx-auto">
    </div>
      <table class="mt-5 pt-5">
      <tr>
          <th>Order Id</th>
          <th>Order Cost</th>
          <th>Order Status</th>
          <th>Order Date</th>
          <th>Order Details</th>

      </tr>

      <?php while($row = $orders->fetch_assoc()){?>

                <tr>
                    <td>
                        <div>
                            <!-- <img src="assets/imgs/p1.jpg" alt=""> -->
                            
                        </div>

                        <span><?php echo $row['order_id']; ?></span>

                    </td>

                    <td>
                      
                        <span><?php echo $row['order_cost']; ?></span>
                    </td>
                    
                    <td>
                      
                      <span><?php echo $row['order_status']; ?></span>
                    </td>

                    <td>
                      
                      <span><?php echo $row['order_date']; ?></span>
                    </td>

                    <td>
                      <form method="POST" action="order_details.php">
                      <input type="hidden" value="<?php echo $row['order_status'];?>" name="order_status">
                        <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id">
                        <input class="btn order-details-btn" name="order_details_btn" type="submit" value="details" >
                      </form>
                    </td>
                    
                </tr>
      <?php } ?>


      </table>

  </section>


<!-- orders ends -->



<?php include('layouts/footer.php'); ?>