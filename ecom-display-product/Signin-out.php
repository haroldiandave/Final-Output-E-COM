<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $myusername = trim($_POST['username']);
    $mypassword = trim($_POST['password']);

    
    if (empty($myusername)) {
        echo "<script>alert('Username is required'); window.location.href = 'Signin-out.php'</script>";
        exit();
    }

   
    if (empty($mypassword)) {
        echo "<script>alert('Password is required'); window.location.href = 'Signin-out.php';</script>";
        exit();
    }
    

    if (empty($myusername) || empty($mypassword)) {
        exit();
    }

    
    $myusername = mysqli_real_escape_string($db, $myusername);
    $mypassword = mysqli_real_escape_string($db, $mypassword);

    
    $sql = "SELECT * FROM user_table WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;
        echo "<script>alert('Login Successful'); window.location.href = 'Client.php';</script>";
        exit(); 
    }
}
?>


<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="styles/Signin-out.css">
        </head>
        <body>
            <div class="container">

                <div class="signin-signup">

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="sign-in-form">

                        <h2 class="title">USER LOGIN</h2>

                        <div class="input-field">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" name="username" placeholder="Username">
                        </div>

                        <div class="input-field">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>

                        <input type="submit" value="Login" class="btn">
                        <button type="button" class="btn cancel-btn" onclick="window.location.href='Homepage.php'">Back to Homepage</button>


                    </form>

                    <form action="signup.php" method="post" class="sign-up-form">
                        <h2 class="title">Sign up</h2>

                        <div class="input-field">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input type="text" name="username" placeholder="Username">
                        </div>

                        <div class="input-field">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>

                        <div class="input-field">
                            <i class="fa fa-id-card" aria-hidden="true"></i>
                            <input type="text" name="entity_id" placeholder="Entity ID">
                        </div>

                        <input type="submit" value="Sign up" class="btn">
                    </form>

                </div>

                <div class="panels-container">

                    <div class="panel left-panel">
                        <div class="content">
                            <h3>Member of KickWise?</h3>
                            <p>KickWise: Where every step is a decision, every stride a journey. Step into innovation, comfort, and style with our intelligently crafted kicks, designed to elevate your every move.</p>
                            <button class="btn" id="sign-in-btn">Sign in</button>
                        </div>
                        <img src="assets/Nike Dunk High By You.png" alt="" class="image">
                    </div>
                    <div class="panel right-panel">
                        <div class="content">
                            <h3>New to KickWise?</h3>
                            <p>KickWise: Where every step is a decision, every stride a journey. Step into innovation, comfort, and style with our intelligently crafted kicks, designed to elevate your every move.</p>
                            <button class="btn" id="sign-up-btn">Sign up</button>
                        </div>
                        <img src="assets/Air Jordan 1 Retro High OG.png" alt="" class="image">
                    </div>

                </div>

            </div>
            <script src="app.js"></script>
        </body>
</html>
