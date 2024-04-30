<?php

session_start();
?>

<?php include('../server/connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="assets/imgs/logo.jpg">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>


<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
<a href="" class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">A.H. TECH</a>
<button class="navbar-toggle position-absolute d-md-none collapsed" type="button">
    <span class="navbar-toggle-icon"></span>
</button>

<div class="navbar-nav">
 <div class="nav-item text-nowrap"> 
    <?php if(isset($_SESSION['admin_logged_in'])) { ?>
      <a href="logout.php?logout=1"class="nav-link px-3 py-4">Sign Out</a>
     <?php } ?> 
    </div>
    </div>
</header>