
<?php
session_start();
include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('location: index.php');
  exit;
}

if(isset($_POST['login_btn'])){
  $email = $_POST['email'];
  $password = $_POST['password']; // No need to hash the password here

  $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? LIMIT 1");
  $stmt->bind_param('s', $email);

  if($stmt->execute()){
    $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
    $stmt->store_result();
    if($stmt->num_rows() == 1){
      $stmt->fetch();

      // Compare plaintext passwords
      if($password == $admin_password) {
        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['admin_name'] = $admin_name;
        $_SESSION['admin_email'] = $admin_email;
        $_SESSION['admin_logged_in'] = true;

        header('location: index.php?login_success=Logged in Successfully!');
        exit;
      } else {
        // Passwords don't match
        header('location: login.php?error=Incorrect password :(');
        exit;
      }
    }else{
      // No user found with the provided email
      header('location: login.php?error=Could not verify your account :(');
      exit;
    }
  }else{
    // Error executing the query
    header('location: login.php?error=Something went wrong :(');
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="assets/imgs/logo.jpg">
  <title>Admin Login</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <!-- navbar -->

  <nav class="navbar fixed-top navbar-expand-lg navbar-light py-2 bg-white">
    <div class="container container-fluid">
      <img class="img-fluid" src="../assets/imgs/logo.jpg" alt="logo">
      <h2 class="logo">A.H. TECH</h2>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../shop1.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../cart.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart4"
                viewBox="0 0 16 16">
                <path
                  d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
              </svg>

              <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0) { ?>
                  <span class="cart-quantity"> <?php echo $_SESSION['quantity']; ?> </span<
                <?php }?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../account.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-person-plus" viewBox="0 0 16 16">
                <path
                  d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                <path fill-rule="evenodd"
                  d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
              </svg>
            </a>
          </li>

    

        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar end -->



    <!-- login -->

<section class="my-5 py-5">
   
   <div class="mx-auto container mt-3 pt-5">
       <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
               <div class="container text-center">
                   <h1 class="font-weight-bold" style="color: #390da0;">ADMIN</h1>
                   <h2 class="font-weight-bold" style="color:#390da0;">LOGIN</h2>
               </div>
            <form id="login-form" enctype="multipart/form-data" method="POST" action="login.php"> 
                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></p> 
                <div class="form-group mt-2 ">
                <label>Email</label>
                <input type="email" class="form-control" id="product-name" name="email" placeholder="Email">
                </div>
                <div class="form-group mt-2">
                <label>Password</label>
                <input type="password" class="form-control" id="product-desc" name="password" placeholder="Password">
                </div>
                <div class="form-group mt-3">
                <input type="submit" class="btn text-light" style="background-color:#390da0;" name="login_btn" value="Login"/>
                </div>
            </form>
       </div>
       <div class="col-lg-6 col-md-6 col-sm-6 mt-5">
           <img src="../assets/imgs/adminp.jpg" alt="" class="img-fluid">
       </div>
</div>
   </div>

</section>

<!-- login ends -->







<?php include('../layouts/footer.php'); ?>