
<?php include('layouts/header.php'); ?>




<style>
          /* CSS for the background image */
          .bg-image {
            background-image: url('../assets/imgs/log.jpg');
            background-size: cover;
            background-position: center;
            height: 80vh; /* Set the height to full viewport height */
            width: 80vh;
          }
          /* Adjust margin and padding of .btn class */
      .btn {
          padding: 15px 15px; /* Default padding */
          margin: 140px 0 -20px 200px; /* Default margin */
      }


      .btn:hover{
          background-color: black;
          color: white;
          width: 200px;
          transition-duration: 0.4s;
        cursor: pointer;
      }  
      @media (min-width: 250px) {
          .btn {
              padding: 15px 15px; /* Adjusted padding for small screens */
              margin: 140px 0 -20px 150px; /* Adjusted margin for small screens */
          }
      }

      @media (min-width: 500px) {
          .btn {
              padding: 15px 15px; /* Adjusted padding for small screens */
              margin: 140px 0 -20px 180px; /* Adjusted margin for small screens */
          }
      }
      /* Adjust margin and padding at small screen sizes (sm and above) */
      @media (min-width: 576px) {
          .btn {
              padding: 15px 15px; /* Adjusted padding for small screens */
              margin: 140px 0 -20px 190px; /* Adjusted margin for small screens */
          }
      }

      /* Adjust margin and padding at medium screen sizes (md and above) */
      @media (min-width: 768px) {
          .btn {
              padding: 15px 15px; /* Revert to default padding for medium screens */
              margin: 140px 0 -20px 195px; /* Revert to default margin for medium screens */
          }
      }

      /* Adjust margin and padding at large screen sizes (lg and above) */
      @media (min-width: 992px) {
          .btn {
              padding: 15px 15px; /* Adjusted padding for large screens */
              margin: 140px 0 -20px 195px; /* Adjusted margin for large screens */
          }
      }

      /* Adjust margin and padding at extra large screen sizes (xl and above) */
      @media (min-width: 1200px) {
          .btn {
              padding: 15px 15px; /* Adjusted padding for extra large screens */
              margin: 140px 0 -20px 200px; /* Adjusted margin for extra large screens */
          }

        
      }

</style>

  <!-- navbar -->
  <!-- Your navbar code here -->
  <!-- navbar end -->

  <!-- login -->
  <section class="my-5 py-5">
    <div class="container">
      <div class="row">
        <div class="col col-lg-2 col-md-2 col-sm-2 pt-5"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 rounded mx-auto d-block bg-image">
          <div class="container text-center">
            <h2 class="font-weight-bold text-primary">SELECT</h2>
          </div>
            <a href="login.php" class="btn btn-primary">Login As User</a>
            <br>
            <a href="/admin/login.php" class="btn btn-primary">Login As Admin</a>
        </div>
        <div class="col col-lg-2 col-md-2 col-sm-2"></div>
      </div>
    </div>
  </section>
  <!-- login ends -->


<?php include('layouts/footer.php'); ?>