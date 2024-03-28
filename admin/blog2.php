<?php
    // error_reporting(0);
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
                #Image Upoload Form
            -->

            <section class="registration-form">
            <div class="form-container">
            <form method="POST" action="#" enctype="multipart/form-data" class="blog_form">
              <div class="form-row">
                <div class="inp">
                  <label for="fullName"
                    ><i class="fa-solid fa-pen"></i> Title</label
                  >
                  <input
                    type="text"
                    name="blog_title"
                    placeholder="Title"
                    required
                  />
                </div>

              </div>

              <div class="form-row">
                <div class="inp">
                  <label for="fullName"
                    ><i class="fa-solid fa-file-pen"></i> Blog Blody</label
                  >
                  <textarea
                    name="blog_body"
                    id="editor"
                    placeholder="Blog Body....."
                    cols="30" rows="10"
                    required
                  ></textarea>
                </div>
              

              </div>

              <div class="form-row">
                <div class="inp">
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

              <div class="form-row">
                <div class="inp">
                  <label for="age"><i class="fa-solid fa-image"></i> Select Category</label>
                  <select name="category" id="">
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


              <div class="form-btns btn-primary">
              <i class="fa-solid fa-circle-plus"></i>
              <input
                  type="submit"
                  class="ytb"
                  name="submit"
                  value="Add Video"
                />
              </div>
            </form>
          </div>
             </section>

        </div>
    </div>

</body>
    <script src="../jQuery/jquery-3.7.0.min.js"></script>
<script src="./script.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script> -->
<!-- <script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script> -->

</html>



<?php
     $title = mysqli_real_escape_string($conn,ucfirst($_POST["blog_title"]));
     $body = mysqli_real_escape_string($conn,ucfirst($_POST["blog_body"]));
     $category = mysqli_real_escape_string($conn,ucfirst($_POST["category"]));
                  
if(isset($_POST['submit'])){
       
  // $filename = $_FILES['blog_image']['name'];
  // $tempname = $_FILES['blog_image']['tmp_name'];
  // $folder = "./blog_images/" .$filename;

  // $file_ext = explode('.',$filename);

  // $ext_check = strtolower(end($file_ext));
  // $ext = array('jpg','jpeg','png');

  // if(in_array($ext_check,$ext)){
  //   move_uploaded_file($tempname,$folder);

 
            $sql = "INSERT INTO blog(title,blog_body,category,author_id) VALUES('{$title}','{$body}','{$category}','{$author}') ";
            $dataa = mysqli_query($conn,$sql);

            if($dataa) {
                echo "data inserted";
            }
            else {
                echo "data not inserted";
            }
    }

  

    echo "hiiiiiiiiiiiiiiii";
    echo "$author";

?>
