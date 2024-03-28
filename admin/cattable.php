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
    <link rel="website icon" type="jpeg" href="./img/Symo icon.png">
    <link rel="stylesheet" href="../Font Awesome/css/all.css" />
    <link rel="stylesheet" href="./style.css">
    <title>Admin Pane - ElectronsHUB</title>
</head>

<body id="yt">

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
                <p class="logo-text">Categories</p>
                <div class="pro-box">
                <p>Welcome,
            <?= ucfirst($_SESSION['users']['1']); ?><span>❤️</span>
          </p>


                    <img src="<?= $_SESSION['users']['5']; ?>" alt="" class="profile">
                    <div class="profile-links">
                    <a href="./changepass.php"><i class="fa fa-user"></i>   Change Password</a>
			        <a href="./logout.php"><i class="fa fa-power-off"></i>   Log Out</a>
                    </div>
                </div>
            </div>

            <!---
                #Image Upoload Form
            -->

            <section class="registration-form">
            <div class="form-container">
            <form method="post" action="#" enctype="multipart/form-data">
              <div class="form-row">
                <div class="inp">
                  <label for="fullName"
                    ><i class="fa-solid fa-tag"></i> Category Name</label
                  >
                  <input
                    type="text"
                    name="category_name"
                    placeholder="Title"
                    required
                  />
                </div>

                <!-- <div class="inp">
                  <label for="date"
                    ><i class="fa-solid fa-calendar-days"></i> Published Date</label
                  >
                  <input
                    type="date"
                    name="date"
                    class="inps"
                    required
                  />
                </div> -->
              </div>

              <div class="form-row">
                <div class="inp">
                  <label for="age"><i class="fa-solid fa-image"></i> Upload Category Image</label>
                  <input
                    type="file"
                    name="category_image"
                    class="custom-file-input"
                    placeholder=""
                    required
                  />
                </div>

                <!-- <div class="inp">
                  <label for="blood"
                    ><i class="fa-solid fa-eye"></i> Video Views</label
                  >
                  <input
                    class="blood-inp"
                    type="text"
                    name="views"
                    placeholder="Views"
                    required
                  />
                </div> -->
              </div>
              <!-- <div class="form-row">
                <div class="inp">
                  <label for="blood"
                    ><i class="fa-solid fa-link"></i>Youtube Video Url</label
                  >
                  <input
                    class="blood-inp"
                    type="text"
                    name="url"
                    placeholder="example:https://youtu.be/5NdnytGuXGs"
                    required
                  />
                </div>
              </div> -->

              <div class="form-btns btn-primary">
              <i class="fa-solid fa-circle-plus"></i>
              <input
                  type="submit"
                  class="ytb"
                  name="submit"
                  value="Add"
                />
              </div>
            </form>
          </div>
             </section>

            <div class="gallary yt">
                <h3 class="gd-color yt1">Categories</h3>
                <div id="a-gallary">
                    <div class="gal-headings">
                        <p class="g1">Category Image</p>
                        <p id="p2" class="g2">Category Name</p>
                        <p class="">Operation</p>
                    </div>
                    
                    <div id="gal-box">
                        <?php
                            $limit=3;

                            if(isset($_GET['page'])){
                              $page = $_GET['page'];
                            }else{
                              $page=1;
                            }
  
                            $offset = ($page - 1) * $limit;
                            
                        
                            $query = "SELECT * FROM categories LIMIT {$offset}, {$limit}";
                            $data = mysqli_query($conn,$query); 
                            $total = mysqli_num_rows($data);

                            if($total != 0){
                                while($result = mysqli_fetch_assoc($data)){
                                    echo "<div class='col-gal'>
                                        <img src='".$result['cat_img']."' class='g1'>
                                        <p class='g2'>".$result['category']."</p>
                                        <a href='cattable.php?catimg=$result[cat_img]' name='delete' class='btn-primary g3'><i class='fa-solid fa-trash-can'></i> Delete</a>
                                    </div>";
                                }
                            }
                        
                        ?>
                    </div>
                       <!-- ------------------------ Pagination ------------------------ -->


                <?php
                  
                  $pagination = "SELECT * FROM categories WHERE 1";
                  $data = mysqli_query($conn, $pagination) or die("<script>alert('server down');</script>");

                  if(mysqli_num_rows($data)>0){
                    $total_records = mysqli_num_rows($data);
                    $total_page = ceil($total_records/$limit);
                ?>


                <div class="pagination-container">
                  <div class="pagination-left">
                    <?php if($page>1){ ?>
                    <a href="cattable.php?page=<?php echo $page-1; ?>" class="">&lt;</a>
                    <?php } ?>
                  </div>
                  
                  <div class="pagination-num">
                    <?php
                      for($i=1; $i<=$total_page; $i++){
                    ?>
                    <a href="cattable.php?page=<?php echo $i; ?>" class=""><?php echo $i; ?></a>
                    <?php } ?>
                  </div>

                  <div class="pagination-right">
                    <?php if($page<$total_page){ ?>    
                    <a href="cattable.php?page=<?php echo $page+1; ?>" class="">	&gt;</a>
                    <?php } ?>
                  </div>
                  <?php } ?>           
                    
                </div>

            </div>


        </div>
    </div>

</body>
    <script src="../jQuery/jquery-3.7.0.min.js"></script>
<script src="./script.js"></script>

</html>

<?php

    $cateimg = $_GET['catimg'];

    if(file_exists($cateimg)){
        unlink($cateimg);

        $query = "DELETE FROM categories WHERE cat_img = '$cateimg'";
        $data = mysqli_query($conn,$query);

        if($data){
            echo "<div class='pop-box'>
            <div class='s-icon'>
              <i class='fa-sharp fa-solid fa-circle-check'></i>
            </div>
            <div class='pop-c'>
              <p>Category is deleted</p>
            </div>
          </div>";
        }else{
            echo "<div class='pop-box fail'>
            <div class='s-icon'>
              <i class='fa-sharp fa-solid fa-circle-check'></i>
            </div>
            <div class='pop-c'>
              <p>Failed to delete the Category!!</p>
            </div>
          </div>";
                echo "Error: " . mysqli_error($conn);
        }
        echo "<script>setTimeout(function(){window.location.href = 'ytable.php';}, 3000);</script>";
    }

?>



<?php

    $category_name = $_POST['category_name'];

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
            <p>The Category is Added Successfully!!!</p>
          </div>
        </div>";
        }else{
          echo "<div class='pop-box fail'>
          <div class='s-icon'>
            <i class='fa-sharp fa-solid fa-circle-check'></i>
          </div>
          <div class='pop-c'>
            <p>Failed to add the Category!!</p>
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
    echo "<script>setTimeout(function(){window.location.href = 'cattable.php';}, 3000);</script>";
  }

?>
