<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: managerlogin.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manager Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styling.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Montserrat:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
     <nav class="navbar navbar-default probootstrap-navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          </div>

          <div id="navbar-collapse" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.html">HOME</a></li>
              <li><a href="signup.html">SIGN UP</a></li>
              <li><a href="login.html">LOGIN</a></li>
              <li><a href="about.html">ABOUT US</a></li>
              <li><a href="contactus.html">CONTACT US</a></li>
            
               <li class = "active"><a href="managerwelcome.php"> MANAGER WELCOME</a></li>
             <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">PAGES</a>
                <ul class="dropdown-menu">
                  <li><a href="about.html">ABOUT US</a></li>
                  <li><a href="signup.html">SIGN UP</a></li>
                  <li><a href="login.html">LOGIN</a></li>
                  <li><a href="">CONTACT US</a></li>
                 
                  <li><a href="managerreset.php">RESET YOUR PASSWORD</a></li>
                  <li><a href="managerlogout.php">SIGN OUT OF YOUR ACCOUNT</a></li>
                  
                </ul>
              </li>
              
              <li class="probootstra-cta-button last"><a href="managerhome.php" class="btn btn-primary">Driver Details</a></li>
              
            </ul>
          </div>
        </div>
      </nav>
      
      <section class="probootstrap-hero" style="background-image: url(img/clement-m-Ng3xrviPrhk-unsplash.jpg)"  data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="probootstrap-slider-text probootstrap-animate" data-animate-effect="fadeIn">

                <li><h1 class="probootstrap-heading probootstrap-animate">Hello Manager, <?php echo htmlspecialchars($_SESSION["username"]); ?>. Welcome to Safari Super Shine Car Wash.</h1></li>
                
              </div>
            </div>
          </div>
        </div>
       
      </section>

     
      
     
      
     
      <section class="probootstrap-half">
        <div class="image">
          <div class="image-bg">
            <img src="img/slide2.jpg">
          </div>
        </div>
        <div class="text">
          <div class="probootstrap-animate">
            <h3>WELCOME TO SAFARI SUPER SHINE</h3>
            <p>Welcome to Super Shine Car Wash where you will be able to get affordable and best quality car wash services</p>
           
          </div>
        </div>
      </section>

      <section class="probootstrap-section">
        <div class="container">
          <div class="row">
          
            <div class="col-md-6 probootstrap-animate">
              <h3>ABOUT US</h3>
              <p><img src="img/emile-guillemot-ci7gkM_29wA-unsplash.jpg" class="img-responsive"></p>
              <b><p>Here at Safari Super Shine we understand the substantial investment your vehicle represents and that is why we strive to provide you with the best service that you and your automobile deserves.We are a Full Service All By Hand Car Wash. We don't have spinning brushes, mindless machines or heavy equipment to damage the finish of your car. We are open year round. We promise to provide you the best service in the area while you relax in our climate controlled waiting room with free WiFi, great magazines, flat screen TV and a fun place for the kids.</p></b>
            
              <p><a href="about.html" class="btn btn-primary">About Us</a></p>
              
            </div>
            
          </div>
        </div>
      </section>

      <footer class="probootstrap-footer probootstrap-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>ABOUT US</h3>
                <b><p>Here at Safari Super Shine we understand the substantial investment your vehicle represents and that is why we strive to provide you with the best service that you and your automobile deserves.We are a Full Service All By Hand Car Wash. We don't have spinning brushes, mindless machines or heavy equipment to damage the finish of your car. We are open year round. We promise to provide you the best service in the area while you relax in our climate controlled waiting room with free WiFi, great magazines, flat screen TV and a fun place for the kids.</p></b>
                <p><a href="about.html" class="btn btn-primary">About Us</a></p>
                <ul class="probootstrap-footer-social">
                  <li><a href="#"><i class="icon-twitter"></i></a></li>
                  <li><a href="#"><i class="icon-facebook"></i></a></li>
                  <li><a href="#"><i class="icon-github"></i></a></li>
                  <li><a href="#"><i class="icon-dribbble"></i></a></li>
                  <li><a href="#"><i class="icon-linkedin"></i></a></li>
                  <li><a href="#"><i class="icon-youtube"></i></a></li>
                </ul>
              </div>
            </div>
           <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>CONTACT INFO</h3>
                <p>Safari Super Shine is located off Thika Road on Mirema Road behind Safari Park Hotel</p>
                <ul class="probootstrap-contact-info">
                
                    
                  <li><i class="icon-mail">Info@safarisupershine.com</i><span></span></li>
                  <li><i class="icon-phone2">+254.702.441.255</i><span></span></li>
                </ul>
              </div>
            </div>

            <div class="col-md-4 probootstrap-animate">
              <div class="probootstrap-footer-widget">
                <h3>Visit Us TODAY</h3>
                <b><p>Safari Super Shine Car Wash</p></b>
                <p><a href="" class="btn btn-primary">CarUser details</a></p>
              </div>
            </div>
           
          </div>
          <!-- END row -->
          
        </div>

        <div class="probootstrap-copyright">
          <div class="container">
            <div class="row">
              <div class="col-md-8 text-left">
                <p>&copy; 2019 <a href="">Safari Super Shine</a>. 
              </div>
              <div class="col-md-4 probootstrap-back-to-top">
                <p><a href="#" class="js-backtotop">Back to top <i class="icon-arrow-long-up"></i></a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>

    <script src="js/scripts.min.js"></script>
    <script src="js/main.min.js"></script>
    <script src="js/custom.js"></script>
    
  </body>
</html>