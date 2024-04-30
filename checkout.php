<?php include('layouts/header.php'); ?>
<?php




if(!empty($_SESSION['cart'])){
  //let user in



//send user to home page
}else{

header('location: index.php');

}

$total=0;

?>




  <!-- checkout -->

  <section id="checkout" class="my-5 py-5">
   
    <div class="mx-auto container mt-3 pt-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="container text-center">
                    <h2 class="font-weight-bold" style="color: #0f96ea;">Check Out!</h2>
                    <hr class="mx-5 border border-2 border-primary">
                </div>
        <form action="server\place_order.php" id="checkout-form" method="POST">
            <p class="text-center" style = "color: red;">
                <?php if(isset($_GET['message'])) {echo $_GET['message']; } ?>
                <?php if(isset($_GET['message'])) { ?> 
                    <a href="login.php" class="btn btn-primary">Login</a>
                <?php } ?>
            </p>
            <div class="form-group checkout-small-element ">
                <label for="">Name</label>
                <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Enter Your Name" required>
            </div>
            <div class="form-group checkout-small-element">
                <label for="">Email</label>
                <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Enter Your Email" required>
            </div>
            <div class="form-group checkout-small-element">
                <label for="">Phone</label>
                <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Enter Your Phone Number" required>
            </div>
            <div class="form-group checkout-small-element">
                <label for="">City</label>
                <input type="text" class="form-control" id="checkout-city" name="city" placeholder="Enter Your City" required>
            </div>

            <div class="form-group checkout-large-element">
                <label for="">Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Enter Your Address" required>
            </div>

            <div class="form-group checkout-btn-container">
          <?php foreach($_SESSION['cart'] as $key => $value ) {?>
            <?php 
          $total=$total+($value['product_quantity'] * $value['product_price']);?>
        <?php } ?>
        <p>Total amount: Tk. <?php echo $_SESSION['total']; ?> </p>

                <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order">
            </div>


        </form>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
            <img src="assets/imgs/checkout-bg.jpg" alt="" class="img-fluid ">
        </div>
</div>
    </div>

</section>








<!-- checkout ends -->

<?php include('layouts/footer.php'); ?>