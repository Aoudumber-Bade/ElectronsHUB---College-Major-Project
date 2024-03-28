<?php
    error_reporting(0);
    include("./connect.php");

    session_start();

    if(!isset($_SESSION['users'])){
      header("location:http://localhost/electronshub/admin/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aoudumber Bade - CodeWebDev">
    <link rel="stylesheet" href="../Font Awesome/css/all.css" />
    <link rel="website icon" type="jpeg" href="./img/Symo icon.png">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel - ElectronsHUB</title>
</head>

<body id="dashboard">

    <!----
        #Main Content 
    -->

    <div id="main">

        <!---
            #Side Navigation Bar
        -->
        <?php include("./sidenav.php"); ?>



        <div id="main-content" class="chpass">

            <!---
                Top Navigation Bar
            -->

            <div id="top-nav">
                <p class="logo-text">Password Manager</p>
                <div class="pro-box">
                <p>Welcome,
            <?= ucfirst($_SESSION['users']['1']); ?><span>❤️</span>
          </p>


          <img src="<?= $_SESSION['users']['5']; ?>" alt=""
            class="profile">
                    <div class="profile-links">
                     <a href="./changepass.php"><i class="fa fa-user"></i>   Change Password</a>
			        <a href="./logout.php"><i class="fa fa-power-off"></i>   Log Out</a>
                    </div>
                </div>
            </div>

            <!---
                #Change Password
            -->

            <div class="login-container">
                <div class="login-box">
                    <div class="log-hd">
                        <h3>Change Password</h3>
                    </div>
                    <form action="" method="POST">
                        <div class="inp">
                        <label for="">Username</label>
                        <input type="text" name="username">
                        </div>
                        <div class="inp">
                        <label for="">New Password</label>
                        <input type="password" name="password">
                        </div>
                        <input type="submit" name="submit" class="btn-primary log-btn" value="Submit">
                    </form>
                </div>
                </div>



        </div>
    </div>

    <script type="text/javascript">
        
    </script>

</body>
    <script src="../jQuery/jquery-3.7.0.min.js"></script>
<script src="./script.js"></script>


</html>

<?php
                            if(isset($_POST['submit'])){
                                $username = $_POST['username'];
                                $pass = $_POST['password'];
                            
                                $query = "UPDATE admin_details SET password = '$pass', confirm_password = '$pass' WHERE username = '$username'";
                                $data = mysqli_query($conn,$query);
                        
                                if($data){
                                    echo "<div class='pop-box'>
                                    <div class='s-icon'>
                                      <i class='fa-sharp fa-solid fa-circle-check'></i>
                                    </div>
                                    <div class='pop-c'>
                                      <p>The Password is changed!!!!</p>
                                    </div>
                                  </div>";
                                }
                                else{
                                    echo "<div class='pop-box fail'>
                                    <div class='s-icon'>
                                      <i class='fa-sharp fa-solid fa-circle-check'></i>
                                    </div>
                                    <div class='pop-c'>
                                      <p>Password Is Not Changed</p>
                                    </div>
                                  </div>";
                                }
                                echo "<script>setTimeout(function(){window.location.href = 'changepass.php';}, 3000);</script>";
                                
                            }
                        ?>

