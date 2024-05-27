<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/Table.css">
    <title>NIKE</title>
</head>
<body>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'Add-product.php';

                $sql = "SELECT * FROM `product_table`";
                $result = mysqli_query($db, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['product_id'] . "</td>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td>" . $row['product_price'] . "</td>";
                        echo "<td>" . $row['product_quantity'] . "</td>";
                        echo "<td>";
                        echo "<button>
                        <a href='update.php?updateid=" . $row['product_id'] . "'>UPDATE</a></button>";
                        echo "<button><a href='delete.php?deleteid=" . $row['product_id'] . "'>DELETE</a></button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        <a href="AdminDisplayProduct.php" class="back-to-home-button">Back to Home Page</a>
    </div>
</body>
</html>
