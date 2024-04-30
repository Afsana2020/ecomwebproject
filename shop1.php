<?php include('layouts/header.php'); ?>
<?php

include('server/connection.php');



if(isset($_POST['search'])){//to use search section


  if(isset($_GET['page_no']) && $_GET['page_no'] != "" ){
    //when user select a page 
     $page_no = $_GET['page_no'];
  }else{
    //if user just entered the page then default is 1
     $page_no = 1;
  }

    $category = $_POST['category'];
    $price = $_POST['price'];

   //2. return numbers of product
   $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=? AND product_price<=?");
   $stmt1->bind_param("si",$category,$price);
   $stmt1->execute();

   $stmt1->bind_result($total_records);

   $stmt1->store_result();

   $stmt1->fetch();

  //3. products per page
  $total_records_per_page = 8;

  $offset =($page_no-1) * $total_records_per_page;

  $previous_page= $page_no - 1;
  $next_page= $page_no + 1;

  $adjacents= "2";
  $total_no_of_pages = ceil($total_records/$total_records_per_page);

  //4. get all products

  $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT $offset,$total_records_per_page");
    
  $stmt2->bind_param("si",$category,$price);
  $stmt2->execute();

  $products= $stmt2->get_result();



  
}else{ //if user doesn't use filter then this else will show all the products

  
  //1. determine page number
    if(isset($_GET['page_no']) && $_GET['page_no'] != "" ){
      //when user select a page 
       $page_no = $_GET['page_no'];
    }else{
      //if user just entered the page then default is 1
       $page_no = 1;
    }

    //2. return numbers of product
    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
 
    $stmt1->execute();

    $stmt1->bind_result($total_records);

    $stmt1->store_result();

    $stmt1->fetch();

    //3. products per page
    $total_records_per_page = 8;

    $offset =($page_no-1) * $total_records_per_page;

    $previous_page= $page_no - 1;
    $next_page= $page_no + 1;

    $adjacents= "2";
    $total_no_of_pages = ceil($total_records/$total_records_per_page);

    //4. get all products

    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
    
    $stmt2->execute();

    $products= $stmt2->get_result();
 


}




?>


<style>

#product svg
    {
      color: goldenrod;
      

    }
    
.pagination a:hover{
      color: white ;
      background-color: rgb(65, 65, 198);
    }

</style>


  <!-- main part -->

  <div class="container-fluid">
  <div class="row">
  <!-- side search button  -->
 
<div class="col-lg-3 col-md-3 col-sm-3">
      
  <section id="search" class="my-5 py-5 ms-2">

    <div class="container mt-5 py-5">
      <p style=" color: rgb(71, 80, 244) ;font-weight:bold;">Search Products</p>
      <hr>
    </div>

          <form action="shop1.php" method="POST">
            <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                   <p>Category</p> 
                      <div class="form-check">
                         <input type="radio" value="phones" name="category" id="category_one" class="form-check-input" <?php if(isset($category)  && $category=='phones'){echo 'checked';}?>>
                         <label class="form-check-label" for="flexRadioDefault1">
                          Smart Phones
                         </label>
                      </div>

                     <div class="form-check">
                      <input type="radio" value="laptop" name="category" id="category_two" class="form-check-input" <?php if(isset($category) && $category=='laptop'){echo 'checked';}?>>
                      <label class="form-check-label" for="flexRadioDefault2">
                       Laptops
                      </label>
                   </div>

                   <div class="form-check">
                    <input type="radio" value="watch" name="category" id="category_two" class="form-check-input" <?php if(isset($category)  && $category=='watch'){echo 'checked';}?>>
                    <label class="form-check-label" for="flexRadioDefault2">
                     Smart Watches
                    </label>
                 </div>

                 <div class="form-check">
                  <input type="radio" value="accessories" name="category" id="category_two" class="form-check-input" <?php if(isset($category)  && $category=='accessories'){echo 'checked';}?>>
                  <label class="form-check-label" for="flexRadioDefault2">
                   Accessories
                  </label>
                 </div>



                </div>
             </div>

             <div class="row mx-auto container mt-5">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <p>Price</p>
                <input type="range" class="form-range w-50" min="1" max="1000" id="customrange2" name="price" value="<?php if(isset($price)){echo $price;} else{echo "100";}?>">
                <div class="w-50">
                  <span style="float: left;">1</span>
                  <span style="float: right;">1000</span>
                </div>
              </div>
            </div>   

            <div class="form-group my-3 mx-3">
              <input type="submit" name="search" value="Search" class="btn btn-primary">
            </div>

          </form>
  </section>

</div>

<!-- side search button ends -->



<!-- products-->

<div class="col-lg-9 col-md-9 col-sm-9">
<section id="shop" class="my-5 py-5">

    <div class="container">
        <h2 style=" color: rgb(71, 80, 244) ; font-size: 40px; font-weight:bold;">All Products
        </h2>

        <p class="text-end" style=" color: rgb(71, 80, 244) ;"> Page No: <?php echo $page_no;?> out of <?php echo $total_no_of_pages;?> </p>


      <div class="row g-4 pb-5 pt-2 px-2">


        <?php  while($row= $products->fetch_assoc()) { ?>
          <div class="col-lg-3 col-md-6 col-sm-6">



            <div class="card">
              <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="card-img-top img-fluid mx-auto" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                <p class="card-text">Price:<?php echo $row['product_price']; ?>TK</p>

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
                <a href=<?php echo "single_product.php?product_id=".$row['product_id']; ?> class="btn btn-primary">Buy Now</a>
              </div>
            </div>

          </div>
          <?php } ?>
      

    <!-- next page buttons -->
        
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        
        <li class="page-item <?php if($page_no<=1){echo 'disabled';}?>">
            <a class="page-link" href="<?php if($page_no <= 1){echo '#';} else {echo "?page_no=".($page_no-1);}?>">Previous</a>
        </li>

        <li class="page_item"><a class="page-link" href="?page_no=1">1</a></li>
        <li class="page_item"><a class="page-link" href="?page_no=2">2</a></li>

        <?php if(($page_no ==1 || $page_no ==2 || $page_no==$total_no_of_pages) && $total_no_of_pages>2) {?> 
          <li class="page_item"><a class="page-link" href="#">...</a></li>
          <li class="page_item"><a class="page-link" href="<?php echo "?page_no=".$total_no_of_pages;?>"><?php echo $total_no_of_pages?></a></li>
        <?php } ?>

         <?php if($page_no >=3 && $page_no<$total_no_of_pages) {?> 
          <li class="page_item"><a class="page-link" href="#">...</a></li>
          <li class="page_item" ><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"><?php echo $page_no; ?></a></li>
          <li class="page_item"><a class="page-link" href="#">..</a></li>
          <li class="page_item"><a class="page-link" href="<?php echo "?page_no=".$total_no_of_pages;?>"><?php echo $total_no_of_pages?></a></li>

          <?php } ?>
        
          <li class="page-item <?php if($page_no>= $total_no_of_pages){echo 'disabled';}?>">
            <a class="page-link" href="<?php if($page_no >= $total_no_of_pages){echo '#';} else {echo "?page_no=".($page_no+1);}?>">Next</a>
         </li>
        
      </ul>
    </nav>

    </div>
    <!-- next page buttons ends-->
     
   </div>
</section>
</div>
<!-- products ends -->

</div>
</div>

















<?php include('layouts/footer.php'); ?>