<?php
    include('connection.php');


    if(isset($_POST['submit']))
    {
        
        $email=$_POST['Email'];
        $pass=$_POST['Password'];
        $conf=$_POST['confirm'];
        if($pass==$conf)
        {
        // INSERT INTO `login` (`Lid`, `uname`, `password`, `utype`) VALUES (NULL, '', '', '')
        // INSERT INTO `login` ( ) VALUES (NULL, '', '', '')
        $sql="INSERT INTO `login` (`username`, `password`, `usertype`) VALUES ('$email', '$pass', 'user')";
        $result=$con->query($sql);
        echo "$sql";
        // echo "$result->error";

        $sql="select max(login_id) as mxid from login";
        $result=$con->query($sql);
        $utype=mysqli_fetch_assoc($result);
        $lid=$utype['mxid'];

        $name=$_POST['Name'];
       
        $addr=$_POST['Address'];
     
        $email=$_POST['Email'];
       
        $phone=$_POST['Phone'];
        

        $sql="INSERT INTO `customer` ( `name`, `address`, `phone`, `email`, `login_id`) VALUES ( '$name', '$addr', '$phone', '$email', '$lid')";

        $result=$con->query($sql);


        header("Location:login.php");


        
        }
        else
        {
            echo "<script>alert('password and confirm password not matching');</script>";
        }

    }
    
?>


<!-- PHP ENDS HERE -->

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Material sales depot system</title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="asset/fontawesome/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="asset/css/adminlte.min.css">
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <!-- /.login-logo -->
         <div class="card card-outline card-primary">
           
            <div class="card-body">
               <form action="" method="post">

                  <span>Name</span>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" name="Name" required placeholder="Name">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <!-- <span class="fas fa-lock"></span> -->
                        </div>
                     </div>
                  </div>
                  <span>Address</span>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" name="Address" required placeholder="Address">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <!-- <span class="fas fa-lock"></span> -->
                        </div>
                     </div>
                  </div>
                  <span>Phone</span>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" name="Phone" required placeholder="Phone">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <!-- <span class="fas fa-lock"></span> -->
                        </div>
                     </div>
                  </div>
                  <span>Email</span>
                  <div class="input-group mb-3">
                     <input type="email" class="form-control" name="Email" required placeholder="Email">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           
                        </div>
                     </div>
                  </div>
              <!--    <span>Username</span>
                  <div class="input-group mb-3">
                     <input type="email" class="form-control" name="username" required placeholder="Username">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           
                        </div>
                     </div>
                  </div> -->
                  <span>Password</span>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" name="Password" required placeholder="Password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <!-- <span class="fas fa-lock"></span> -->
                        </div>
                     </div>
                  </div>

                  <span>Confirm Password</span>
                  <div class="input-group mb-3">
                     <input type="password" class="form-control" name="confirm" required placeholder="Confirm Password">
                     <div class="input-group-append">
                        <div class="input-group-text">
                           <!-- <span class="fas fa-lock"></span> -->
                        </div>
                     </div>
                  </div>
                  <p style="color: red;"><?php echo @$_GET['error']; ?></p>
                  <div class="row">
                     <!-- <div class="col-12">
                        <div class="icheck-primary">
                           <input type="checkbox" id="remember">
                           <label for="remember">
                           Remember Me
                           </label>
                        </div>
                     </div> -->
                     <div class="col-6">
                        <button type="submit" name="submit" class="btn btn-info btn-block">Register</button>
                     </div>
                     <div class="col-6">
                        <a href="login.php" class="text-center btn btn-info btn-block">Back</a>
                     </div>
                  </div>
               </form>
            </div>
            <!-- /.card-body -->
         </div>
         <!-- /.card -->
      </div>
      <!-- /.login-box -->
   </body>
</html>




