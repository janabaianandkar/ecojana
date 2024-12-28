<?php
session_start();
include('connect.php');

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


    $csql="select count(id) from register where email='$eml'";
    $cres=mysqli_query($con,$csql);
    $count=mysqli_fetch_row($cres);
    if($count[0]=='1')
    {
       echo "<script>alert('You have already registed')</script>";
    }
    else
    {
       $rsql="insert into register(fname,email,password,mobileno,address,country,state,city,pincode,user_type)
       values('$fname','$eml','$pwd','$mob','$addr','$cou','$sta','$ci','$pin','customer')";
        
       if(mysqli_query($con,$rsql))
       {
         echo "<script>alert('Registration success...')
         window.location.href='login.php'</script>";
       }
       else
       {
        echo "<script>alert('Not Registration')
        window.location.href='register.php'</script>";
       }
    }
}
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
                            <h5>REGISTER FORM</h5>
                            <form method="post">
                                <input type="text" placeholder="Full Name" name="fname"
                                Required="required" pattern="[a-z A-Z]+">
                                <input type="text" placeholder="Email" Required="required" 
                                pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" name="eml">
                                <input type="password" placeholder="Password" Required="required" 
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd">
                                <input type="text" placeholder="Mobile No" name="mob"
                                Required="required" pattern="[0-9]{10}">
                                <input type="text" placeholder="Address" name="addr"
                                Required="required">
                                <input type="text" placeholder="Country" name="cou"
                                Required="required" pattern="[a-z A-Z]+">
                                <input type="text" placeholder="State" name="sta"
                                Required="required" pattern="[a-z A-Z]+">
                                <input type="text" placeholder="City" name="ci"
                                Required="required" pattern="[a-z A-Z]+">
                                <input type="text" placeholder="PinCode" name="pin"
                                Required="required" >
                                <button type="submit" class="site-btn" name="btn">Register</button>
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