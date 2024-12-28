<?php
session_start();
include('connect.php');

$email=$_SESSION['ecouname'];

$esql="select * from register where email='$email' and user_type='customer'";
$eres=mysqli_query($con,$esql);
$erw=mysqli_fetch_assoc($eres);

?>

<!DOCTYPE html>
<html lang="zxx">

<body>

    <!-- Header Section Begin -->
   <?php include('header.php'); ?>
    <!-- Header Section End -->


    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title" style="text-align:left;">
                        <h2>Your Profile</h2>
                    </div>
                    <div class="contact__form__title" style="text-align:right; margin-top:-85px;">
                        <a href="editprofile.php" style="background-color:#007bff; border:none; font-size:18px; color:white; padding:7px;">Edit Profile</a>
                    </div>
                </div>
            </div>
            <br><br><br><br>
                <form method="post">
                <div class="row">
                    
                    
                  <div class="col-lg-12 " style="margin-left:90px;">
                   <table  cellpadding=8 width=50%>
                    <tr>
                        <th>Full Name</th>
                        <td><?php echo $erw['fname']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?php echo $erw['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Mobile No</th>
                        <td><?php echo $erw['mobileno']; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><?php echo $erw['address']; ?></td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td><?php echo $erw['country']; ?></td>
                    </tr>
                    <tr>
                        <th>State</th>
                        <td><?php echo $erw['state']; ?></td>
                    </tr>
                    <tr>
                        <th>City</th>
                        <td><?php echo $erw['city']; ?></td>
                    </tr>
                    <tr>
                        <th>Pincode</th>
                        <td><?php echo $erw['pincode']; ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" value="<?php echo $erw['password']; ?>" style="border:none;"></td>
                    </tr>
                   </table>
                  </div>
                </div>
            </form>
    </div>
</section>
<!-- Contact Section End -->


     <!-- Footer Section Begin -->
     <?php include('footer.php'); ?>
    <!-- Footer Section End -->

    
</body>

</html>