
<?php 
  include('./admin/connect.php'); 
?>

<?php include('./header.php'); ?>

    <section id="blog-home">
      <h2>Contact Us</h2>
    </section>

    <!-- contact us  -->
    <section class="location">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30015.79763663531!2d74.7885!3d19.88329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdc702270bc0bb3%3A0x18abfd03d6cda191!2sJambargaon%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1659241491080!5m2!1sen!2sin"
        width="600"
        height="450"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </section>

    <div class="contact-us">
      <div class="get-in-toch section-heading">
        <p>Aoudumber Bade</p>
        <h3>Get In Touch</h3>
      </div>
      <div class="row-col">
        <div class="contact-col address">
          <div class="bxs">
            <i class="fa fa-home gd-color"></i>
            <span>
              <h5>ElectronsHUB at CIDCO</h5>
              <p>Behind The Prozon Mall</p>
              <p>CIDCO Road, Aurangabad-431005 (MH)</p>
            </span>
          </div>
          <div class="bxs">
            <i class="fa fa-phone gd-color"></i>
            <span>
              <h5>+91 8788231610</h5>
              <p>Monday to Saturday,9 AM to 7 PM</p>
            </span>
          </div>
          <div class="bxs">
          <i class="fa-solid fa-envelope gd-color"></i>
            <span class="em">
              <h5>electronshub@gmail.com</h5>
              <p>Email Your Query</p>
            </span>
          </div>
        </div>
        <div class="contact-col cform bxs">
          <form method="post" action="">
          <fieldset>
          <legend><i class="fa-solid fa-user icons"></i> Name</legend>
          <input
              type="text"
              name="name"
              placeholder="Enter Your Name"
              class="inp-b"
              required
            />
          </fieldset>
          <fieldset>
            <legend><i class="fa-solid fa-envelope icons"></i> Email</legend>
            <input
              type="email"
              name="email"
              placeholder="Enter Your Email"
              class="inp-b"
              required
            />
          </fieldset>
            <fieldset>
            <legend><i class="fa-solid fa-pen icons"></i> Subject</legend>
            <input
              type="text"
              name="subject"
              placeholder="Enter Your Subject"
              class="inp-b"
              required
            />
          </fieldset>
          <fieldset>
            <legend><i class="fa-solid fa-message icons"></i> Message</legend>
            <textarea name="message" placeholder="Massage" rows="2" class="inp-b"></textarea>
          </fieldset>
            <button
              id="redbtn"
              type="submit"
              name="send"
            >
              Send Message
            </button>
          </form>
        </div>
      </div>
    </div>

    <!-- -------------------- Footer Section --------------------- -->
    <?php include("./footer.php"); ?>


    
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_POST['send'])){
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


$mail = new PHPMailer(true);

try {


$mail->isSMTP();                                         
$mail->Host       = 'smtp.gmail.com';                   
$mail->SMTPAuth   = true;                             
$mail->Username   = 'badeaudumbar68@gmail.com ';                
$mail->Password   = 'idqvijdftwmhcvza';                          
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
$mail->Port       = 465;                                   

$mail->setFrom('badeaudumbar68@gmail.com ', 'ElectronsHUB');
$mail->addAddress('badeaudumbar68@gmail.com ', 'Aoudumber Bade');  
// electronshubofficial@gmail.com

$mail->isHTML(true);                                
$mail->Subject = 'New Contact Form';
$mail->Body = "
<html>
<head>
    <style>
        .e-container {
            width : 100%;
            font-family: 'Roboto',Arial;
            color:#000;
            text-align: center;
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            padding: 3px 0;
            background: rgb(239, 242, 247);
            position:relative;
        }

        .e2-container {
            padding: 45px;
            background: linear-gradient(rgba(255, 255, 255, 0.6), rgba(43, 114, 196, 0.7));
            margin: 70px 120px;
        }

        .e-logo {
            width: 228px;
            height: 54px;
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .e-logo img {
          width: 34px;
          height: 34px;
      }
        

        .e-logo p {
            color:#000;
            font-size: 1rem;
            margin-bottom: 3px;
        }

        .e-subject {
        }

        .e-subject p {
            font-size: 1.3rem;
            text-align: center;
            font-weight: 700;
        }

        .e-body {
            text-align: left;
            padding: 5px 18px 0;
        }

        .e-body h2 {
            color:#000;
            font-size: .9rem;
            font-weight: 300;
        }

        .e-body h2 span {
            color:#000;
            font-weight: 700;
        }

        
        /* -------------- Logo Styling -------------- */

        .logo {
          width: 100px;
          cursor: pointer;
          color: #333;
          display: flex;
          font-size: 1.3rem;
          font-weight: 700;
          letter-spacing: 1px;
          margin-top:30px;
        }

        .logo span {
          font-weight: 800;
          color: #5882f6;
        }

        .logo a {
          color: #5882f6;
          font-size: 35px;
          font-weight: 800;
          margin-left: 6%;
          text-decoration: none;
        }
        .crtext {
          font-size: 1rem;
        }

        

        @media (min-width: 260px) and (max-width: 1024px) {

          html{
            font-size:33.5%;
          }

          .logo {
            font-size: 1rem;
          }

          .e-container {
            
          }

          .e2-container {
            margin: 15px;
            padding: 25px 20px;
          }

          .e-logo img {
            width: 25px;
            height: 25px;
        }

          .e-logo p {
            margin-top: 17px;
            margin-left: 2px;
            font-size: 1rem;
            font-weight: 400;
            color:#000;
        }

        .e-subject p {
          font-size: 1.2rem;
        }

          .e-body h2{
            font-size: .7rem;
        }
        .crtext {
          font-size: .7rem;
        }

      }
    </style>
</head>
<body>
    <div class='e-container'>
        <div class='e2-container'>
            <div class='e-logo'>
            <div class='logo'>Electrons<span>HUB</span></div>
            </div><br>
            <div class='e-subject'>
                <p>New Contact Form Received</p>
            </div><br>
            <div class='e-body'>
                <h2><span>Sender Name:</span> $name</h2>
                <h2><span>Sender Email:</span> $email</h2>
                <h2><span>Subject:</span> $subject</h2>
                <h2><span>Message:</span> $message</h2>
            </div>
            <p style='text-align: right;
            margin-right: 5px;
            margin-top: 20px;
            font-size: .6rem;
            font-weight: 400;
            color:#000;'><a href='https://www.instagram.com/aoudumbersbade/#' style='color:#000; text-decoration:none; ' class='crtext'>Designed By - Aoudumber Bade 💓</a></p>
        </div>
    </div>
</body>
</html>";

$mail->send();
echo "
<div class='pop-box'>
  <div class='s-icon'>
    <i class='fa-sharp fa-solid fa-circle-check'></i>
  </div>
  <div class='pop-c'>
    <p>Your Message has been sent<br></p>
  </div>
</div>";

$query = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
$data = mysqli_query($conn, $query);


} catch (Exception $e) {
echo "
<div class='pop-box fail'>
  <div class='s-icon'>
    <i class='fa-solid fa-circle-xmark'></i>
  </div>
  <div class='pop-c'>
    <p>Message could not be sent!! Try again..</p>
  </div>
</div>";
}
echo "<script>setTimeout(function(){window.location.href = 'Contact.php';}, 4000);</script>";
}
?>
