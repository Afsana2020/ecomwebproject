<?php include('header.php'); ?>

<?php 

if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php'); 
    exit;

}

?>

<div class="container-fluid">
    <div class="row" style="min-height: 1000px">

    <?php include('sidemenu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items">
        <h1 class="h2 mt-5">Admin Account:</h1>
        
        
        
        <div class="btn-toolbar mb-2 mb-md-0 p-5">
            <div class="btn-group me-2">
                

            </div>
        </div>

    </div>

        <div class="container py-5 bg-primary rounded">
            <p class="bg-light p-3 m-2 rounded-pill">ID: <?php echo $_SESSION['admin_id'];?></p>
            <p class="bg-light p-3 m-2 rounded-pill">Name: <?php echo $_SESSION['admin_name'];?></p>
            <p class="bg-light p-3 m-2 rounded-pill">Email: <?php echo $_SESSION['admin_email'];?></p>
        </div>
  
    </main>
</div>
</div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>
   