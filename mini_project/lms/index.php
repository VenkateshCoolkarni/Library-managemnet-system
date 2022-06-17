<?php 

    $user_invalid = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["username"]))
    {

        $db_server_name = "localhost";
        $db_user_name = "root";
        $db_password = "!VEN@db118";
        $db_name = "login";
    
        $conn = mysqli_connect($db_server_name,$db_user_name,$db_password,$db_name);
    
        $user = $_POST["username"];
        $pass = $_POST["password"];
        // echo $user;
        // echo $pass;
    
        // Use and operator to check two conditions 
        $query = "SELECT sno,user_name,pass FROM users WHERE user_name = '$user' AND pass = '$pass' ";
    
        // $db_data = $conn->query($query);     //OOPs paradigm
        $db_data = mysqli_query($conn,$query);  //Procedural paradigm
    
        // $row = $db_data->fetch_assoc();      //OOPs paradigm
        $row =  mysqli_fetch_assoc($db_data);   //Procedural paradigm
    
        mysqli_close($conn);

        // $row will be of type NULL if user_name provided does not 
        // exist else it will be array
        // echo $row["user_name"];
        if($row != NULL){
            if(!strcmp($row["user_name"],$user) and !strcmp($row["pass"],$pass)){
                    // $execute_sign_in = 1;
                    session_start();
                    $_SESSION['user_name'] = $user;
                    header("location: ./user.php");
            }
        }
        else{
            $user_invalid = 1;
        }
    
    }

?>

<?php 
    $execute_sign_in = 0;
    $admin_invalid = 0;

    if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["admin_name"]))
    {
        $db_server_name = "localhost";
        $db_user_name = "root";
        $db_password = "!VEN@db118";
        $db_name = "admin_login";
    
        $conn = mysqli_connect($db_server_name,$db_user_name,$db_password,$db_name);
    
        $admin = $_POST["admin_name"];
        $pass = $_POST["admin_password"];
    
        $query = "SELECT sno,admin_name,pass FROM admins WHERE admin_name = '$admin' AND pass = '$pass'";
    
        // $db_data = $conn->query($query);     //OOPs paradigm
        $db_data = mysqli_query($conn,$query);  //Procedural paradigm
    
        // $row = $db_data->fetch_assoc();      //OOPs paradigm
        $row =  mysqli_fetch_assoc($db_data);   //Procedural paradigm
       
        mysqli_close($conn);
    
        if($row != NULL){
            if(!strcmp($row["user_name"],$user) and !strcmp($row["pass"],$pass)){
                session_start();
                $_SESSION['admin_name'] = $admin;
                header("location: ./admin.php");
            }
        }
        else{
            $admin_invalid = 1;
        }
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
    <script  src="js/signInModal.js" async></script>
</head>
<body>
    <header>
        <div id = "logo">
            <img src="img/icon.png" alt="library-building-logo" width="60px" height="60px"/>
            <h1>Lib</h1>
        </div>
        <div id="valid">
            <div id ="sign-in-box">Sign in</div>
            <div id="admin-box">Admin</div>
        </div>
    </header>
    
    <!--Ribbon Area: displays inavlid message if there's one-->
    <div>
        <?php 
            if($user_invalid | $admin_invalid){    
                echo "<div id='ribbon'>INVALID CREDENTIALS</div>";
                echo "        <script>
                setTimeout(()=>{ 
                    document.getElementById('ribbon').style.display = 'none'; // hide the element after 2.5 seconds
                }, 2500);
                </script>";
            }
        ?>
    </div>
    
    <main> 
        <div id="overlay"></div>

        <!-- CATALOGUE MODAL  -->
        <!-- <div style="display: none;" class="catlogue modal"></div> -->

         <!-- SIGN IN MODAL  -->
        <div id="sign-in-modal">
            <div id="close">
                <span id = "close-btn">&times;</span> 
            </div>
            <form  action="./index.php" method="post" id="form" autocomplete="off">
                <!-- <span style="content: \E008"></span> -->
                <input type="text" name="username" placeholder="Enter username" maxlength="6" required/>
                <input type="password" name="password"  placeholder="Enter password" minlength="8" required/>
                <div >
                    <button  id="sign-in-btn">Sign In</button>
                </div>
                <hr>
                <p>New User?</p>
            </form>
            <div>
                <button id = "register-btn">Register</button>
            </div>
            
        </div>

        <!-- SIGN UP MODAL  -->
        <!-- <div style="display: none;" class="register modal"></div> -->
            
        <!-- ADMIN MODAL  -->
        <div id="admin-modal">
            <div id="admin-modal-close">
                <span id = "admin-modal-close-btn">&times;</span> 
            </div>
            <form  action="./index.php" method="post" id="admin-form" autocomplete="off">
   
                <input type="text" name="admin_name" placeholder="Enter username" maxlength="4" required/>
                <input type="password" name="admin_password"  placeholder="Enter password" minlength="8" required/>
                <div >
                    <button  id="admin-sign-in-btn">Sign In</button>
                </div>
                <hr>
                <p>New Admin?</p>
            </form>
            <div>
                <button  id="admin-register-btn">&#43; Add Admin</button>
            </div>
        </div>
    </main>
    <!-- <footer>
        <p>Library Opening Hours</p>
        <ul>
            <div></div>
            <li>Monday - Friday: 8.30 AM to 9.00 PM</li>
            <li>Saturday and Sunday: 8.30 AM to 5.30 pm</li>
        </ul>

    </footer> -->
                 <!-- <span style="content: \E008"></span> -->
</body>
</html>