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
                <p class="logo-text">Feedback Forms</p>
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
                <h2 class="hd2">Feedback Forms</h2>
                <div class="table-wrapper">
                    <table class="bordered-table">
                        <tr class="margin-t">
                            <th>#</th>
                            <th>Email</th>
                            <th>Feedback</th>
                        </tr> 
                         <?php
                        $limit = 5;

                        if (isset($_GET['page'])) {
                          $page = $_GET['page'];
                        } else {
                          $page = 1;
                        }

                        $offset = ($page - 1) * $limit;
                        $query = "SELECT * FROM feedback Where 1 LIMIT {$offset}, {$limit}";
                        $data = mysqli_query($conn, $query);
                        $total = mysqli_num_rows($data);

                        if ($total != 0) {
                          $number = ($page - 1) * $limit + 1;
                          while ($result = mysqli_fetch_assoc($data)) {
                            echo "
                            <tr>
                                <td>$number</td>
                                <td>" . $result['email']. "....</td>
                                <td>" . substr($result['message'],0,60) . "</td>
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
                  
                  $pagination = "SELECT * FROM feedback WHERE 1";
                  $data = mysqli_query($conn, $pagination) or die("<script>alert('server down');</script>");

                  if(mysqli_num_rows($data)>0){
                    $total_records = mysqli_num_rows($data);
                    $total_page = ceil($total_records/$limit);
                ?>


                <div class="pagination-container">
                  <div class="pagination-left">
                    <?php if($page>1){ ?>
                    <a href="feedback.php?page=<?php echo $page-1; ?>" class="">&lt;</a>
                    <?php } ?>
                  </div>
                  
                  <div class="pagination-num">
                    <?php
                      for($i=1; $i<=$total_page; $i++){
                    ?>
                    <a href="feedback.php?page=<?php echo $i; ?>" class=""><?php echo $i; ?></a>
                    <?php } ?>
                  </div>

                  <div class="pagination-right">
                    <?php if($page<$total_page){ ?>    
                    <a href="feedback.php?page=<?php echo $page+1; ?>" class="">	&gt;</a>
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


