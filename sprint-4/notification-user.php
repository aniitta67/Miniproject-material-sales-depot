<?php

  session_start();
  require('../connection.php');
  $cid=$_SESSION['UID'];
 $id= $_SESSION['i_id'];
 
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6b773fe9e4.js" crossorigin="anonymous"></script>
    <style type="text/css">
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 5px;
        }
        body {
            font-size: 14px;
        }
    </style>
	
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
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="float-left">Notification Details</h2>
                  
                       <!-- <a href="selection-index.php" class="btn btn-info float-right mr-2">Reset View</a>
                        <a href="index.php" class="btn btn-secondary float-right mr-2">Back</a>-->
                    </div>

                                       </div>
                        </form>
                    <br>

                    <?php
                    // Include config file
                    require_once "config.php";
                    

                    //Get current URL and parameters for correct pagination
                    $protocol = $_SERVER['SERVER_PROTOCOL'];
                    $domain     = $_SERVER['HTTP_HOST'];
                    $script   = $_SERVER['SCRIPT_NAME'];
                    $parameters   = $_SERVER['QUERY_STRING'];
                    $protocol=strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https')
                                === FALSE ? 'http' : 'https';
                    $currenturl = $protocol . '://' . $domain. $script . '?' . $parameters;

                    //Pagination
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }

                    //$no_of_records_per_page is set on the index page. Default is 10.
                    $offset = ($pageno-1) * $no_of_records_per_page;

                    $total_pages_sql = "SELECT COUNT(*) FROM selection";
                    $result = mysqli_query($link,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    //Column sorting on column name
                    $orderBy = array('Driver', 'Vehcile', 'Phone', 'Location', 'Charge', 'pid');
                    $order = 'sid';
                    if (isset($_GET['order']) && in_array($_GET['order'], $orderBy)) {
                            $order = $_GET['order'];
                        }

                    //Column sort order
                    $sortBy = array('asc', 'desc'); $sort = 'desc';
                    if (isset($_GET['sort']) && in_array($_GET['sort'], $sortBy)) {
                          if($_GET['sort']=='asc') {
                            $sort='desc';
                            }
                    else {
                        $sort='asc';
                        }
                    }

                    // Attempt select query execution
                //    $sql = "SELECT * FROM selection ORDER BY $order $sort LIMIT $offset, $no_of_records_per_page";
					
					$sql = "SELECT * FROM selection where pid in(select payid from payment where cid=$cid) ORDER BY $order $sort LIMIT $offset, $no_of_records_per_page";
					
					
					
                    $count_pages = "SELECT * FROM selection";


                    if(!empty($_GET['search'])) {
						
                        $search = ($_GET['search']);
                        $sql = "SELECT * FROM selection
                            WHERE CONCAT_WS (Driver,Vehcile,Phone,Location,Charge,pid)
                            LIKE '%$search%'
                            ORDER BY $order $sort
                            LIMIT $offset, $no_of_records_per_page";
                        $count_pages = "SELECT * FROM selection
                            WHERE CONCAT_WS (Driver,Vehcile,Phone,Location,Charge,pid)
                            LIKE '%$search%'
                            ORDER BY $order $sort";
                    }
                    else {
                        $search = "";
                    }

                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            if ($result_count = mysqli_query($link, $count_pages)) {
                               $total_pages = ceil(mysqli_num_rows($result_count) / $no_of_records_per_page);
                           }
                            $number_of_results = mysqli_num_rows($result_count);
                            echo " " . $number_of_results . " results - Page " . $pageno . " of " . $total_pages;

                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th><a href=?search=$search&sort=&order=Driver&sort=$sort>Driver</th>";
										echo "<th><a href=?search=$search&sort=&order=Vehcile&sort=$sort>Vehcile</th>";
										echo "<th><a href=?search=$search&sort=&order=Phone&sort=$sort>Phone</th>";
										echo "<th><a href=?search=$search&sort=&order=Location&sort=$sort>Location</th>";
										echo "<th><a href=?search=$search&sort=&order=Charge&sort=$sort>Charge</th>";
										echo "<th><a href=?search=$search&sort=&order=pid&sort=$sort>pid</th>";
										
                                       
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . prav_get("full_name","driver","driver_id",$row['Driver']). "</td>";echo "<td>" .prav_get("name","vehicle","vehicle_id",$row['Vehcile']) . "</td>";echo "<td>" . $row['Phone'] . "</td>";echo "<td>" . $row['Location'] . "</td>";echo "<td>" . $row['Charge'] . "</td>";echo "<td>" . $row['pid'] . "</td>";
                                       
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
?>
                                <ul class="pagination" align-right>
                                <?php
                                    $new_url = preg_replace('/&?pageno=[^&]*/', '', $currenturl);
                                 ?>
                                    <li class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=1' ?>">First</a></li>
                                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo $new_url ."&pageno=".($pageno - 1); } ?>">Prev</a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo $new_url . "&pageno=".($pageno + 1); } ?>">Next</a>
                                    </li>
                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                                        <a class="page-item"><a class="page-link" href="<?php echo $new_url .'&pageno=' . $total_pages; ?>">Last</a>
                                    </li>
                                </ul>
<?php
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>
</html>