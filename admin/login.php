<?php
    error_reporting(0);
    include("./connect.php");

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aoudumber Bade - CodeWebDev">
    <link rel="website icon" type="jpeg" href="./img/Symo icon.png">
    <link rel="stylesheet" href="../Font Awesome/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel - ElectronsHUB</title>
</head>
<body id="login">
    <div class="login-container" id="lg">
    <div class="login-box">
        <div class="log-hd">
            <h3>Admin Panel</h3>
        </div>
        <form action="" method="POST">
            <div class="inp">
            <label for="">Username</label>
            <input type="text" name="username">
            </div>
            <div class="inp">
            <label for="">Password</label>
            <input type="password" name="password">
            </div>
            <input type="submit" name="login" class="btn-primary log-btn" value="Log In">
            <?php if(isset($_SESSION['error'])){
                echo "<p class='error_btn'>";
                echo "<i class='fa-solid fa-triangle-exclamation'></i>";
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                echo "</p>";
            } ?>
        </form>
    </div>
    <div class="inp">
        <a href="#">Lost Your Password?</a>
        <a href="../index.php">← Go to My Website</a>
    </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password =  mysqli_real_escape_string($conn,sha1($_POST['password']));

        $query = "SELECT * FROM users WHERE username = '{$username}' && password = '{$password}'";
        $data = mysqli_query($conn,$query);

        $total = mysqli_num_rows($data);
        if($total>0){
            $row = mysqli_fetch_assoc($data);

            $users = array($row['user_id'],$row['username'],$row['email'],$row['password'],$row['role'],$row['user_image']);

            $_SESSION['users'] = $users;

            header("location:index.php");
        }else {
            $_SESSION['error'] = "Invalid Username or Password!";
            header("location:login.php");
        }
    }

?>
