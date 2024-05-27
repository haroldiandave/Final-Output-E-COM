<?php
include 'Config.php';


$id = mysqli_real_escape_string($db, $_GET['updateid']);

$sql = "SELECT * FROM product_table WHERE product_id = '$id'";
$result = mysqli_query($db, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $productId = $row['product_id'];
    $productName = $row['product_name'];
    $productPrice = $row['product_price'];
    $productQuantity = $row['product_quantity'];

    if (isset($_POST['submit'])) {
        
        $productName = mysqli_real_escape_string($db, $_POST['productName']);
        $productPrice = mysqli_real_escape_string($db, $_POST['productPrice']);
        $productQuantity = mysqli_real_escape_string($db, $_POST['productQuantity']);

        $sql = "UPDATE product_table SET product_name = '$productName', product_price = '$productPrice', product_quantity = '$productQuantity' WHERE product_id = '$productId'";
        $result = mysqli_query($db, $sql);
        if ($result) {
            echo "Updated Successfully!";
            header('Location: Table.php');
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    }
} else {
    echo "No product found with ID: $id";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/update.css">
    <title>NIKE</title>
</head>
<body>
    <div id="edit-product-modal" method="post" class="modal">
        <div class="modal-content">
            <span id="edit-close" class="close">&times;</span>
            <h2>Update Product</h2>
            <form id="edit-product-form" method="POST">
                <input type="hidden" id="edit-product-id" name="productId">
                <div class="form-group">
                    <label for="edit-product-name">Product Name</label>
                    <input type="text" id="edit-product-name" name="productName" placeholder="Enter product name" value=<?php echo $productName; ?> required>
                </div>
                <div class="form-group">
                    <label for="edit-product-price">Product Price</label>
                    <input type="text" id="edit-product-price" name="productPrice" placeholder="Enter product price" value=<?php echo $productPrice; ?> required>
                </div>
                 <div class="form-group">
                    <label for="edit-product-quantity">Product Quantity</label>
                     <input type="number" id="edit-product-quantity" name="productQuantity" placeholder="Enter product quantity" value=<?php echo $productQuantity; ?> required>
                 </div>

                 <div class="button-container">
                    <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                </div>
            </form>
         </div>
     </div>
</body>
</html>