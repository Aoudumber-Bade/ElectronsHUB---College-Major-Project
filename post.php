<?php 
  session_start();

  include('./admin/connect.php'); 
?>


<?php include('./header.php'); 
$blogID = $_GET['id'];

$query = "SELECT * FROM blog LEFT JOIN users ON  blog.author_id=users.user_id Where blog_id = '$blogID'"; 
$data = mysqli_query($conn,$query);

$total = mysqli_num_rows($data);

$res = mysqli_fetch_assoc($data);


?>

    <!-- Post  -->
    <div id="blog-container">
      <div class="blogs blogpost">
        <div class="posts post-img">
          <img src="./admin<?= $res['blog_image'] ?>" alt="" />
          <br /><br /><br />
          <div class="p-head">
            <h1 class="pp-head"><?= ucfirst($res['title']) ?></h1>
            <div class="cr">
            <div class="p-cr"> <img src="./admin<?= $res['user_image'] ?>" alt=""> <h4><?= ucfirst($res['username']); ?></h4></div>
            <h4 class="p-cr"><i class="fa-solid fa-calendar"></i> <?= date('d-M-Y',strtotime($res['publish_date'])); ?></h4>
            <!-- <div class="p-cr"><i class="fa-solid fa-tag"></i> <h4></h4></div> -->
          </div>
          </div>

          <p>
            <?= $res['blog_body'] ?>
          </p>

        </div>
        <a href="./index.php" class="read-btn">Go Back</a>
        <a href="./blog.php" id="prv-btn">More Blogs</a>
      </div>
    </div>

    <div class="post-comment">
      <form action="" method="post">
        <h2>Leave a Comment</h2>
        <input type="text" id="name" name="name" placeholder="Your Full Name" required />
        <input
          type="email"
          id="email"
          name="email"
          placeholder="Your Email Address"
          required
        />
        <textarea
          class="p-text"
          rows="6"
          id="comment"
          name="message"
          placeholder="Type Your Comment"
        ></textarea>
        <button type="submit" name="post_comment" class="yellow" id="add-comment">
          Post Comment
        </button>
      </form>
    </div>

    <div class="comm">
      <h2>Comments</h2>
      <div id="comments">
         <?php
            $blog_id = $res['blog_id'];
            $sql = "SELECT * from comments where post_id = '$blog_id'";
            $run = mysqli_query($conn,$sql);

            $total = mysqli_num_rows($run);
            if ($total>0) {
              while ($row=mysqli_fetch_assoc($run)) {  ?>
               <div class="comments_container">
            <div class="comment_profile_box">
              <div class="comment_img_box">
                <img src="./img/user.png" alt="">
              </div>
              <div class="comment_name_box">
                
                <p><strong><?= $row['c_name'] ?></strong><?= date('d-M-Y',strtotime($row['date'])); ?></p>
                <div class="comment_message_box"><p><?= $row['c_message'] ?></p>
            </div>
              </div>
            </div>
            
          </div>
            <?php }
            }
         ?>
      </div>
    </div>
    <!-- -------------------- Footer Section --------------------- -->
    <!-- Footer -->

    <?php include("./footer.php"); ?>

    <?php

  if(isset($_POST['post_comment'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    // $blogs_id = $res['blog_id'];

    $query = "INSERT INTO comments(c_name,c_email,c_message,post_id) VALUES('$name','$email','$message','$blogID')";
    $data = mysqli_query($conn,$query);
    
    if($data) {
      echo "<script>alert('Message Sent Successfully!');window.location='index.php';</script>";
    } else{
      echo "<script>alert('Error Sending Message! Please Try Again Later.');window.location='contactus.php'</script>";
    }
  }

?>