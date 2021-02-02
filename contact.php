<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "dalema";

    $con = mysqli_connect($server, $user, $password, $db);
    if (!$con){
        echo "Connection Not Established";
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['send'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];


            if (strlen($name) < 4) {
                $error = "Enter a Valid Name Please";
            }elseif (strlen($email) < 5) {
                $error = "Enter a Valid Email/Phone Number Please";
            }elseif (strlen($subject) < 5) {
                 $error = "Please Enter a Valid Subject Please";
            }elseif (strlen($message) < 5) {
                $error = "Please Enter a Valid Message";
            }else{
                $query = "INSERT INTO contacts (name, email, subject, message) Values('$name', '$email', '$subject', '$message')";
                $run_query = mysqli_query($con, $query);
                if ($run_query) {
                    $good = "Message Sent";
                }else{
                    $error = "Message Could Not Be sent Please Try Again";
                }
            }
            
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="img/cake.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Emeka Iloba Timothy">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="owl/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" type="text/css" href="owl/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="style.css">
    <title>Dalema ~~ Contact Us</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-one emp">
                &nbsp;
            </div>
            <div class="col-md-3 bg-two emp">
                    &nbsp;
            </div>
            <div class="col-md-3 bg-three emp">
                    &nbsp;
            </div>
            <div class="col-md-3 bg-four emp">
                    &nbsp;
            </div>
        </div>
    </div><br>
    <div class="container-fluid">
        <div class="row header">
            <div class="col-md-2 col-sm-4  col-xs-12">
                <img class="img-fluid logo" src="img/nipi_logo.png" alt="Business Logo">
            </div>
            <div class="col-md-10 col-sm-4 col-xs-12">
                <div class="name"><h1 class="text-center dal">Dalema Catering Services <br><h2 class="text-center under"> and Training Centre</h2></h1></div>
            </div>          
        </div>
    </div><br>
    <div class="container-fluid">
        <div class="row second"><br>
            <div class="col-md-6 one text-center">
                <div><img class="phone" src="img/welcome2.png" alt="Welcome"> Welcome to Dalema Stores We are Here For you</div>
            </div>
            <div class="col-md-6 two text-center">
                <div> <img class="phone" src="img/help.png" alt="Help"> Need Help?? Call:<img class="phone" src="img/phone.png" alt="phone">08054421788,090392139232</div>
            </div>
            <div class="share"><div class="sharethis-inline-share-buttons"></div></div>
        </div>
    </div>
    <nav class=" sticky-top navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" id="brand" href="index.php">Dalema Catering Services</a>
        <button class="navbar-toggler bg-success" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="					navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item  ">
            <a class="nav-link"   href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ">
            <a class="nav-link"   href="about.php">About</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link"   href="contact.php">Get in Touch</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link"   href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item ">
            <a class="nav-link"    href="courses.php">Register For Courses</a>
            </li>
        </ul>
    </div>
  </nav>
    <div class="sectionTwo">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="wel">Contact Us/Place an Order</h1>
                        <div class="contact_form">
                                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                     <?php 
                                        if (isset($error)) {
                                            echo  "<div class='alert alert-danger'>{$error}</div>";
                                        }
                                        if (isset($good)) {
                                            echo "<div class='alert alert-success'>{$good}</div>";
                                        }
                                     ?><br>
                                    <input type="text" auto-complete="off" id="place" class="form-control" name="name" placeholder="Enter Full Name" required><br>
                                    <input type="E-mail" auto-complete="off" class="form-control" name="email" placeholder="Enter Email/Phone" required><br>
                                    <input type="text"  auto-complete="off" class="form-control" name="subject" placeholder="Enter Subject" required><br>
                                    <textarea name="message" auto-complete="off" class="form-control"  cols="30" rows="10" placeholder="Enter Your Message" required></textarea><br>
                                    <input type="submit" auto-complete="off" class="btn btn-outline-info btn-block" name="send" Value="Send Message">
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3"><br>
                    <h3 class="footer_head">LET US HELP YOU</h3>
                    <a class="footer_link" href="#">Help centre</a><br>
                    <a class="footer_link" href="#">Contact Us</a><br>	
                    <a class="footer_link" href="#">How to shop on Dee Bakers</a><br>	
                    <a class="footer_link" href="#">Shipping and Delivery</a><br>	
                    <a class="footer_link" href="#">Return Policy</a><br>	
                    <a class="footer_link" href="#">Cooperate and bulk Purchase</a><br>	
                    <a class="footer_link" href="#">Dee Bakers Bot</a><br>	
                    <br>	<br>	
                </div>
                <div class="col-md-3"><br>	
                    <h3 class="footer_head">GET TO KNOW US</h3>
                    <a class="footer_link" href="#">Careers</a><br>
                    <a class="footer_link" href="#">About Us</a><br>	
                    <a class="footer_link" href="#"> Dee Bakers Express</a><br>	
                    <a class="footer_link" href="#">Shipped from Overseas</a><br>	
                    <a class="footer_link" href="#">Terms and Conditions</a><br>	
                    <a class="footer_link" href="#">Privacy Policy</a><br>
                    <a class="footer_link" href="#">Dee Bakers easter Sales</a><br>	
                </div>
                <div class="col-md-3"><br>	
                    <h3 style="text-transform: uppercase;" class="footer_head">Quick Links</h3>
                    <a class="footer_link" href="about.php">about Us</a><br>
                    <a class="footer_link" href="Contact.php">Contact Us</a><br>	
                    <a class="footer_link" href="gallery.php">Gallery</a><br>	
                </div>
                <div class="col-md-3"><br>	
                    <h3 class="footer_head">Join Us On</h3>
                    <div class="row">
                        <div class="col-md-12">
                            <a class="social_link" href="#"><img class="social" src="img/fb.png">&nbsp; &nbsp; &nbsp;</a>
                            <a class="social_link" href="#"><img class="social" src="img/insta.png">&nbsp; &nbsp; &nbsp;</a>
                            <a class="social_link" href="#"><img class=" social" src="img/twitter.png">&nbsp; &nbsp; &nbsp;</a>
                            <a class="social_link" href="#"><img class=" social" src="img/in.png">&nbsp; &nbsp; &nbsp;</a>
                        </div>
                    </div><br>
                    <h3 class="footer_head">Contact Us On</h3>
                    <p class="footer_link">08185375580/08054421788</p>
                     <br>
                     <h3 class="footer_head">  <img class="loc" src="img/loc.png" alt=""> Visit Us Today</h3>
                    <p class="footer_link">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae perferendis molestiae id unde incidunt totam ea natus, ipsum doloribus excepturi expedita iure culpa corporis quaerat debitis architecto blanditiis adipisci ab?</p>
                    </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59b6c4433bc6590014ffc442&product=inline-share-buttons"></script>		
<script>
AOS.init();
</script>
<script src="owl/doc/assets/vendors/jquery.min.js" type="text/javascript"></script>
<script src="owl/dist/owl.carousel.js" type="text/javascript"></script>	
<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          nav:false,
          autoplay:true,
          dots:false,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:3
              },
              1000:{
                  items:5
              }
          }
    })
</script>
</body>
</html>