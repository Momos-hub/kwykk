<!DOCTYPE html>
<html lang="en">

<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KWYK</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">

  <!-- For Icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!-- Font Awesome -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Owl Carousel -->
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">

  <!-- Fancy Box -->
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">

  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body class="body-wrapper">

  <header>

    <a href="index.html" class="logo"><span>K</span>WYK</a>

    <nav class="navbar">
      <a href="index.php">home</a>
      <a href="#about">About Us</a>
      <a href="#menu">Menu</a>
      <a href="#contact">contact</a>
    </nav>

    <div class="icons">
      <i class="fas fa-search" id="search-btn"></i>
      <a href="http://localhost/kwyk/Login/signin/signin.php"><i class="fas fa-user" id="login-btn"></i></a>
    </div>

    <form action="" class="search-bar-container">
      <input type="search" id="search-bar" placeholder="search here...">
      <label for="search-bar" class="fas fa-search"></label>
    </form>

  </header><br><br>

  <!--================================
=            Page Title            =
=================================-->
  <section class="page-title">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2 text-center">
          <!-- Title text -->
          <h3>Terms & Conditions</h3>
        </div>
      </div>
    </div>
    <!-- Container End -->
  </section>

  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto p-0">
          <div class="terms-condition-content">
            <h3 class="py-3">Kwyk Terms & Condition</h3>

            <p>Please read the following carefully to understand how we will collect and use your personal
              data in relation to the Service. If you do not understand this policy, or do not accept any
              part of it, then you should not use the Service. The Service may include and link to features
              and services (such as social applications like Facebook Messenger, WhatsApp and iMessenger)
              that are provided by a third party. If you use these features and services, please understand
              that the third parties that operate them may collect information from you which will be used
              in accordance with their own privacy policy and terms of use, which may differ from ours. </p>

            <p>We do not accept any responsibility or liability for these policies or for any personal data
              that may be collected through these websites or services. You should always read the privacy policy
              of any feature or service you access carefully in order to understand the specific privacy and
              information usage practices. Information we may collect from you and how we use it. </p>

            <h5 class="py-3">We may collect and process the following data about you via the Service: </h5>

            <p><span class="font-weight-bold text-dark">• Personal Information you provide to us:</span>
              We receive and store any information that you enter on the Service or provide to us in any
              other way, for example, when you download the Service, set up a profile within the Service,
              or access, upload or download material to or from the Service, including when that material
              is accessed on a third party platform, service or social network (such as Facebook), that
              social network or third-party may provide us with the information you agreed the social network
              or other third party platform could provide to as through the social networks€TMs or third party
              platforma€TMs Application Programming Interface (API) based on your settings on the third party
              social network or platform. The types of personal information collected may include your email
              address, profile picture, username and password. We use this information to validate you as a user
              when using the Service, to provide the Service to you, including administration of your user account,
              to notify you of changes to the Service or about any changes to our terms and conditions or this
              privacy policy, to manage our business, including financial reporting, for the development of new products
              and services, to send you newsletters to market and advertise our products and services by email,
              to comply with applicable laws, court orders and government enforcement agency requests, for research
              and analytics purposes including to improve the quality of the Service and to ensure that the Service
              is presented in the most effective manner for you and your device. Details of Correspondence: If you
              contact us, we may keep a record of that correspondence. We will not retain a record of that
              correspondence
              for longer than is reasonably necessary. </p>

            <p><span class="font-weight-bold text-dark">• Personal Information that we automatically collect:</span>
              When you use the Service, we automatically collect information about the device you use to access it and
              your usage of the Service. The information we collect may include (where available) the type and model of
              device you use, the device's unique device identifier, operating system, browser type, language options,
              current time zone and mobile network information to allow you to use the Service, for system
              administration
              purposes and to report aggregated, anonymised information to our business partners. If you do not wish for
              as to provide aggregated, anonymised information to our trusted business partners, please find out how to
              opt out of our use of analytics cookies in the cookies section below. We use this information to
              administer
              the Service and for our internal operations including troubleshooting, data analysis, testing, research,
              statistical and survey purposes, to improve the Service, how it is presented and its safety and security.
              Please note that the Service requires access to your devices€TMs photograph storage application in order
              to store the completed videos, but we do not take any information, videos, photos or other content
              from your devices photograph storage application. </p>

            <p><span class="font-weight-bold text-dark">• Log information:</span> When you use the Service, we may
              automatically collect and store the following information in server logs: Internet protocol (IP)
              addresses,
              Internet service provider (ISP), clickstream data, browser type and language, viewed and exit pages and
              date
              or time stamps. We use this information to communicate with the Service and to better understand our
              users'
              operating systems, for system administration and to audit the use of the Service. We do not use this data
              to
              identify the name, address or other personal details of any individual. </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- contact section starts  -->
  <?php

  $conn = new mysqli('localhost', 'root', '', 'tempo', 3308);

  if (isset($_POST['submit'])) 
  {

    $nm = $_POST['name'];
    $e = $_POST['email'];
    $num = $_POST['number'];
    $sub = $_POST['subject'];
    $mess = $_POST['message'];

    $sql = "INSERT INTO `contact` (`Name`,`Email`,`Number`,`Subject`,`Message`) VALUES ('$nm','$e',$num,'$sub','$mess')";
    
    $result =$conn->query($sql);

    if ($result) {
      echo "<script>alert('Thank you for contacting us. We will contact you soon.');</script>";
    }
    else{
      echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
  
    $conn->close();
  }
  ?>


  <section class="contact" id="contact">
      <h1 style="text-align: center;">CONTACT</h1>

      <div class="row">

        <div class="image">
          <img src="./img/home.jpg" alt="">
        </div>

        <form action="" method="post">
          <div class="inputBox">
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
          </div>
          <div class="inputBox">
            <input type="number" name="number" placeholder="Number">
            <input type="text" name="subject" placeholder="Subject">
          </div>
          <textarea placeholder="Message" name="message" cols="30" rows="10"></textarea>
          <button type="submit" class="btn" name="submit">Send Message</button>  
        </form>

      </div>
  </section>

  
  <!-- contact section ends -->

  <!--============================
=            Footer            =
=============================-->

  <footer class="footer section section-sm">
    <!-- Container Start -->
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
          <!-- About -->
          <div class="block about">
            <!-- footer logo -->
            <img src="img/logo-footer.png" height="100px" alt="">
            <!-- description -->
            <p class="alt-color">Kwyk is a on demand hyperlocal delivery service company
              that connects customers, merchants and delivery partners to facilitate
              hassle-free transactions</p>

          </div>
        </div>
        <!-- Link list -->
        <div class="col-lg-2 offset-lg-1 col-md-3">
          <div class="block">
            <h4>Company</h4>
            <ul>
              <li><a href="about-us.html">About Us</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="terms-condition.html">Privacy Policy</a></li>
              <li><a href="terms-condition.html">Terms & Conditions</a></li>
            </ul>
          </div>
        </div>
        <!-- Link list -->
        <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
          <div class="block">
            <h4>Get Help</h4>
            <ul>
              <li><a href="#">FAQ</a></li>
              <li><a href="#contact">Contact Us</a></li>
              <li><a href="#contact">Feedback</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 col-md-7">
          <div class="block">
            <h4>Contact Details</h4>
            <ul>
              <li><a href="#">1234567890</a></li>
              <li><a href="#contact">kwyk@gmail.com</a></li>
              <li><a href="#">123, D-1, Utsav Square,
                  Next to Pebbles, Kothrud,
                  Pune - 41102</a></li>
            </ul>
            <h5 class="social_text"><b>Follow us on</b></h5>

            <div class="facebook"><a href="http://www.facebook.com/Kwyk.One/" target="_blank" class="iconc"><i
                  class="fa fa-facebook" aria-hidden="true"></i></a></div>
            <div class="twitter"><a href="http://twitter.com/kwyk_one" target="_blank" class="iconc"><i
                  class="fa fa-twitter" aria-hidden="true"></i></a></div>
            <div class="instagram"><a href="http://www.instagram.com/kwyk.one/" target="_blank" class="iconc"><i
                  class="fa fa-instagram" aria-hidden="true"></i></a></div>

          </div>
        </div>

      </div>
    </div>
    <!-- Container End -->
  </footer>
  <!-- Footer Bottom -->
  <footer class="footer-bottom">
    <!-- Container Start -->
    <div class="container">
      <div style="height:20px;" class="row footr">
        <div style="height:20px;" class="col-sm-6 col-12">
          <!-- Copyright -->
          <div class="copyright">
            <p class="">Copyright ©
              <script>
                var CurrentYear = new Date().getFullYear()
                document.write(CurrentYear)
              </script>
              . All Rights Reserved
            </p>
          </div>
          <div class="poweredby">
            <p>Powered By <a href="index.php" class="flogo" style="color: white;"><span>Kwyk</span></a></p>
          </div>
        </div>
      </div>
    </div>
    <!-- Container End -->
    <!-- To Top -->
    <div class="top-to">
      <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
  </footer>

  <!-- JAVASCRIPTS -->
  <script src="plugins/jQuery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/popper.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
  <script src="plugins/tether/js/tether.min.js"></script>
  <script src="plugins/raty/jquery.raty-fa.js"></script>
  <script src="plugins/slick-carousel/slick/slick.min.js"></script>
  <script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
  <script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
  <script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
  <!-- google map -->
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
  <script src="plugins/google-map/gmap.js"></script>

  <script src="js/script.js"></script>

</body>

</html>