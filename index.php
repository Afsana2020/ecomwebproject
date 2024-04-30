<?php include('layouts/header.php'); ?>
  <!-- home -->

  <section id="home">




    <!-- carousel -->

    <div id="car" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#car" data-bs-slide-to="0" class="active" aria-current="true"
          aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#car" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#car" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">

          <div class="caption1">
            <p>Get the best deals here!</p>
            <h1>Welcome to <span class="com">A.H.</span></h1>
            <p class="py-2">Changing the world with Technology</p>
            <a href="shop1.php" class="btn btn-primary my-3 px-3">Buy Now!</a>
          </div>
          <div class="home_pic">
            <img src="assets/imgs/watch.jpg" class="img-fluid toppic" alt="...">
          </div>

        </div>
        <div class="carousel-item">
          <div class="caption2">
            <p>Get the best deal here!</p>
            <h1>Welcome to <span class="com">A.H.</span></h1>
            <p class="py-2">Changing the world with Technology</p>
            <a href="shop1.php" class="btn btn-primary my-3 px-3">Buy Now!</a>
          </div>

          <div>

            <img src="assets/imgs/laptop.jpg" class="img-fluid toppic" alt="...">
          </div>
        </div>
        <div class="carousel-item">


          <div class="caption3">
            <p>Get maximum discounts!</p>

            <h5 class="py-2">We got Over million products and we ship all around the world</h5>
            <a href="shop1.php" class="btn btn-primary my-3 px-3">Buy Now!</a>
          </div>
          <div>
            <img src="assets/imgs/phone.jpg" class="img-fluid toppic" alt="...">
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#car" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#car" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>



    <!-- carousel end -->


  </section>



  <!-- home end -->







  <!-- brand -->

  <section id="brand" class="container-fluid">

    <div class="row">

      <a href=""> <img class="img-fluid w-100 pt-3" src="assets/imgs/offer1.jpg" alt=""></a>
      <div class="alert alert-info my-2 py-5 text-center" role="alert">
        All your favorite brands in one place!
      </div>

    </div>

    <div class="row py-2 g-2">
      <img src="assets/imgs/samsung.jpg" alt="" class="img-fluid col-lg-3 col-md-3 col-sm-3">
      <img src="assets/imgs/apple.jpg" alt="" class="img-fluid col-lg-3 col-md-3 col-sm-3">
      <img src="assets/imgs/acer.jpg" alt="" class="img-fluid col-lg-3 col-md-3 col-sm-3">
      <img src="assets/imgs/hp.jpg" alt="" class="img-fluid col-lg-3 col-md-3 col-sm-3">


    </div>



  </section>


  <!-- brand end -->

  <!-- product-->

  <section id="new" class="w-100">

    <div class="row p-0 m-0">

      <div class="one col-lg-4 col-md-12 col-sm-12 px-0">

        <img class="img-fluid py-lg-0 py-md-2" src="assets/imgs/lptp.jpg" alt="">
        <div class="details px-5">
          <h2>Laptops at best price!</h2>
          <a href="shop1.php" class="btn btn-dark">CHECK IT!</a>
        </div>

      </div>

      <div class="one col-lg-4 col-md-12 col-sm-12 px-0">

        <img class="img-fluid px-lg-2 py-lg-0 py-md-2" src="assets/imgs/phn.jpg" alt="">
        <div class="details px-5">
          <h2>SmartPhones at best price!</h2>
          <a href="shop1.php" class="btn btn-dark">CHECK IT!</a>
        </div>

      </div>

      <div class="one col-lg-4 col-md-12 col-sm-12 px-0">

        <img class="img-fluid py-lg-0 py-md-2" src="assets/imgs/parts.jpg" alt="">
        <div class="details px-5">
          <h2>Accessories at best price!</h2>
          <a href="shop1.php" class="btn btn-dark">CHECK IT!</a>
        </div>

      </div>


    </div>


  </section>

  <!-- product-->


  <!-- phone -->


  <section id="phone" class="py-5 my-5 b">

    <div class="container-fluid">

      <!-- headline -->
      <div class="row p-2">
        <h2 class="text-center p-3">

          <img src="assets/imgs/phonelogo.png" class="img-fluid" style=" width: 80px; height: 70px;">


          <span style=" color: rgb(103, 103, 173) ; font-size: 40px; font-family: fantasy  ;">Phone </span>collections!
        </h2>
      </div>
      <!-- headline ends -->

      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="row row-cols-1 row-cols-md-2 g-4">

            <?php include ('server/get_phone_collections.php'); ?>

            <?php while ($row= $phone_collections->fetch_assoc()){ ?>

            <div class="col">
              <div class="card">
                <img src="assets/imgs/<?php echo $row['product_image'] ; ?>" class="card-img-top img-fluid mx-auto"
                  alt="...">
                <div class="card-body">
                  <h5 class="card-title">
                    <?php echo $row['product_name']; ?>
                  </h5>
                  <p class="card-text">Price:
                    <?php echo $row['product_price']; ?> TK
                  </p>

                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path
                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path
                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path
                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path
                      d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star"
                    viewBox="0 0 16 16">
                    <path
                      d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                  </svg>

                  <br>
                  <br>

                  <a href="<?php echo " single_product.php?product_id=" .$row['product_id'];?>"> <button
                      class="btn btn-primary">Buy Now</button></a>
                </div>
              </div>

            </div>
            <?php } ?>

          </div>
        </div>






        <!-- slides -->

        <div class="col-lg-6  col-md-12 col-sm-12">


          <div class="row p-2">
            <div id="car2" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#car2" data-bs-slide-to="0" class="active" aria-current="true"
                  aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#car2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#car2" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="assets/imgs/appleoffer.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption opacity-75">
                    <a href="shop1.php" class="btn btn-dark">Buy now!</a>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/imgs/oppooffer.jpeg" class="d-block w-100" alt="...">
                  <div class="carousel-caption opacity-75 d-none d-md-block">
                   <a href="shop1.php" class="btn btn-light">Buy now!</a>
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="assets/imgs/samsungoffer.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption opacity-75 d-block d-md-block">
                    <a href="shop1.php" class="btn btn-dark">Buy now!</a>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#car2" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#car2" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>


          </div>

          <div id="d1" class="row">

            <img src="assets/imgs/decor1.jpg" class="d-lg-block d-md-none d-sm-none d-none" alt="">
          </div>


        </div>

        <!-- slides ends -->

      </div>
    </div>
  </section>


  <!-- phone end -->




  <!-- laptop -->




  <section id="laptop">

    <div class="container-fluid bg-dark text-light">
      <h2 class="text-center p-5">


        <span style=" color: rgb(138, 186, 182) ; font-size: 40px; font-family: fantasy  ;"> Laptop </span>collections!
      </h2>

      <p class="text-center">Get all the latest laptop collections here!</p>



      <div class="row g-4 pb-5 pt-2 px-2">
        <?php include ('server/get_laptop.php'); ?>

        <?php while ($row= $laptop_collections->fetch_assoc()){ ?>
        <div class="col-lg-3 col-md-6 col-sm-6">



          <div class="card">
            <img src="assets/imgs/<?php echo $row['product_image'] ; ?>" class="card-img-top img-fluid mx-auto"
              alt="...">
            <div class="card-body">
              <h5 class="card-title">
                <?php echo $row['product_name'] ; ?>
              </h5>
              <p class="card-text">Price:
                <?php echo $row['product_price'] ; ?>TK
              </p>

              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill"
                viewBox="0 0 16 16">
                <path
                  d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill"
                viewBox="0 0 16 16">
                <path
                  d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill"
                viewBox="0 0 16 16">
                <path
                  d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill"
                viewBox="0 0 16 16">
                <path
                  d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star"
                viewBox="0 0 16 16">
                <path
                  d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
              </svg>
              <br>
              <br>

              <a href="<?php echo " single_product.php?product_id=" .$row['product_id'];?>"> <button
                      class="btn btn-primary">Buy Now</button></a>
            </div>
          </div>

        </div>

        <?php } ?>
      </div>
    </div>
  </section>






  <!-- laptop ends -->




  <!-- watch -->



  <section id="watch" class="py-4">
    <div class="container-fluid">
      <div class="row">

        <h2 class="text-center pt-5">


          <span style=" color: rgb(131, 192, 209) ; font-size: 40px; font-family: fantasy  ;"> Smart watch
          </span>collections!
        </h2>

        <p class="text-center ">Get all the latest laptop collections here!</p>

      </div>



      <div id="screen">

        <div class="row">

          <div class="col-lg-3 col-md-2 col-sm-0"></div>
          <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="row">

              <?php include ('server/get_watch.php'); ?>

              <?php while ($row= $watch_collections->fetch_assoc()){ ?>
              <div class="col-lg-4 col-md-4 col-sm-4">



                <div class="card">
                  <img src="assets/imgs/<?php echo $row['product_image'] ; ?>" class="card-img-top img-fluid mx-auto"
                    alt="...">
                  <div class="card-body">
                    <h5 class="card-title">
                      <?php echo $row['product_name'] ; ?>
                    </h5>
                    <p class="card-text">Price:
                      <?php echo $row['product_price'] ; ?>TK
                    </p>

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path
                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path
                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path
                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path
                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                      class="bi bi-star" viewBox="0 0 16 16">
                      <path
                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z" />
                    </svg>



                    <br>
                    <br>

                    <a href="<?php echo " single_product.php?product_id=" .$row['product_id'];?>"> <button
                      class="btn btn-primary">Buy Now</button></a>
                  </div>
                  
                </div>

              </div>
              <?php } ?>
              <button class="btn btn-primary my-5 d-block d-lg-none d-md-none ">Click here for More!</button>
            </div>


            <div class="col-lg-3 col-md-2 col-sm-0">


            </div>

          </div>


        </div>

      </div>



  </section>


  <!-- watch ends -->


  <?php include('layouts/footer.php'); ?>