<?php include('header.php'); ?>

<?php 

if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php'); 
    exit;

}

?>

<?php
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
            $total_records_per_page =5;

            $offset =($page_no-1) * $total_records_per_page;

            $previous_page= $page_no - 1;
            $next_page= $page_no + 1;

            $adjacents= "2";
            $total_no_of_pages = ceil($total_records/$total_records_per_page);

            //4. get all products

            $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
            
            $stmt2->execute();

            $products= $stmt2->get_result();




?>


<div class="container-fluid">
    <div class="row" style="min-height: 1000px">

    <?php include('sidemenu.php'); ?>
        

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items">
        <h1 class="h2 mt-5">Dashboard</h1>
        
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>
        </div>

    </div>

    <h2 class="my-3">Products</h2>
    <!-- message display -->
    <?php if(isset($_GET['edit_success_message'])) {  ?>
        <p class="text-center" style="color:green ;" ><?php echo $_GET['edit_success_message'] ?></p>
    <?php } ?>

    <?php if(isset($_GET['edit_failure_message'])) {  ?>
        <p class="text-center" style="color:red;" ><?php echo $_GET['edit_failure_message'] ?></p>
    <?php } ?>

    <?php if(isset($_GET['deleted_successfully'])) {  ?>
        <p class="text-center" style="color:green ;" ><?php echo $_GET['deleted_successfully'] ?></p>
    <?php } ?>

    <?php if(isset($_GET['deleted_failure'])) {  ?>
        <p class="text-center" style="color:red;" ><?php echo $_GET['deleted_failure'] ?></p>
    <?php } ?>
    <?php if(isset($_GET['product_created'])) {  ?>
        <p class="text-center" style="color:green;" ><?php echo $_GET['product_created'] ?></p>
    <?php } ?>
    <?php if(isset($_GET['product_failed'])) {  ?>
        <p class="text-center" style="color:red;" ><?php echo $_GET['product_failed'] ?></p>
    <?php } ?>
    <?php if(isset($_GET['images_updated'])) {  ?>
        <p class="text-center" style="color:green;" ><?php echo $_GET['images_updated'] ?></p>
    <?php } ?>
    <?php if(isset($_GET['images_failed'])) {  ?>
        <p class="text-center" style="color:red;" ><?php echo $_GET['images_failed'] ?></p>
    <?php } ?>
     <!-- message display ends-->   
    <p class="text-end" style=" color: rgb(71, 80, 244) ;"> Page No: <?php echo $page_no;?> out of <?php echo $total_no_of_pages;?> </p>
    <div class="table-responsive ">
        <table class="table table-striped table-sm">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Product Id</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Offer</th>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Color</th>
                    <th scope="col">Edit Details</th>
                    <th scope="col">Edit Images</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>    
            <tbody>

            <?php foreach($products as $product){ ?>
                <tr>
                    <td> <?php echo $product['product_id'];?> </td>
                    <td> <img src="<?php echo "../assets/imgs/".$product['product_image'];?>" style="width: 70px; height:70px;"  ></td>
                    <td> <?php echo $product['product_name'];?> </td>
                    <td> <?php echo "Tk ".$product['product_price'];?> </td>
                    <td class="text-center"> <?php echo $product['product_special_offer']."%";?> </td>
                    <td class="text-center"> <?php echo $product['product_category'];?> </td>
                    <td class="text-center"> <?php echo $product['product_color'];?> </td>
                    <td><a href="edit_product.php?product_id=<?php echo $product['product_id'];?>" class="btn btn-primary my-2">Edit Details</a></td>
                    <td><a href="<?php echo "edit_images.php?product_id=".$product['product_id']."&product_name=".$product['product_name'];?>" class="btn btn-warning my-2">Edit Images</a></td>
                    <td><a href="delete_product.php?product_id=<?php echo $product['product_id'];?>" class="btn btn-danger my-2">Delete</a></td>
                </tr>
            <?php } ?>    

            </tbody>
        </table>

             <!-- next page buttons -->
        
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        
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
    <!-- next page buttons ends-->

    </div>
    </main>
    </div>


      
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>
