<?php
session_start();
include('connect.php');

if(isset($_POST['btn']))
{
    $eml=$_POST['eml'];
    $pwd=$_POST['pwd'];

    $lsql="select count(id) from register where email='$eml' and password='$pwd' and user_type='customer'";
    $lres=mysqli_query($con,$lsql);
    $count=mysqli_fetch_row($lres);
    if($count[0]=='1')
    {
        $_SESSION['ecouname']=$eml;
        echo "<script>alert('Login success...')
        window.location.href='index.php'</script>";
    }
    else
    {
        echo "<script>alert('User Found')
        window.location.href='login.php'</script>";
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
                            <h5>LOGIN FORM</h5>
                            <form method="post">
                                <input type="text" placeholder="Email" Required="required" 
                                pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" name="eml">
                                <input type="password" placeholder="Password" Required="required" 
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd">
                                
                                <button type="submit" class="site-btn" name="btn">Login</button><br> <br> 
                                <p align="center">Don't have an account? <a href="register.php">Create One</a></p>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<br>
<!-- Footer Section Begin -->
<?php include('footer.php'); ?>
<!-- Footer Section End -->



</body>

</html>