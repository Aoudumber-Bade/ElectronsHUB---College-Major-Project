
<?php 
  include('./admin/connect.php'); 
?>

<?php include('./header.php'); ?>

    <section id="blog-home">
      <h2>Blog</h2>
    </section>

    <!-- blog container -->
    <section id="blog-container">
      <div class="blogs">
        <h2 id="h2">
          Blog Posts
          <hr />
        </h2>
        <?php

      $limit = 5;

      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = 1;
      }

      $offset = ($page - 1) * $limit;

      if (isset($_GET['cid'])) {
        $id = mysqli_real_escape_string($conn, $_GET['cid']);
        $query = "SELECT * FROM blog LEFT JOIN categories ON blog.category = categories.id LEFT JOIN users ON  blog.author_id=users.user_id WHERE id='$id' ORDER BY publish_date DESC LIMIT {$offset}, {$limit}";
    } else {
      $query = "SELECT * FROM blog LEFT JOIN categories ON blog.category = categories.id LEFT JOIN users ON  blog.author_id=users.user_id ORDER BY publish_date DESC LIMIT {$offset}, {$limit}";
    }
      $data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($data);

      if($total>0){
        $number = ($page - 1) * $limit + 1;
        while($res=mysqli_fetch_assoc($data)){ ?>
          <div class="post" data-aos="fade-left">
        <div class="post-img">
          <img src="./admin<?= $res['blog_image']; ?>" alt="">
        </div>

        <div class="post-cont">
        <div class="cr">
            <div class="p-cr"> <img src="./admin<?= $res['user_image'] ?>" alt=""> <h4><?= ucfirst($res['username']); ?></h4></div>
            <h4 class="p-cr"><i class="fa-solid fa-calendar"></i> <?= date('d-M-Y',strtotime($res['publish_date'])); ?></h4>
            <!-- <div class="p-cr"><i class="fa-solid fa-tag"></i> <h4></h4></div> -->
          </div>

          <div class="h-post">
            <h3><?= ucfirst($res['title']); ?></h3>
            <p><?= strip_tags(substr(ucfirst($res['blog_body']),0,200)); ?>...</p>
          </div>
          <a href="./post.php?id=<?= $res['blog_id']; ?>" class="read-btn">Read More</a>
        </div>
      </div>

      <?php  
      $number++;
      }
      }
      
      ?>



<a href="./index.php" id="prv-btn" class="gt-home">Go To Home</a>
</div>

<?php include("./catlog.php"); ?>
</section>
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
                    <a href="blog.php?page=<?php echo $page-1; ?>" class="">&lt;</a>
                    <?php } ?>
                  </div>
                  
                  <div class="pagination-num">
                    <?php
                      for($i=1; $i<=$total_page; $i++){
                    ?>
                    <a href="blog.php?page=<?php echo $i; ?>" class=""><?php echo $i; ?></a>
                    <?php } ?>
                  </div>

                  <div class="pagination-right">
                    <?php if($page<$total_page){ ?>    
                    <a href="blog.php?page=<?php echo $page+1; ?>" class="">	&gt;</a>
                    <?php } ?>
                  </div>
                  <?php } ?>
    
    <?php include("./footer.php"); ?>