<?php

   // require('../connection.php');
   include('../connection.php');

  

  $sql="select * from category";
  $result2=$con->query($sql);
  
  if(isset($_POST['submit']))
    {
       $type=$cat=$_POST['cat'];
       if($type!="0")
       {
          $sql="select * from material_det where category_id='$type'";
       }
       else
       {
          $sql="select * from material_det";
       }
    }
  else
    {
       $sql="select * from material_det";
    }

    // $sql="select * from material_det";
    $result1=$con->query($sql);

  
 
 
  // $row=mysqli_fetch_assoc($result)




   
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
    <div class="container d-flex align-items-center justify-content-lg-between">

    <h1 class="logo me-auto me-lg-0"><a href="#"><span>MATERIAL DEPOT</span></a></h1>
     <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="view bill.php?back=1">Payment</a></li>
          <li><a class="nav-link scrollto" href="bill.php?back=1">Bill</a></li>
          <li><a class="nav-link scrollto " href="../login.php">Notification</a></li>

          <li><a class="nav-link scrollto " href="../login.php">Feedback</a></li>

  </nav>

      <a href="../Index/index.php" class="get-started-btn scrollto" >LOGOUT</a>
    </div>
</div>
</div>
</div>

  </header><!-- End Header -->
	<!-- end #header -->



  <main id="main">



  
    
    
    

   
            



	<!-- ======= Material Section ======= -->
    <section id="team" class="team">
		<div class="container" data-aos="fade-up">
  
		  <div class="section-title">
			<h2>MATERIALS</h2>
			<p>Building construction materials</p>
		  </div>
      <!-- start drop -->
        <form method="post">
                 <table width="35%">
                   <tr>
                    <td width="75">Category :</td>
                    <td>
                      <select name="cat" style="width: 100%">
                        <option value="0">All</option>
                        <?php 
                          while($row=mysqli_fetch_assoc($result2))
                          {
                        ?>
                          <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category'] ?>
                        <?php
                           }
                        ?>
                      </select>
                  </td>
                    <td><input type="submit" value="Search" name="submit"></td>
                  </tr>
                 </table>
               </form>
        <!-- enddrop -->
        <br>
		  <div class="row">

<!--  -->
    <?php 
      while($row=mysqli_fetch_assoc($result1))
    {
        $idd=$row['matid'];
    ?>
		  <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
				<div class="member" data-aos="fade-up" data-aos-delay="100">
				  <div class="member-img">
					<img src="<?php echo trim($row['image']);?>" class="img-fluid" alt="">
					<div class="social">
					  <a href="order.php?id=<?php echo $idd; ?>" class="get-started-btn scrollto">BUY</a>
					</div>
				  </div>
				  <div class="member-info">
					<h4><?php echo $row['item_name'];?></h4>
					<span>Rs <?php echo $row['mrp'];?>/<?php echo $row['m_type'];?> </span>
				  </div>
				</div>
			  </div>
		<?php
			
		}
		?>

<!--  -->
  
		
  
		  </div>
  
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

</body>

</html>