
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
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="stylesheet" href="./guest.css" />
  <link rel="stylesheet" href="./Font Awesome/css/all.css" />
  <script src="https://kit.fontawesome.com/2e95d79f91.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" id="anim" />
  <title>ElectronsHUB</title>
</head>

<body>
  <section class="header">
    <?php if(isset($_SESSION["userlogged"])) { ?>
      <div class="top_header">
        <div class="th_box">
          <div class="th_content_box">
            <div class="th_icon_box1">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="64" stroke-dashoffset="64" d="M8 3C8.5 3 10.5 7.5 10.5 8C10.5 9 9 10 8.5 11C8 12 9 13 10 14C10.3943 14.3943 12 16 13 15.5C14 15 15 13.5 16 13.5C16.5 13.5 21 15.5 21 16C21 18 19.5 19.5 18 20C16.5 20.5 15.5 20.5 13.5 20C11.5 19.5 10 19 7.5 16.5C5 14 4.5 12.5 4 10.5C3.5 8.5 3.5 7.5 4 6C4.5 4.5 6 3 8 3Z"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="64;0"/><animateTransform attributeName="transform" begin="0.6s;lineMdPhoneCallLoop0.begin+2.6s" dur="0.5s" type="rotate" values="0 12 12;15 12 12;0 12 12;-12 12 12;0 12 12;12 12 12;0 12 12;-15 12 12;0 12 12"/></path><path stroke-dasharray="4" stroke-dashoffset="4" d="M14 7.04404C14.6608 7.34734 15.2571 7.76718 15.7624 8.27723M16.956 10C16.6606 9.35636 16.2546 8.77401 15.7624 8.27723" opacity="0"><set id="lineMdPhoneCallLoop0" attributeName="opacity" begin="0.7s;lineMdPhoneCallLoop0.begin+2.7s" to="1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s;lineMdPhoneCallLoop0.begin+2.7s" dur="0.2s" values="4;8"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="1.3s;lineMdPhoneCallLoop0.begin+3.3s" dur="0.3s" values="0;4"/><set attributeName="opacity" begin="1.6s;lineMdPhoneCallLoop0.begin+3.6s" to="0"/></path><path stroke-dasharray="10" stroke-dashoffset="10" d="M20.748 9C20.3874 7.59926 19.6571 6.347 18.6672 5.3535M15 3.25203C16.4105 3.61507 17.6704 4.3531 18.6672 5.3535" opacity="0"><set attributeName="opacity" begin="1s;lineMdPhoneCallLoop0.begin+3s" to="1"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="1s;lineMdPhoneCallLoop0.begin+3s" dur="0.2s" values="10;20"/><animate fill="freeze" attributeName="stroke-dashoffset" begin="1.5s;lineMdPhoneCallLoop0.begin+3.5s" dur="0.3s" values="0;10"/><set attributeName="opacity" begin="1.8s;lineMdPhoneCallLoop0.begin+3.8s" to="0"/></path></g></svg>
            </div>
            <p class="blue_text"> +91 8788231610</p>
            <p> | </p>
          </div>
          <div class="th_content_box">
          <div class="th_icon_box2">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" d="M13.021 11.17q.217.16.479.16t.479-.16L21 5.943q0-.254-.067-.558q-.068-.305-.125-.501L13.5 10.312L6.154 4.923q-.058.196-.106.491T6 5.944zm-9.406 8.6q-.69 0-1.152-.463Q2 18.844 2 18.154v-9q0-.214.143-.357q.144-.143.357-.143t.357.143t.143.357v9q0 .27.173.442t.442.173h14.27q.213 0 .356.144t.144.356q0 .214-.144.357t-.356.143zm3-3q-.69 0-1.152-.463Q5 15.844 5 15.154v-9.77q0-.69.463-1.152t1.152-.463h13.77q.69 0 1.152.463q.463.462.463 1.153v9.769q0 .69-.462 1.153q-.463.462-1.153.462z"/></svg>
            </div>
          <p class="blue_text th_flex_center"> Electronshubofficial@gmail.com</p>
          </div>
        </div>
        <div class="th_box">
        <a href="./admin/guest_post.php" class="logout_btn">
          <div class="logout_button th_flex_center">
            <div class="th_icon_box4 thib">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none"><path stroke="white" stroke-linecap="round" stroke-width="1.5" d="m16.652 3.455l.649-.649A2.753 2.753 0 0 1 21.194 6.7l-.65.649m-3.892-3.893s.081 1.379 1.298 2.595c1.216 1.217 2.595 1.298 2.595 1.298m-3.893-3.893L10.687 9.42c-.404.404-.606.606-.78.829c-.205.262-.38.547-.524.848c-.121.255-.211.526-.392 1.068L8.412 13.9m12.133-6.552l-2.983 2.982m-2.982 2.983c-.404.404-.606.606-.829.78a4.59 4.59 0 0 1-.848.524c-.255.121-.526.211-1.068.392l-1.735.579m0 0l-1.123.374a.742.742 0 0 1-.939-.94l.374-1.122m1.688 1.688L8.412 13.9"/><path fill="white" d="M22.75 12a.75.75 0 0 0-1.5 0zM12 2.75a.75.75 0 0 0 0-1.5zM7.376 20.013a.75.75 0 1 0-.752 1.298zm-4.687-2.638a.75.75 0 1 0 1.298-.75zM21.25 12A9.25 9.25 0 0 1 12 21.25v1.5c5.937 0 10.75-4.813 10.75-10.75zM12 1.25C6.063 1.25 1.25 6.063 1.25 12h1.5A9.25 9.25 0 0 1 12 2.75zM6.624 21.311A10.704 10.704 0 0 0 12 22.75v-1.5a9.204 9.204 0 0 1-4.624-1.237zM1.25 12a10.7 10.7 0 0 0 1.439 5.375l1.298-.75A9.204 9.204 0 0 1 2.75 12z"/></g></svg>
           </div>
            <p>Guest Post</p>
            <p> | </p>
      </div>
        </a>
        <a href="./logout.php" class="logout_btn">
          <div class="logout_button th_flex_center">
            <div class="th_icon_box3 thib">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="white" fill-rule="evenodd" d="M10.796 2.244C12.653 1.826 14 3.422 14 5v14c0 1.578-1.347 3.174-3.204 2.756C6.334 20.752 3 16.766 3 12s3.334-8.752 7.796-9.756m5.497 6.049a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1 0 1.414l-3 3a1 1 0 0 1-1.414-1.414L17.586 13H9a1 1 0 1 1 0-2h8.586l-1.293-1.293a1 1 0 0 1 0-1.414" clip-rule="evenodd"/></svg>
            </div>
            <p>Logout</p>      <p> | </p>
          </div>
        </a>
          <div class="guest_img_box">
            <img src="<?php  if(!empty($guest_picture)){ echo $guest_picture; } else { echo "./img/user.png"; } ?>" alt="">
          </div>
          <p class="br_left">Welcome, <?= ucfirst($_SESSION["username"]); ?>❤️</p>
        </div>
      </div>
      <?php } ?>
      <nav class="navbar <?php if(isset($_SESSION["userlogged"])){ echo 'margin_top_nav'; } ?>" data-navbar>
        <div class="logo">Electrons<span>HUB</span></div>
        <div class="nav-links">
          <ul id="menu">
            <li><a href="./index.php">Home</a></li>
            <li><a href="blog.php">Blogs</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="Contact.php">Contact</a></li>
            <?php 
              if(isset($_SESSION["userlogged"])){
              }else { ?>
                <a href="./signUp.php" id="red">Sign Up</a>
              <?php }
            ?>
            <a href="#" id="crossbar" onclick="closeMenuBar()"><i class="fa-solid fa-xmark"></i></a>
          </ul>
        </div>
        <a href="#" id="iconbar" onclick="responsiveMenu()"><i class="fa-solid fa-bars"></i></a>
      </nav>
  </section>
