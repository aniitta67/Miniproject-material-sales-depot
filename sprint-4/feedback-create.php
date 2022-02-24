<?php
// Include config file

  session_start();
  require('../connection.php');
  $cid=$_SESSION['UID'];
 $id= $_SESSION['i_id'];
require_once "config.php";


 



// Define variables and initialize with empty values
$Message = "";
$uid = "";

$Message_err = "";
$uid_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Message = trim($_POST["Message"]);
		$uid = $cid;
		

        $dsn = "mysql:host=$db_server;dbname=$db_name;charset=utf8mb4";
        $options = [
          PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
        ];
        try {
          $pdo = new PDO($dsn, $db_user, $db_password, $options);
        } catch (Exception $e) {
          error_log($e->getMessage());
          exit('Something weird happened'); //something a user can understand
        }

        $vars = parse_columns('feedback', $_POST);
        $stmt = $pdo->prepare("INSERT INTO feedback (Message,uid) VALUES (?,?)");

        if($stmt->execute([ $Message,$uid  ])) {
                $stmt = null;
                header("location: feedback-index.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Feedback</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
 
   <title>Material sales depot</title>
   <meta content="" name="description">
   <meta content="" name="keywords">
 
   <!-- Favicons -->
   <link href="../Index/assets/img/hero-bg.jpg" rel="icon">
   <link href="../Index/assets/img/hero-bg.jpg" rel="apple-touch-icon">
 
   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 
 
 
 
 
 <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css" />
 <link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
 <link href="../Index/assets/vendor/aos/aos.css" rel="stylesheet">
 <link href="../Index/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link href="../Index/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
 <link href="../Index/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
 <link href="../Index/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
 <link href="../Index/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
 <link href="../Index/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
 <link href="../Index/assets/css/style1.css" rel="stylesheet">
 <link href="../Index/assets/css/style.css" rel="stylesheet">
 
 
</head>
<body>

 
   <!-- ======= Header ======= -->
   <div id="wrapper">
 	<div id="header-wrapper">
 		<div id="header" class="container">
   <!-- <header id="header" class="fixed-top ">-->
 <?php
 
 include("user_menu.php");
 ?>
 </div>
 </div>
 </div>
 
   </header><!-- End Header -->
 	<!-- end #header -->
 
 
 
   <main id="main">
 
 
 
   
     
     
     
 
    
             
 
 
 
 	<!-- ======= Material Section ======= -->
     <section id="team" class="team">
 		<div class="container" data-aos="fade-up">
   
    <section class="pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add a record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >

                        <div class="form-group">
                                <label>Message</label>
								
                                 <textarea name="Message" class="form-control" placeholder="Message" required>
								 <?php echo $Message; ?>
								 </textarea>
                                <span class="form-text"><?php echo $Message_err; ?></span>
                                
                            </div>
						<div class="form-group">
                                
                                <input type="hidden" placeholder="uid" required name="uid" class="form-control" value="<?php echo $uid; ?>">
                                <span class="form-text"><?php echo $uid_err; ?></span>
                            </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="feedback-index.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
	
 		</div>
 	  </section><!-- End Team Section -->
   
 	  
 
 
     
 
   </main><!-- End #main -->
 
   <!-- ======= Footer ======= -->
   <footer id="footer">
     <div class="footer-top">
       <div class="container">
         <div class="row">
 
           <div class="col-lg-3 col-md-6">
             <div class="footer-info">
               <h3>MATERIAL DEPOT<span>.</span></h3>
             
          <a href="#"></a>
       </div>
     </div>
   </footer><!-- End Footer -->
 
   <div id="preloader"></div>
   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 
   <!-- Vendor JS Files -->
   <script src="../Index/assets/vendor/purecounter/purecounter.js"></script>
   <script src="../Index/assets/vendor/aos/aos.js"></script>
   <script src="../Index/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../Index/assets/vendor/glightbox/js/glightbox.min.js"></script>
   <script src="../Index/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="../Index/assets/vendor/swiper/swiper-bundle.min.js"></script>
   <script src="../Index/assets/vendor/php-email-form/validate.js"></script>
 
   <!-- Template Main JS File -->
   <script src="../Index/assets/js/main.js"></script>
 
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>