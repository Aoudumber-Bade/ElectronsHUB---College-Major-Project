<?php 

  include('./admin/connect.php'); 
?>


<?php include('./header.php'); ?>

<div class="main-content-box shapedividers_com-3936" >
`<div class="header-content" >
        <h1 class="lg-heading text-light">All-time favorite</h1>
        <p class="text-light hm-p">
          iPhone <b>|</b> Samsung <b>|</b> Xiomi <b>|</b> Google
        </p>
        <a href="./blog.php" class="text-red btn btn-primary" target="_blank">Explore More</a>
      </div>
    </div>

  <section class="categories">
    <div className="categories-container">
      <div class="content-box">
      <h1 class="bg">Best Products</h1>
      <p>
        Review your goals twice every day in order to be focused on
        achieving them.
      </p>

      <div class="row1 rowws">
      <?php
        $query = "SELECT * FROM categories";
        $data = mysqli_query($conn,$query);

        $total = mysqli_num_rows($data);

        if($total!=0){
          while($res = mysqli_fetch_assoc($data)){ ?>

          <a href='index.php?hcid=<?= $res['id'] ?>' data-aos="fade-down">
            <div class='cat-col' style='background: linear-gradient(rgba(9, 5, 54, 0.1), rgba(5, 4, 46, 0.6)),url("./admin/<?= $res['cat_img']  ?>");'>
              <div class='cat-content'>
                  <h3> <?= $res['category'] ?></h3>
                </div>
              </div>
            </a>


          <?php }
        }
      ?>
    
      </div>

      <div class="row2 rowws">

      </div>
    </div>
      </div>
  </section>

  <!-- Shape Divider -->

  <div class="custom-shape-divider-bottom-1674106513">
    <svg data-name="Layer 1" viewBox="0 0 1200 120" preserveAspectRatio="none">
      <path
        d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
        class="shape-fill"></path>
    </svg>
  </div>

  <!-- blog container -->
  <section id="blog-container">
    <div class="blogs">
      <h2 id="h2">Blog Posts
        <hr>
      </h2>

      <?php
      
      if (isset($_GET['hcid'])) {
        $id = mysqli_real_escape_string($conn, $_GET['hcid']);
        $query = "SELECT * FROM blog LEFT JOIN categories ON blog.category = categories.id LEFT JOIN users ON  blog.author_id=users.user_id WHERE id='$id' ORDER BY publish_date DESC LIMIT 5";
      } else {
        $query = "SELECT * FROM blog LEFT JOIN categories ON blog.category = categories.id LEFT JOIN users ON  blog.author_id=users.user_id ORDER BY publish_date DESC LIMIT 5";
      }

      $data = mysqli_query($conn,$query);

      $total = mysqli_num_rows($data);

      if($total>0){
        while($res=mysqli_fetch_assoc($data)){ ?>
          <div class="post" data-aos="fade-down">
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

      <?php  }

      }
      
      ?>

      <a href="./blog.php" id="btn-post" class="gt-home">Load More Posts</a>
    </div>
    <?php include("./catlog.php"); ?>
  </section>
<!-- ------------------------- Author Section -------------------------- -->
<section class="author" id="instructors">
<div class="section-heading">
        <p>CodeMakerrrs</p>
        <h3>Web Developers</h3>
        </div>
      <div class="author-container">
       <div class="author-box box-2">
      <div class="box-content-a bc2" data-aos="fade-up">
        <img src="./img/p3.png" class="dimg bw" alt="this is a author image" />
        <!-- <img src="./img/brushes.png" alt="" class="brush_img"> -->
        <div class="content-a c-box2">
          <h2><span>Ritesh Gawai</span></h2>
          <h3>Backend Developer</h3>
        </div>

        <div class="social-acc sac2">
          <li>
            <a href="https://www.instagram.com/ritesh_gawai30" target="_blank">
              <i class="fab fa-instagram"></i></a>
          </li>
          <li>
            <a href="https://www.instagram.com/ritesh_gawai30" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
          </li>

          <li>
           <a href="https://youtube.com/@Error_programming?si=YsAp253PoiMjKGmt"> <i class="fab fa-youtube"></i></a>
          </li>
        </div>
      </div>
    </div>
    
        <div class="author-box">
      <div class="box-content-a bc1" data-aos="fade-down">
        <img src="./img/p23.png" class="" alt="this is a author image" />
        <div class="content-a">
          <h2><span>Aoudumber Bade</span></h2>
          <h3>Full Stack Developer</h3>
        </div>

        <div class="social-acc">
          <li>
            <a href="https://www.instagram.com/aoudumbersbade/" target="_blank">
              <i class="fab fa-instagram"></i></a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/audumbar-bade/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
          </li>

          <li>
           <a href="https://youtube.com/@toxicprogrammer69?si=5a4OkZhjzJ0Rk5Re"> <i class="fab fa-youtube"></i></a>
          </li>
        </div>
      </div>
    </div>
    
        <div class="author-box box-2">
      <div class="box-content-a bc2" data-aos="fade-up">
        <img src="./img/p2.png" class="" alt="this is a author image" />
        <div class="content-a c-box2">
          <h2><span>Aditya Bangar</span></h2>
          <h3>Aandu-Pandu</h3>
        </div>

        <div class="social-acc sac2">
          <li>
            <a href="https://www.instagram.com/aditya_bangar.50" target="_blank">
              <i class="fab fa-instagram"></i></a>
          </li>
          <li>
            <a href="" target="_blank"> <i class="fab fa-facebook"></i></a>
          </li>

          <li>
           <a href="https://youtube.com/@toxicprogrammer69?si=5a4OkZhjzJ0Rk5Re"> <i class="fab fa-youtube"></i></a>
          </li>
        </div>
      </div>
    </div>
    
       <div class="author-box">
      <div class="box-content-a bc1" data-aos="fade-down">
        <img src="./img/p4.png" class="dimg bw" alt="this is a author image" />
        <div class="content-a">
          <h2><span>Vikram Gujar</span></h2>
          <h3>Frontend Developer</h3>
        </div>

        <div class="social-acc">
          <li>
            <a href="https://www.instagram.com/vikram_gujar_vg" target="_blank">
              <i class="fab fa-instagram"></i></a>
          </li>
          <li>
            <a href="" target="_blank"> <i class="fa-brands fa-linkedin-in"></i></a>
          </li>

          <li>
            <a href="https://youtube.com/@toxicprogrammer69?si=5a4OkZhjzJ0Rk5Re"> <i class="fab fa-youtube"></i></a>
          </li>
        </div>
      </div>
        </div>
      </div>
</section>


<?php include("./footer.php"); ?>