<?php 

  include('./connect.php'); 

  session_start();
  $author = $_SESSION["guests"]["0"];
  if(!isset($_SESSION['guests'])){
    header("location:http://localhost/electronshub/signUp.php");
  }

?>



<?php
  error_reporting(0);
  session_start();

  include('./admin/connect.php');

  if(isset($_SESSION["guests"])){
    $user = $_SESSION['username'];
  }

  $guest_picture = $_SESSION["profile_picture"];

?>


<!DOCTYPE html>
<html>

<head>
  <meta name="author" content="Aoudumber Bade - CodeWebDev">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="./guest.css" />
  <link rel="stylesheet" href="./Font Awesome/css/all.css" />
  <script src="https://kit.fontawesome.com/2e95d79f91.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <title>ElectronsHUB</title>
</head>

<body>
  <section class="header">
    <?php if(isset($_SESSION["userlogged"])) { ?>
      <div class="top_header">
        <div class="th_box">
          <div class="th_content_box">
            <div class="th_icon_box1">
            <i class="fa-solid fa-mobile"></i>
            </div>
            <p class="blue_text"> +91 8788231610</p>
            <p> | </p>
          </div>
          <div class="th_content_box">
          <div class="th_icon_box2">
            <i class='far fa-envelope'></i>
            </div>
          <p class="blue_text th_flex_center"> Electronshubofficial@gmail.com</p>
          </div>
        </div>
        <div class="th_box">
        <a href="./guest_post.php" class="logout_btn">
          <div class="logout_button th_flex_center">
            <div class="th_icon_box4 thib">
            <i class="fa-solid fa-pen-to-square" style="padding-right: 0;
    color: #fff;"></i>
            </div>
            <p>Guest Post</p>
            <p> | </p>
          </div>
        </a>
        <a href="../logout.php" class="logout_btn">
          <div class="logout_button th_flex_center">
            <div class="th_icon_box3 thib">
            <i class="fa-solid fa-right-from-bracket"></i>
            </div>
            <p>Logout</p>
            <p> | </p>
          </div>
        </a>
          <div class="guest_img_box">
            <img src="<?php  if(!empty($guest_picture)){ echo $guest_picture; } else { echo "../img/user.png"; } ?>" alt="">
          </div>
          <p class="br_left">Welcome, <?= ucfirst($_SESSION["username"]); ?>❤️</p>
        </div>
      </div>
      <?php } ?>
      <nav class="navbar <?php if(isset($_SESSION["userlogged"])){ echo 'margin_top_nav'; } ?>" data-navbar>
        <div class="logo">Electrons<span>HUB</span></div>
        <div class="nav-links">
          <ul id="menu">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../blog.php">Blogs</a></li>
            <li><a href="../about.php">About</a></li>
            <li><a href="../Contact.php">Contact</a></li>
            <?php 
              if(isset($_SESSION["userlogged"])){

              }else { ?>
                <a href="../signUp.php" id="red">Sign Up</a>
              <?php }
            ?>
            <a href="#" id="crossbar" onclick="closeMenuBar()"><i class="fa-solid fa-xmark"></i></a>
          </ul>
        </div>
        <a href="#" id="iconbar" onclick="responsiveMenu()"><i class="fa-solid fa-bars"></i></a>
      </nav>
  </section>



<section class="registration-form categories" style="position: relative;
    height: 160vh;">
            <div class="form-container" style=" 
                width: 90%;
    padding: 58px;
    position: absolute;
    top: 34%;
    left: 50%;
    transform: translate(-50%, -21%);">
                  <div class="section-heading sectionHeading">
                    <h3>Guest Post</h3>
                    </div>
            <form method="POST" action="#" enctype="multipart/form-data" class="blog_form">
              <div class="form-row">
                <div class="inps">
                  <label for="fullName"
                    ><i class="fa-solid fa-pen"></i> Title</label
                  >
                  <input
                    type="text"
                    name="blog_title"
                    placeholder="Title"
                    value="<?php echo $blog_title ?>"
                    required
                  />
                </div>

              </div>

              <div class="form-row">
                <div class="inps">
                  <label for="age"><i class="fa-solid fa-image"></i> Upload Image</label>
                  <input
                    type="file"
                    name="blog_image"
                    class="custom-file-input"
                    placeholder=""
                    required
                  />
                </div>

              </div>

              <div class="form-row textareas">
                <div class="inps">
                  <label for="fullName"
                    ><i class="fa-solid fa-file-pen"></i> Blog Blody</label
                  >
                  <textarea
                    name="blog_body"
                    id="blog"
                    placeholder="Blog Body....."
                    
                    cols="30" rows="10"
                    required
                  ></textarea>
                </div>
              

              </div>

           

              <div class="form-row">
                <div class="inps">
                  <label for="age"><i class="fa-solid fa-image"></i> Select Category</label>
                  <select name="category" id="" value="<?php echo $category ?>">
                    <?php
                        $query = "SELECT * FROM categories";
                        $data = mysqli_query($conn, $query);
                        while ($result = mysqli_fetch_assoc($data)) { ?>
                            <option value="<?= $result['id']?>"><?= ucfirst($result['category']); ?></option>
                        <?php }    
                    ?>
                  </select>
                </div>

              </div>


              <div class="form-btns read-btn">
              <i class="fa-solid fa-circle-plus"></i>
              <input
                  type="submit"
                  class="ytb "
                  name="submit"
                  value="Add Post"
                />
              </div>
            </form>
          </div>
             </section>


<?php include("../footer.php"); ?>




<?php
                  
if(isset($_POST['submit'])){

    $title = mysqli_real_escape_string($conn,ucfirst($_POST["blog_title"]));
    $body = mysqli_real_escape_string($conn,ucfirst($_POST["blog_body"]));
    $cate = mysqli_real_escape_string($conn,ucfirst($_POST["category"]));
       
  $filename = $_FILES['blog_image']['name'];
  $tempname = $_FILES['blog_image']['tmp_name'];
  $folder = "./blog_images/" .$filename;

  $file_ext = explode('.',$filename);

  $ext_check = strtolower(end($file_ext));
  $ext = array('jpg','jpeg','png');

  if(in_array($ext_check,$ext)){
    move_uploaded_file($tempname,$folder);
    $sql = "INSERT INTO blog (title, blog_body, blog_image, category, author_id)
    VALUES ('$title', '$body', '$folder', '$cate', '$author')";
    $dataa = mysqli_query($conn, $sql);


    if($data){
      echo "<div class='pop-box'>
      <div class='s-icon'>
        <i class='fa-sharp fa-solid fa-circle-check'></i>
      </div>
      <div class='pop-c'>
        <p>Post Published Successfully!</p>
      </div>
    </div>";
  }else{
      echo "<div class='pop-box fail'>
      <div class='s-icon'>
        <i class='fa-sharp fa-solid fa-circle-check'></i>
      </div>
      <div class='pop-c'>
        <p>Failed to publish the post!!</p>
      </div>
    </div>";
          echo "Error: " . mysqli_error($conn);
  }
  echo "<script>setTimeout(function(){window.location.href = 'http://localhost/electronshub/index.php';}, 3000);</script>";
    
    }
}
?>