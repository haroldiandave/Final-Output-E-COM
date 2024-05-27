<?php
include 'Add-product.php';
if(isset($_GET['deleteid'])){
    $productID = $_GET['deleteid'];

    $sql = "DELETE FROM `product_table` WHERE product_id = $productID";
    $result = mysqli_query($db, $sql);
    if($result){
        echo "Deleted Successfully";
        header('location:Table.php');
    } else {
        die(mysqli_error($db));
    }
}
?>
