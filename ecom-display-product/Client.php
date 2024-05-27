<?php
session_start(); // Start the session if not already started

@include 'config.php';

if(isset($_POST['add_product'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/'. $product_image;

    if(empty($product_name) || empty($product_price) || empty($product_quantity) || empty($product_image)){
        $message[] = 'Please fill out all fields.';
    } else {
        $insert = $db->prepare("INSERT INTO cart_table(name, price, quantity, image) VALUES(?, ?, ?, ?)");
        $insert->bind_param("ssss", $product_name, $product_price, $product_quantity, $product_image);
        if($insert->execute()){
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'New product added successfully!';

           
            $cart_item = array(
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => $product_quantity,
                'image' => $product_image
            );
            $_SESSION['cart'][] = $cart_item;
        } else {
            $message[] = 'Could not add the product.';
        }
    }
};

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($db, "DELETE FROM products WHERE id = $id");
    header('location:Admin.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIKE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="styles/admin.css">
</head>

<body>
    <?php
        if(isset($message)){
            foreach($message as $msg){
                echo '<span class="message">'.$msg.'</span>';
            }
        }
    ?>
    <div class="container">
        <div class="navbar">
                <img src="assets/nikelogo.png" alt="Logo" class="logo-nike">
                <ul>
                    <li><a href="Client.php">SHOP</a></li>
                    <li><a href="AddtoCart.php">CART</a></li>
                    <li><a href="#">SUPPORT</a></li>
                    <li><a href="Signin-out.php">SIGN OUT</a></li>
                </ul>
        </div>

        <div class="admin-product-form-container">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h3>Add to Cart</h3>
                <input type="text" placeholder="Enter product name" name="product_name" class="box">
                <input type="text" placeholder="Enter product price" name="product_price" class="box">
                <input type="number" placeholder="Enter product quantity" name="product_quantity" class="box">
                <input type="file" accept="image/png, image/jpeg, image/jpg"  name="product_image" class="box">
                <input type="submit" class="btn" name="add_product" value="Add Product">
            </form>

        </div>

        <?php
            $select = mysqli_query($db, "SELECT * FROM products");
        ?>

        <div class="product-display">
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                    </tr>
                </thead>

                <?php while($row = mysqli_fetch_assoc($select)){ ?>

                <tr>
                    <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>

                </tr>

                <?php } ?>
            </table> 
        </div>
    </div>   
    <script src=""></script>
</body>
</html>
