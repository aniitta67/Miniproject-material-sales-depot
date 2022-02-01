<?php

 
   include('../connection.php');

  $sql="select * from material_det";
  $result1=$con->query($sql);

  $sql="select * from category";
  $result2=$con->query($sql);
  

   
?>











<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Material sales depot</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/hero-bg.jpg" rel="icon">
  <link href="assets/img/hero-bg.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

 
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="#">material depot<span>.</span></a></h1>
     
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#features">Servive</a></li>
          <li><a class="nav-link scrollto" href="#team">Materials</a></li>
          <li><a class="nav-link scrollto " href="../login.php">login</a></li>
        
         
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="../register.php" class="get-started-btn scrollto">Get Started</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>THE BEST THING THAT YOUR BUILDING WANT<span>.</span></h1>
          <h2>MATERIAL SALES DEPOT</h2>
        </div>
      </div>

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class=""></i>
            <h3><a href="#">AGNI TMT</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class=""></i>
            <h3><a href="#">KENZA TMT</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class=""></i>
            <h3><a href="#">MALABAR CEMENT</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class=""></i>
            <h3><a href="#">ZUARI CEMENT</a></h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4">
          <div class="icon-box">
            <i class=""></i>
            <h3><a href="#">MAHA CEMENT</a></h3>
          </div>
        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

  


   
  	<!-- ======= Material Section ======= -->
    <section id="team" class="team">
		<div class="container" data-aos="fade-up">
  
		  <div class="section-title">
			<h2>MATERIALS</h2>
			<p>Building construction materials</p>
		  </div>
  
		  <div class="row">

<!--  -->
<?php 
                          while($row=mysqli_fetch_assoc($result1))
                          {
                        ?>
		  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
				<div class="member" data-aos="fade-up" data-aos-delay="100">
				  <div class="member-img">
					<img src="<?php echo trim($row['image']);?>" class="img-fluid" alt="">
					<div class="social">
					  
					  <a href="../login.php" class="get-started-btn scrollto">BUY</a>
					  
					</div>
				  </div>
				  <div class="member-info">
            <br><br><br>
					<h4><?php echo $row['item_name'];?></h4>
					<span>Rs <?php echo $row['mrp'];?>/<?php echo $row['m_type'];?> </span>
				  </div>
				</div>
			  </div>
			  <?php
			
			}
			?>

<!--  -->


   


     <!-- ======= Features Section ======= --> 
   <section id="features" class="features">
      <div class="container" data-aos="fade-up">
      <div class="section-title">
          <h2>SERVICE</h2>
          <p>HOW IT BENEFITS</p>
        </div>

        <div class="row">
          <div class="image col-lg-6" style='background-image: url("assets/img/feature.jpeg");' data-aos="fade-right"></div>
          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100">
           
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-cube-alt"></i>
              <h4>BEST PRICE</h4>
              <p> </p>
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-cube-alt"></i>
              <h4>GREAT QUALITY MATERIALS</h4>
              <p></p>
            </div>
            <div class="icon-box mt-5" data-aos="zoom-in" data-aos-delay="150">
              <i class="bx bx-cube-alt"></i>
              <h4>GENUINE DELIVERY</h4>
              <p>We provide site delivery of orders.  </p>
            </div>
          
           
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->


   

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="assets/img/contact.jpeg" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Kozhikode,Perambra,Kallode</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>materiasalesdepotpanthirikkara.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>8281147189</p>
              </div>

            </div>

          </div>

         

        </div>

      </div>
    </section><!-- End Contact Section -->

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
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
