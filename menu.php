<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Material sales depot system</title>
      <!-- Font Awesome -->
      <link rel="stylesheet" href="../asset/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="../asset/css/adminlte.min.css">
      <link rel="stylesheet" href="../asset/css/animate.min.css">
      <link rel="stylesheet" href="../asset/css/style.css">

   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <!-- Navbar -->
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-widget="fullscreen" href="../logout.php">
                  <i class="fas fa-power-off"></i>
                  </a>
               </li>
            </ul>
         </nav>
         <!-- /.navbar -->
         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: rgba(62,88,113);">
                        <!-- Brand Logo -->
            <a href="#" class="brand-link animated swing">
      <img src="../asset/img/logo1.png" alt="DSMS Logo" width="200">   
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
               <!-- Sidebar user panel (optional) -->
               <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                 
                  <div class="info">
                     <a href="#" class="d-block">Admin</a>
                  </div>
               </div>
               <!-- Sidebar Menu -->
               <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                     <li class="nav-item animated bounceInLeft">
                        <a href="dashboard.php" class="nav-link">
                          
                           <i class="nav-icon fa fa-tachometer-alt"></i>
                           <p>
                              Dashboard
                           </p>
                        </a>
                     </li>
                     <li class="nav-item animated bounceInLeft">
                        <a href="dashboard.php" class="nav-link">
                           <i class="fas fa-angle-double-right"></i>
                           <p>Materials</p>
                           <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="add_view_category.php" class="nav-link">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>Add/View Category</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="add-material.php" class="nav-link">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>Add Materials</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="admin_view_material.php" class="nav-link">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>View/update Materials</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="add_view_stock.php" class="nav-link">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>Add/View Stock</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#" class="nav-link">
                                 <i class="nav-icon fa fa-list"></i>
                                 <p>Manage</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item animated bounceInLeft">
                        <a href="dashboard.php" class="nav-link">
                           <i class="fas fa-angle-double-right"></i>
                           <p>
                              drivers
                           </p>
                           <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="add-driver.php" class="nav-link">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>Add</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#" class="nav-link">
                                 <i class="nav-icon fa fa-list"></i>
                                 <p>Manage</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item animated bounceInRight">
                        <a href="#" class="nav-link">
                           <i class="fas fa-angle-double-right"></i>
                           <p>
                              Vehicle
                           </p>
                           <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="add-vehicle.php" class="nav-link">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>Add</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#" class="nav-link">
                                 <i class="nav-icon fa fa-list"></i>
                                 <p>Manage</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     
                     <li class="nav-item animated bounceInRight">
                        <a href="#" class="nav-link">
                           <i class="fas fa-angle-double-right"></i>
                           <p>
                              Orders
                           </p>
                              <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="#" class="nav-link">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>Add</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#" class="nav-link">
                                 <i class="nav-icon fa fa-list"></i>
                                 <p>Manage</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item animated bounceInRight">
                        <a href="#" class="nav-link">
                           <i class="fas fa-angle-double-right"></i>
                           <p>
                              blank
                           </p>
                              <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                           <li class="nav-item">
                              <a href="#" class="nav-link">
                                 <i class="nav-icon fa fa-plus"></i>
                                 <p>Add</p>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a href="#" class="nav-link">
                                 <i class="nav-icon fa fa-list"></i>
                                 <p>Manage</p>
                              </a>
                           </li>
                        </ul>
                     </li>
                     <li class="nav-item animated bounceInRight">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-comments"></i>
                           <p>
                              Feedback
                           </p>
                        </a>
                     </li>
                     <li class="nav-item animated bounceInRight">
                        <a href="#" class="nav-link">
                           <i class="nav-icon fa fa-chart-bar"></i>
                           <p>
                              Report
                           </p>
                        </a>
                     </li>
                     
                  </ul>
                  </li>
                  </ul>
               </nav>
               <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
         </aside>





