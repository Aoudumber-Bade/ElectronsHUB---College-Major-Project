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

<body id="table">

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
                <p class="logo-text">Blog Table</p>
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



             <div class="forms-container">
                <h2 class="hd2">Blog Posts</h2>
                <div class="table-wrapper">
                    <table class="bordered-table">
                        <tr class="margin-t">
                            <th>Operations</th>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Publish Date</th>
                        </tr>

                        
                         <?php
                        $limit = 5;

                        if (isset($_GET['page'])) {
                          $page = $_GET['page'];
                        } else {
                          $page = 1;
                        }

                        $offset = ($page - 1) * $limit;
                        $query = "SELECT * FROM blog LEFT JOIN categories ON blog.blog_id = categories.id LEFT JOIN users ON  blog.author_id=users.user_id  ORDER BY publish_date DESC LIMIT {$offset}, {$limit}";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);

                        if ($total != 0) {
                          $number = ($page - 1) * $limit + 1;
                          while ($result = mysqli_fetch_assoc($data)) {
                            echo "
                            <tr>
                                <td class='opbtns'><a href='blog.php?bid=$result[blog_id]&blog_title=$result[title]&b_image=$result[blog_image]&category=$result[category]' name='update' class='btn-primary update_btn'>Update</a>
                                <a href=\"blog_table.php?bid=$result[blog_id]&delete=true\" name=\"delete\" class=\"btn-primary g3 dlbtn\">Delete</a></td>
                                <td>$number</td>
                                <td>" . $result['title'] . "</td>
                                <td>" . strip_tags(substr(ucfirst($result['blog_body']),0,60)). "....</td>
                                <td>" . $result['blog_image'] . "</td>
                                <td>" . $result['category'] . "</td>
                                <td>" . $result['author_id'] . "</td>
                                <td>" . $result['publish_date'] . "</td>
                              </tr>
                              " . $number++ . "
                            ";
                          }
                        } else {
                          echo "No Records Found";
                        }
                        ?>
                    </table>
                </div>

                <!-- ------------------------ Pagination ------------------------ -->


                <?php
                  
                  $pagination = "SELECT * FROM blog WHERE 1";
                  $data = mysqli_query($conn, $pagination) or die("<script>alert('server down');</script>");

                  if(mysqli_num_rows($data)>0){
                    $total_records = mysqli_num_rows($data);
                    $total_page = ceil($total_records/$limit);
                ?>


                <div class="pagination-container">
                  <div class="pagination-left">
                    <?php if($page>1){ ?>
                    <a href="blog_table.php?page=<?php echo $page-1; ?>" class="">&lt;</a>
                    <?php } ?>
                  </div>
                  
                  <div class="pagination-num">
                    <?php
                      for($i=1; $i<=$total_page; $i++){
                    ?>
                    <a href="blog_table.php?page=<?php echo $i; ?>" class=""><?php echo $i; ?></a>
                    <?php } ?>
                  </div>

                  <div class="pagination-right">
                    <?php if($page<$total_page){ ?>    
                    <a href="blog_table.php?page=<?php echo $page+1; ?>" class="">	&gt;</a>
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
    VALUES ('$title', '$body', '$folder', '$category', '$author')";
$dataa = mysqli_query($conn, $sql);

    

            if($dataa) {
                echo "data inserted";
            }
            else {
                echo "data not inserted";
            }
    
    }
}
?>

<?php

if(isset($_GET['bid'])) {
    $srno = $_GET['bid'];

    $dquery = "DELETE FROM blog WHERE blog_id='$srno'"; 
    $stmt = mysqli_query($conn, $dquery);
    if($stmt){
        echo "<div class='pop-box'>
        <div class='s-icon'>
          <i class='fa-sharp fa-solid fa-circle-check'></i>
        </div>
        <div class='pop-c'>
          <p>The Post is deleted from the Website!!!!</p>
        </div>
      </div>
        ";
    }
    else{
        echo "<div class='pop-box fail'>
        <div class='s-icon'>
          <i class='fa-sharp fa-solid fa-circle-check'></i>
        </div>
        <div class='pop-c'>
          <p>Failed to delete yje post!!!!</p>
        </div>
      </div>";
    }
    echo "<script>setTimeout(function(){window.location.href = 'blog_table.php';}, 3000);</script>";
}
