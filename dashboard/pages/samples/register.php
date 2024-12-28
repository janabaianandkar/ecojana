<?php
include('../../connect.php');

if(isset($_POST['btn']))
{
  $name=$_POST['name'];
  $eml=$_POST['eml'];
  $pwd=$_POST['pwd'];
  $mob=$_POST['mob'];
  $addr=$_POST['addr'];
  $cou=$_POST['cou'];
  $sta=$_POST['sta'];
  $city=$_POST['city'];
  $pin=$_POST['pin'];

  $sql="insert into register(fname,email,password,mobileno,address,country,state,city,pincode)values
  ('$name','$eml','$pwd','$mob','$addr','$cou','$sta','$city','$pin')";

  if(mysqli_query($con,$sql))
  {
    echo "<script>alert('Registered success')</script>";
  }
  else
  {
    echo "<script>alert('Not Registered')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="../../images/logo.svg" alt="logo">
              </div>
              <h4>Registration</h4>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <label>Full name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="Full Name"
                    name="name" Required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control form-control-lg border-left-0" placeholder="Email"
                    name="eml" Required="required" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$">
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password"
                    Required="required" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="First charater will be capital at maximum 8">                        
                  </div>
                </div>
                <div class="form-group">
                  <label>Mobile No</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <!-- <i class="mdi mdi-mobile-phone-outline text-primary"></i> -->
                        <i class="fa fa-mobile text-primary" ></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="Mobile No"
                    Required="required" name="mob">
                  </div>
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <!-- <i class="mdi mdi-account-outline text-primary"></i> -->
                        <i class="fa fa-address-card text-primary" ></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="Address"
                    Required="required" name="addr">
                  </div>
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control form-control-lg" id="exampleFormControlSelect2" name="cou">
                    <option>Country</option>
                    <option>United States of America</option>
                    <option>United Kingdom</option>
                    <option>India</option>
                    <option>Germany</option>
                    <option>Argentina</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>State</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <!-- <i class="mdi mdi-account-outline text-primary"></i> -->
                        <img src="../../imgs/stateicon.png" width=15 height=15 style="color:purple;">
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="State"
                    Required="required" name="sta">
                  </div>
                </div>
                <div class="form-group">
                  <label>City</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <!-- <i class="mdi mdi-account-outline text-primary"></i> -->
                        <img src="../../imgs/cityicon.jpg" width=18 height=18>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="City"
                    Required="required" name="city">
                  </div>
                </div>
                <div class="form-group">
                  <label>Pincode</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <!-- <i class="mdi mdi-account-outline text-primary"></i> -->
                        <i class="fa fa-map-pin text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" placeholder="Pincode"
                    Required="required" name="pin">
                  </div>
                </div>
               <br>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="btn"
                  type="submit">REGISTER</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.html" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-none d-lg-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
