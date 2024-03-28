
<?php
  error_reporting(0);
  session_start();

  include('./admin/connect.php');

  if(isset($_SESSION["guests"])){
    $user = $_SESSION['username'];
  }

  $guest_picture = $_SESSION['profile_picture'];

?>
  
  <!-- -------------------- Footer Section --------------------- -->

  <!-- Footer -->

  <footer class="rg-footer">
    <h1 class="gd-color ft-h span-border">Footer</h1>
    <div class="row">
      <div class="logo-container">
         <div class="logo">Electrons<span>HUB</span></div>
      </div>
      <div class="content">
        <p>electronsHUB@gmail.com</p>
        <p>+91 8788231610</p>
        <p>Chhatrapati Sambhaji Nagar, 431005</p>
      </div>
      </div>
  
     <div class="row">
      <h4>Categories</h4>
      <div class="footer-links footer_links">
        <?php

        $query = "SELECT * FROM categories limit 6";

        $data = mysqli_query($conn, $query);

        $total = mysqli_num_rows($data);
        if ($total != 0) {
          while ($res = mysqli_fetch_assoc($data)) {
            ?>
            <li>
              <a href="./blog.php?cid=<?= $res['id'] ?>" class="footer_cat" style="border:none; font-weight:400;">
                      <?= $res['category'] ?>
              </a>
              </li>
          <?php
          }
          }
          ?>
      </div>
    </div>

    <div class="row">
      <h4>Links</h4>
      <div class="footer-links">
        <li><a href="./about.php">About</a></li>
        <li><a href="./Contact.php">Contact Us</a></li>
        <li><a href="./index.php">Home</a></li>
        <li><a href="./blog.php">Categories</a></li>
      </div>
    </div>
 
    <div class="row">
      <h4>Feedback</h4>
      <p>
        Please submit your valueable <br />
        feedback!!
      </p>
      <form method="post" action="">
      <div class="subscribe">
        <input type="email
        " placeholder="Your Email Address" class="email" name="email" />
      <textarea name="message" id="" class="message" placeholder="type here..."></textarea>
      <button type="submit" name="submit" class="yellow">Submit</button>
    </div>
      </form>
    </div>
    
    </footer>
  
    <div class="copyright-container">
      <div class="footer-social m_hide">
        <a href="https://www.linkedin.com/in/audumbar-bade/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><g fill="none"><rect width="256" height="256" fill="#fff" rx="60"/><rect width="256" height="256" fill="#0A66C2" rx="60"/><path fill="#fff" d="M184.715 217.685h29.27a4 4 0 0 0 4-3.999l.015-61.842c0-32.323-6.965-57.168-44.738-57.168c-14.359-.534-27.9 6.868-35.207 19.228a.32.32 0 0 1-.595-.161V101.66a4 4 0 0 0-4-4h-27.777a4 4 0 0 0-4 4v112.02a4 4 0 0 0 4 4h29.268a4 4 0 0 0 4-4v-55.373c0-15.657 2.97-30.82 22.381-30.82c19.135 0 19.383 17.916 19.383 31.834v54.364a4 4 0 0 0 4 4M38 59.628c0 11.864 9.767 21.626 21.632 21.626c11.862-.001 21.623-9.769 21.623-21.631C81.253 47.761 71.491 38 59.628 38C47.762 38 38 47.763 38 59.627m6.959 158.058h29.307a4 4 0 0 0 4-4V101.66a4 4 0 0 0-4-4H44.959a4 4 0 0 0-4 4v112.025a4 4 0 0 0 4 4"/></g></svg></a>
        <a href="https://www.instagram.com/aoudumbersbade/"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><g fill="none"><rect width="256" height="256" fill="url(#skillIconsInstagram0)" rx="60"/><rect width="256" height="256" fill="url(#skillIconsInstagram1)" rx="60"/><path fill="#fff" d="M128.009 28c-27.158 0-30.567.119-41.233.604c-10.646.488-17.913 2.173-24.271 4.646c-6.578 2.554-12.157 5.971-17.715 11.531c-5.563 5.559-8.98 11.138-11.542 17.713c-2.48 6.36-4.167 13.63-4.646 24.271c-.477 10.667-.602 14.077-.602 41.236s.12 30.557.604 41.223c.49 10.646 2.175 17.913 4.646 24.271c2.556 6.578 5.973 12.157 11.533 17.715c5.557 5.563 11.136 8.988 17.709 11.542c6.363 2.473 13.631 4.158 24.275 4.646c10.667.485 14.073.604 41.23.604c27.161 0 30.559-.119 41.225-.604c10.646-.488 17.921-2.173 24.284-4.646c6.575-2.554 12.146-5.979 17.702-11.542c5.563-5.558 8.979-11.137 11.542-17.712c2.458-6.361 4.146-13.63 4.646-24.272c.479-10.666.604-14.066.604-41.225s-.125-30.567-.604-41.234c-.5-10.646-2.188-17.912-4.646-24.27c-2.563-6.578-5.979-12.157-11.542-17.716c-5.562-5.562-11.125-8.979-17.708-11.53c-6.375-2.474-13.646-4.16-24.292-4.647c-10.667-.485-14.063-.604-41.23-.604zm-8.971 18.021c2.663-.004 5.634 0 8.971 0c26.701 0 29.865.096 40.409.575c9.75.446 15.042 2.075 18.567 3.444c4.667 1.812 7.994 3.979 11.492 7.48c3.5 3.5 5.666 6.833 7.483 11.5c1.369 3.52 3 8.812 3.444 18.562c.479 10.542.583 13.708.583 40.396c0 26.688-.104 29.855-.583 40.396c-.446 9.75-2.075 15.042-3.444 18.563c-1.812 4.667-3.983 7.99-7.483 11.488c-3.5 3.5-6.823 5.666-11.492 7.479c-3.521 1.375-8.817 3-18.567 3.446c-10.542.479-13.708.583-40.409.583c-26.702 0-29.867-.104-40.408-.583c-9.75-.45-15.042-2.079-18.57-3.448c-4.666-1.813-8-3.979-11.5-7.479s-5.666-6.825-7.483-11.494c-1.369-3.521-3-8.813-3.444-18.563c-.479-10.542-.575-13.708-.575-40.413c0-26.704.096-29.854.575-40.396c.446-9.75 2.075-15.042 3.444-18.567c1.813-4.667 3.983-8 7.484-11.5c3.5-3.5 6.833-5.667 11.5-7.483c3.525-1.375 8.819-3 18.569-3.448c9.225-.417 12.8-.542 31.437-.563zm62.351 16.604c-6.625 0-12 5.37-12 11.996c0 6.625 5.375 12 12 12s12-5.375 12-12s-5.375-12-12-12zm-53.38 14.021c-28.36 0-51.354 22.994-51.354 51.355c0 28.361 22.994 51.344 51.354 51.344c28.361 0 51.347-22.983 51.347-51.344c0-28.36-22.988-51.355-51.349-51.355zm0 18.021c18.409 0 33.334 14.923 33.334 33.334c0 18.409-14.925 33.334-33.334 33.334c-18.41 0-33.333-14.925-33.333-33.334c0-18.411 14.923-33.334 33.333-33.334"/><defs><radialGradient id="skillIconsInstagram0" cx="0" cy="0" r="1" gradientTransform="matrix(0 -253.715 235.975 0 68 275.717)" gradientUnits="userSpaceOnUse"><stop stop-color="#FD5"/><stop offset=".1" stop-color="#FD5"/><stop offset=".5" stop-color="#FF543E"/><stop offset="1" stop-color="#C837AB"/></radialGradient><radialGradient id="skillIconsInstagram1" cx="0" cy="0" r="1" gradientTransform="matrix(22.25952 111.2061 -458.39518 91.75449 -42.881 18.441)" gradientUnits="userSpaceOnUse"><stop stop-color="#3771C8"/><stop offset=".128" stop-color="#3771C8"/><stop offset="1" stop-color="#60F" stop-opacity="0"/></radialGradient></defs></g></svg></a>
        <a href="www.youtube.com/@toxicprogrammer69"><svg xmlns="http://www.w3.org/2000/svg" width="1.43em" height="1em" viewBox="0 0 256 180"><path fill="red" d="M250.346 28.075A32.18 32.18 0 0 0 227.69 5.418C207.824 0 127.87 0 127.87 0S47.912.164 28.046 5.582A32.18 32.18 0 0 0 5.39 28.24c-6.009 35.298-8.34 89.084.165 122.97a32.18 32.18 0 0 0 22.656 22.657c19.866 5.418 99.822 5.418 99.822 5.418s79.955 0 99.82-5.418a32.18 32.18 0 0 0 22.657-22.657c6.338-35.348 8.291-89.1-.164-123.134"/><path fill="#FFF" d="m102.421 128.06l66.328-38.418l-66.328-38.418z"/></svg></a>
      </div>
      <p class="m_hide">&copy; Electrons All Rights Reserved.</p>
      <p>Designed by - Aoudumber Bade ❤️</p>
    </div>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
                CKEDITOR.replace('blog');        
    </script>
  <script>
    AOS.init({
      offset: 20,
      duration: 800
    });
  </script>

  <script>
    // -------- Header --------
  const navBar = document.querySelector("[data-navbar]");

  window.addEventListener("scroll", function () {
    navBar.classList[window.scrollY > 30 ? "add" : "remove"]("active");
  });

  if (window.matchMedia("(max-width: 575px)").matches) {
  anim.href = "#";
  }
  </script>

  <script>
    const menu = document.getElementById("menu");
    // const closeMenu = document.getElementById("crossbar");

    function responsiveMenu() {
      menu.style.transform = "translate(-50%,-50%)";
    }

    function closeMenuBar() {
      menu.style.transform = "translate(50%,-50%)";
    }

  </script>
</body>

</html>

</html>

<?php

if(isset($_POST["submit"])){

  $em = $_POST["email"];
  $msg = $_POST["message"];

  $query = "INSERT INTO feedback(email, message) VALUES('$em', '$msg')";
  $data = mysqli_query($conn,$query);

  if($data){
    echo "<div class='pop-box'>
    <div class='s-icon'>
      <i class='fa-sharp fa-solid fa-circle-check'></i>
    </div>
    <div class='pop-c'>
      <p>Your feedback has been recorded successfully.</p>
    </div>
  </div>";
}else{
    echo "<div class='pop-box fail'>
    <div class='s-icon'>
      <i class='fa-sharp fa-solid fa-circle-check'></i>
    </div>
    <div class='pop-c'>
    <p>Oops! Something went wrong. Please try again later.</p>
    </div>
  </div>";
        echo "Error: " . mysqli_error($conn);
      
}
echo "<script>setTimeout(function(){window.location.href = 'index.php';}, 3000);</script>";
}

?>