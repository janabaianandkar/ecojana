<?php
session_start();
include('connect.php');
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

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
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
                                            $qty=1;
                                            
                                            ?>
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="dashboard/imgs/<?php echo $vrw['img']; ?>" alt="">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $vrw['pname']; ?></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ <?php echo $vrw['price']; ?></td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="<?php echo $qty; ?>">
                                        </div>
                                    </td>
                                    <td class="cart__total">$ <?php echo $vrw['price']; ?></td>
                                    <td class="cart__close"><a href="deletecart-item.php?id=<?php echo $vrw['id']; ?>"><span class="icon_close"></span></a></td>
                                </tr>
                                <?php
                                 
                                 $tot+=$vrw['price']*$qty;
                                        }
                                    }
                                }
                               
                               
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="#">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="#"><span class="icon_loading"></span> Update cart</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ <?php echo $tot; ?></span></li>
                            <li>Total <span>$ <?php echo $tot; ?></span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

  

    <!-- Footer Section Begin -->
    <?php include('footer.php'); ?>
    <!-- Footer Section End -->

   

    
</body>

</html>