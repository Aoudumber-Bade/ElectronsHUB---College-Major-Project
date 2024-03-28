<?php
    error_reporting(0);
    include("./connect.php");

    session_start();

    $author = $_SESSION["users"]["0"];

    if(!isset($_SESSION['users'])){
      header("location:http://localhost/electronshub/admin/login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Aoudumber Bade - CodeWebDev">
    <link rel="website icon" type="jpeg" href="./img/Symo icon.png">
    <link rel="stylesheet" href="../Font Awesome/css/all.css" />
    <link rel="stylesheet" href="./style.css" />
    <title>Admin Pane - ElectronsHUB</title>
  </head>

  <body class="table" id="yt">
    <!----
        #Main Content 
    -->

    <div id="main">
      <!---
            #Side Navigation Bar
        -->

      <?php include("./sidenav.php"); ?>

      <div id="main-content">
        <!---
                Top Navigation Bar
            -->

        <div id="top-nav">
          <p class="logo-text">Dashboard</p>
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
                #Dashboard
            -->
          

      </div>
    </div>
  </body>
      <script src="../jQuery/jquery-3.7.0.min.js"></script>
  <script src="./script.js"></script>
</html>


<?php

    $category_name = $_POST['category_name'];
    // $date = $_POST['date'];
    // $views = $_POST['views'];
    // $url = $_POST['url'];

  if($_POST['submit']){


    $folder = "/img/";
    $filename = $_FILES['category_image']['name'];
    $tempname = $_FILES['category_image']['tmp_name'];
    $folder = "./img/" .$filename;

    $file_ext = explode('.',$filename);

    $ext_check = strtolower(end($file_ext));
    $ext = array('jpg','jpeg','png');

    if(in_array($ext_check,$ext)){
      move_uploaded_file($tempname,$folder);

      if($filename != ""){
        $query = "INSERT INTO categories(category, cat_img) VALUES('$category_name', '$folder')";
        $data = mysqli_query($conn,$query);
  
        if($data){
          echo "<div class='pop-box'>
          <div class='s-icon'>
            <i class='fa-sharp fa-solid fa-circle-check'></i>
          </div>
          <div class='pop-c'>
            <p>The Video is Added Successfully!!!</p>
          </div>
        </div>";
        }else{
          echo "<div class='pop-box fail'>
          <div class='s-icon'>
            <i class='fa-sharp fa-solid fa-circle-check'></i>
          </div>
          <div class='pop-c'>
            <p>Failed to add the video!!</p>
          </div>
        </div>";
            echo "Error: " . mysqli_error($conn);
        }
      }

    }else{
      echo "<div class='pop-box fail'>
      <div class='s-icon'>
        <i class='fa-sharp fa-solid fa-circle-check'></i>
      </div>
      <div class='pop-c'>
        <p>File Extension is not allowed!</p>
      </div>
    </div>";
    }
    echo "<script>setTimeout(function(){window.location.href = 'ytvideos.php';}, 3000);</script>";
  }

?>
