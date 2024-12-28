<?php
session_start();
include('connect.php');

if(isset($_SESSION['ecouname']))
{
    $order=$_SESSION['ecouname'];

$ssql="select * from register where email='$order'";
$sres=mysqli_query($con,$ssql);
$srw=mysqli_fetch_assoc($sres);


if(isset($_POST['btn']))
{
    $pid=$_POST['pid'];
    $qty=$_POST['qty'];
    $uid=$_POST['uid'];
    $fname=$_POST['fname'];
    $eml=$_POST['eml'];
    $pwd=$_POST['pwd'];
    $mob=$_POST['mob'];
    $addr=$_POST['addr'];
    $cou=$_POST['cou'];
    $sta=$_POST['sta'];
    $ci=$_POST['ci'];
    $pin=$_POST['pin'];
    $tot1=$_POST['tot'];

    $arr=array();
    $count=count($_POST['pname']);
    
    for($i=0;$i<$count;$i++)
    {
        array_push($arr,$_POST['pname'][$i]);
    }
     $pname=json_encode($arr);


    
     $count2=count($_POST['price']);
     $count1=count($_POST['pid']);
     for($i=0;$i<$count1;$i++)
    {
       $pid=$_POST['pid'][$i];
        $csql="insert into cart(uid,pid,qty)values('$uid','$pid','$qty')";
        if(mysqli_query($con,$csql))
        {
           echo "<script>alert('cart sucess')</script>";
        }
        else
        {
            echo "<script>alert('error)</script>";
        }
    }
        for($i=0;$i<$count2;$i++)
        {
           $price=$_POST['price'][$i];
           $pid1=$_POST['pid'][$i];
            $orsql="insert into orders(pid,price,qty)values('$pid1','$price','$qty')";
            if(mysqli_query($con,$orsql))
            {
                echo "<script>alert('order sucessfully')</script>";
            }
            else
            {
                echo "<script>alert('error)</script>";
            }
        }



    
    //echo $tot1;
    $osql="insert into checkout(uid,fname,email,password,mobileno,address,country,state,city,pincode,user_type,pname,total)
    values('$uid','$fname','$eml','$pwd','$mob','$addr','$cou','$sta','$ci','$pin','customer','$pname','$tot1')";


    $to=$order;
    $subject = "Order successfully";
    $body = '<html><body><div style="background:#D8BFD8;height:auto;width:200px;padding:10px;border-radius:5px">';
    $body .= '<h2 style="color:#9F2B68;margin-left:45px;margin-top:5px">Your Order</h2><table style="padding:2px;"><tr><th>Product Name</th><th>Price</th></tr>';
    for($i=0;$i<count($arr);$i++){
        $body .= '<tr><td>'.$arr[$i].'</td><td>'.$price[$i].'</td></tr>';
    }
    $body .= '<tr colspan="3">-----------------------------------</tr><tr><td style="font-weight: bold;">Total</td><td>'.$tot1.'</td></tr><tr colspan="3">-----------------------------------</tr>';
    $body .= '<tr colspan="3">Thankyou For Your Order!!</tr></div></body></html>';
    $headers = "From:janabaianandkar88@gmail.com";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // $to=$order;
    // $subject = "Order successfully";
    // $body = $pname;
    // $body1=$tot1;
    // $headers = "From:janabaianandkar88@gmail.com";

    if (mail($to, $subject, $body, $headers))
    {
        echo "<script>alert('sent success')</script>";

    if(mysqli_query($con,$osql))
    {
        echo "<script>alert('Order Success...')
        </script>";
       unset($_SESSION['cart']);

    }
    else
    {
        echo "<script>alert('Order not Success...')
        window.location.href='checkout.php'</script>";
    }
}
else
{
    echo "error";
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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                
            </div>
            <form class="checkout__form" method="post">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                        <input type="hidden" name="uid" value="<?php echo $srw['id']; ?>">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Full Name <span>*</span></p>
                                    <input type="text" Required="required" pattern="[a-z A-Z]+" name="fname"
                                        value="<?php echo $srw['fname']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text" Required="required" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
                                        name="eml" value="<?php echo $srw['email']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Password <span>*</span></p>
                                    <input type="password" Required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        name="pwd" value="<?php echo $srw['password']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone No <span>*</span></p>
                                    <input type="text" Required="required" pattern="[0-9]{10}" name="mob"
                                        value="<?php echo $srw['mobileno']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Country <span>*</span></p>
                                    <input type="text" Required="required" pattern="[a-z A-Z]+" name="cou"
                                value="<?php echo $srw['country']; ?>">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" Required="required"  class="checkout__input__add"
                                name="addr" value="<?php echo $srw['address']; ?>">
                                </div>
                                <div class="checkout__form__input">
                                    <p>City <span>*</span></p>
                                    <input type="text" Required="required" pattern="[a-z A-Z]+" name="ci"
                                value="<?php echo $srw['city']; ?>">
                                </div>
                                <div class="checkout__form__input">
                                    <p>State <span>*</span></p>
                                    <input type="text" Required="required" pattern="[a-z A-Z]+" name="sta"
                                value="<?php echo $srw['state']; ?>">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Pincode <span>*</span></p>
                                    <input type="text" Required="required" name="pin"
                                value="<?php echo $srw['pincode']; ?>">
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="checkout__form__checkbox">
                                    <label for="acc">
                                        Create an acount?
                                        <input type="checkbox" id="acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing
                                        customer login at the <br />top of the page</p>
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Account Password <span>*</span></p>
                                        <input type="text">
                                    </div>
                                    <div class="checkout__form__checkbox">
                                        <label for="note">
                                            Note about your order, e.g, special noe for delivery
                                            <input type="checkbox" id="note">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Oder notes <span>*</span></p>
                                        <input type="text"
                                        placeholder="Note about your order, e.g, special noe for delivery">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        <?php
                                        $tot='';
                                    if(isset($_SESSION['cart']))
                                    {
                                        $tot=0;
                                    foreach($_SESSION['cart'] as $key=>$val)
                                    {
                                        $vsql="select * from product where id=$val";
                                        $vres=mysqli_query($con,$vsql);
                                        while($vrw=mysqli_fetch_assoc($vres))
                                        {
                                            $pname=$vrw['pname'];
                                            
                                    ?>
                                    <input type="hidden" name="pid[]" value="<?php echo $vrw['id']; ?>">
                                    
                                        <li><input type="text" name="pname[]" value="<?php echo $pname; ?>" style="border:none;background-color:#f5f5f5;" > 
                                        <span><input type="text" name="price[]" value="<?php echo $vrw['price']; ?>" style="border:none;background-color:#f5f5f5;color:black;font-weight:bold;text-align:end" ></span></li>
                                        
                                        <?php
                                    $qty=1;
                                    $tot+=$vrw['price']*$qty;
                                       }
                                    }
                                    }
                                    ?>
                                    <input type="hidden" name="qty" value="<?php echo $qty; ?>">
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Subtotal <span><?php echo $tot; ?></span></li>
                                        <li>Total <span><input type="text" name="tot" value="<?php echo $tot; ?>" style="border:none;background-color:#f5f5f5;text-align:end;color:#dd2222;font-weight:bold;" ></span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__widget">
                                    <label for="o-acc">
                                        Create an acount?
                                        <input type="checkbox" id="o-acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing customer
                                    login at the top of the page.</p>
                                    <label for="check-payment">
                                        Cheque payment
                                        <input type="checkbox" id="check-payment">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="paypal">
                                        PayPal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn" name="btn">Place order</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->

        

        <!-- Footer Section Begin -->
        <?php include('footer.php'); ?>
        <!-- Footer Section End -->

        

    
    </body>

    </html>