<?php
session_start();
include('connect.php');
?>

<!DOCTYPE html>
<html lang="zxx">
    <!-- Header Section start -->
  <?php include('header.php');?>
  
    <!-- Header Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <?php
            $csql="select * from category";
            $cres=mysqli_query($con,$csql);
            // $crw=mysqli_fetch_assoc($cres)
            ?>
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="dashboard/imgs/wf.jpg">
                    <div class="categories__text">
                        <h1>New Fashion</h1>
                         <br>
                        <a href="shop.php">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <?php
                    while($crw=mysqli_fetch_assoc($cres))
                    {
                    ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="dashboard/imgs/<?php echo $crw['img']; ?>">
                            <div class="categories__text">
                                <h4><?php echo $crw['cname']; ?></h4>
                                <br>
                                <a href="shop1.php?cid=<?php echo $crw['id']; ?>" style="color:black;">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    <?php
                    $csql1="select * from category";
                    $cres1=mysqli_query($con,$csql1);
                    while($crw1=mysqli_fetch_assoc($cres1))
                    {
                    ?>
                    <li data-filter=".women"><?php echo $crw1['cname']; ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            <?php
            $psql="select * from product";
            $pres=mysqli_query($con,$psql);
            while($prw=mysqli_fetch_assoc($pres))
            {
            ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="dashboard/imgs/<?php echo $prw['img']; ?>">
                        <ul class="product__hover">
                        <form method="post" action="add-to-cart.php">
                        <input type="hidden" name="fetch" value="<?php echo $prw['id']; ?>">
                            <li><a href="dashboard/imgs/<?php echo $prw['img']; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                            <li><a href="product-details.php?pid=<?php echo $prw['id']; ?>"><span><i class="fa fa-eye" style="font-size:24px;"></i></span></a></li>
                            <li><button class="button1 b1" style="border:none; "><span class="icon_bag_alt"></span></button></li>
                        </form>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="product-details.php?pid=<?php echo $prw['id']; ?>"><?php echo $prw['pname']; ?></a></h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price">$ <?php echo $prw['price']; ?></div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="img/banner/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->





<br>



<!-- Footer Section Begin -->
<?php include('footer.php'); ?>
<!-- Footer Section End -->

</body>

</html>