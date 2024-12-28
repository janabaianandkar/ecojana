<?php
session_start();
include('connect.php');

$email=$_SESSION['ecouname'];

if(isset($_POST['btn']))
{
    $fname=$_POST['fname'];
    $eml=$_POST['eml'];
    $pwd=$_POST['pwd'];
    $mob=$_POST['mob'];
    $addr=$_POST['addr'];
    $cou=$_POST['cou'];
    $sta=$_POST['sta'];
    $ci=$_POST['ci'];
    $pin=$_POST['pin'];


    $rsql="update register set fname='$fname',email='$eml',password='$pwd',mobileno='$mob',address='$addr',
        country='$cou',state='$sta',city='$ci',pincode='$pin',user_type='customer' where email='$email'";
        
       if(mysqli_query($con,$rsql))
       {
         echo "<script>alert('Edit success...')
         window.location.href='profile.php'</script>";
       }
       else
       {
        echo "<script>alert('Not edit')
        window.location.href='editprofile.php'</script>";
       }
}

$esql="select * from register where email='$email'";
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
                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="contact__content">
                        
                        <div class="contact__form">
                            <h5>Edit Profile</h5>
                            <form method="post">
                                <input type="text" value="<?php echo $erw['fname']; ?>" name="fname"
                                Required="required" pattern="[a-z A-Z]+">
                                
                                <input type="text" value="<?php echo $erw['email']; ?>" Required="required" 
                                pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" name="eml">
                                
                                <input type="password" value="<?php echo $erw['password']; ?>" Required="required" 
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd">
                                
                                <input type="text" value="<?php echo $erw['mobileno']; ?>" name="mob"
                                Required="required" pattern="[0-9]{10}">
                                
                                <input type="text" value="<?php echo $erw['address']; ?>" name="addr"
                                Required="required">
                                
                                <input type="text" value="<?php echo $erw['country']; ?>" name="cou"
                                Required="required" pattern="[a-z A-Z]+">
                                
                                <input type="text" value="<?php echo $erw['state']; ?>" name="sta"
                                Required="required" pattern="[a-z A-Z]+">
                                
                                <input type="text" value="<?php echo $erw['city']; ?>" name="ci"
                                Required="required" pattern="[a-z A-Z]+">
                               
                                <input type="text" value="<?php echo $erw['pincode']; ?>" name="pin"
                                Required="required" >
                                
                                <button type="submit" class="site-btn" name="btn">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->


<!-- Footer Section Begin -->
<?php include('footer.php'); ?>
<!-- Footer Section End -->



</body>

</html>