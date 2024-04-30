<?php

session_start();
include('../server/connection.php'); 

?>

<?php 

if(!isset($_SESSION['admin_logged_in'])){
    header('location: login.php'); 
    exit;

}

if(isset($_GET['order_id'])){
    //2. return numbers of product
    $order_id=$_GET['order_id'];
    $stmt = $conn->prepare("DELETE FROM orders WHERE order_id=?");
    $stmt->bind_param('i',$order_id);
    
    if($stmt->execute()){

    header('location: index.php?delete_done=Order has been deleted succesfully');
    }else{
        header('location: index.php?delete_failed=Could not delete order, Try again!');
    }
}


?>