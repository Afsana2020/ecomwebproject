<?php include('header.php'); ?>

<?php

if(isset($_GET['order_id'])){

    $order_id=$_GET['order_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=?");
    $stmt->bind_param('i', $order_id);            
    $stmt->execute();

    $order= $stmt->get_result();
}else if(isset($_POST['edit_order'])){


        $order_status= $_POST['order_status'];
        $order_id= $_POST['order_id'];
        


        $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
        $stmt->bind_param('si', $order_status, $order_id);

        if($stmt->execute()){
            header('location: index.php?order_updated=Order has been updated successfully'); 
        }
        else{
            header('location: index.php?order_failed=Error occured, Try again!');  
        }
    }else{
        header('location: index.php'); 
        exit;
    }
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

    <h2 class="my-3">Edit Order</h2>

    
<div class="mx-auto container">
        <form id="edit-form" method="POST" action="edit_order.php">
        <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
        <div class="form-group mt-2">

        <?php foreach($order as $r){ ?> 
            <label style="color: blue;">I. Order Id:</label>
            <p class="my-4 p-1 border border-primary text-center"><?php echo $r['order_id']; ?></p>
        </div>

        <div class="form-group mt-2">
            <label style="color: blue;">II. Order Cost:</label>
            <p class="my-4 p-1 border border-primary text-center"><?php echo $r['order_cost'];?></p>
        </div>

        <input type="hidden" name="order_id" value="<?php echo $r['order_id'] ;?>">  


        <div class="form-group mt-2">
        <label style="color: blue;">III. Order Status:</label>
            <select class="form-select p-2 mt-2" required name="order_status">
              
                <option value="processing" <?php if($r['order_status']=='processing'){echo "selected";}?>>Processing</option>
                <option value="paid" <?php if($r['order_status']=='paid'){echo "selected";}?>>Paid</option>
                <option value="shipped" <?php if($r['order_status']=='shipped'){echo "selected";}?>>Shipped</option>
                <option value="delivered" <?php if($r['order_status']=='delivered'){echo "selected";}?>>Delivered</option>
            </select>   
        </div>  

        <div class="form-group mt-2">
        <label style="color: blue;">IV. Order date:</label>
        <p class="my-4 p-1 border border-primary text-center"><?php echo $r['order_date']; ?></p>
        </div>
        
        <div class="form-group mt-3">
            <input type="submit" class="btn btn-primary px-4" name="edit_order" value="Edit">      
        </div>
        <?php } ?>
        
        </form>
</div>




<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>

