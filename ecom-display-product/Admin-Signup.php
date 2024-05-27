<?php
include("config.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $entity_id = $_POST['entity_id'];


    
    $sql = "INSERT INTO admin_table (username, password, entity_id) VALUES ('$username', '$password', '$entity_id')";
    if (mysqli_query($db, $sql)) {
        // 
        echo "<script>alert('Registration successful'); window.location.href = 'Admin-Signin-out.php';</script>";
        exit();
    } else {
        
        echo "<script>alert('Error: " . mysqli_error($db) . "');</script>";
    }
}
?>
