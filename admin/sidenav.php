 
 <?php
    error_reporting(0);
    include("./connect.php");

    session_start();

    if(!isset($_SESSION['users'])){
      header("location:http://localhost/electronshub/admin/login.php");
    }
?>
 <!---
            #Side Navigation Bar
        -->

        <div id="side-nav">
      <div class="logo-container">
        
        <i class="fa-solid fa-bars-staggered nav-btn icons" id="nav"></i>
        <i class="fa-solid fa-bars-staggered nav-btn1 icons" id="nav"></i>
        <div class="logo">
          <div id="logo">
          <div class="logo">Electrons<span>HUB</span></div>
          </div>
        </div>
      </div>
      <nav id="menu-bar" class="navbar">
        <ul class="navbar-mobile__list list-unstyled">
          <li>
            <a data-active="dashboard" class="js-arrow link-a" href="./index.php">
            <i class="fa-solid fa-chalkboard-user"></i>Dashboard</a>
          </li>
     
          <li>
            <a href="#" data-active="table" class="link-a has-sub">
            <i class="fa-brands fa-blogger-b"></i>Blog
              <i class="fas fa-angle-right dropdown"></i></a>
            <ul class="link-sub">
              <li>
                <a href="./blog.php">Add</a>
              </li>
              <li>
                <a href="./blog_table.php">view</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-active="yt" class="link-a has-sub">
            <i class="fa-solid fa-layer-group"></i>Category
              <i class="fas fa-angle-right dropdown"></i></a>
            <ul class="link-sub">
              <li>
                <a href="./cattable.php">Add</a>
              </li>
            </ul>
          </li>
            <li>
            <a href="#" data-active="table" class="link-a has-sub">
            <i class="fa-regular fa-address-book"></i>Contact
              <i class="fas fa-angle-right dropdown"></i></a>
            <ul class="link-sub">
              <li>
                <a href="./contact_table.php">View</a>
              </li>
            </ul>
          </li>
            <li>
            <a href="#" data-active="table" class="link-a has-sub">
            <i class="fa-solid fa-comment"></i>Feedback
              <i class="fas fa-angle-right dropdown"></i></a>
            <ul class="link-sub">
              <li>
                <a href="./feedback.php">View</a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
    </div>