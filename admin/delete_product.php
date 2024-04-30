<?php

session_start();
include('../server/connection.php'); 

?>

<?php 

if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php'); 
    exit;

}

if(isset($_GET['product_id'])){
    //2. return numbers of product
    $product_id=$_GET['product_id'];
    $stmt = $conn->prepare("DELETE FROM products WHERE product_id=?");
    $stmt->bind_param('i',$product_id);
    
    if($stmt->execute()){

    header('location: products.php?deleted_successfully=Product has been deleted succesfully');
    }else{
        header('location: products.php?deleted_failure=Could not delete product, Try again!');
    }
}


?>