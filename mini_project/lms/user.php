<?php 
    session_start();
    // echo $_SESSION['user_name'];
    if(!isset($_SESSION['user_name'])){
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lib</title>
    <link rel="stylesheet" href="css/home.css" />
    <!-- include async while considering script tag in head element -->
    <!-- <script  src="js/index.js" async></script> -->
</head>
<body>
    <header>
        <div id = "logo">
            <img src="img/icon.png" alt="library-building-logo" width="60px" height="60px"/>
            <h1>Lib</h1>
        </div>
        <div id="valid">
            <div id ="sign-in-box"><?php echo '<a href="user_logout.php" style="text-decoration:none;">Logout</a>'?></div>
        </div>
    </header>
</body>
</html>

<?php 
    session_destroy();
?>