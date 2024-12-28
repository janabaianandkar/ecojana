<?php
session_start();
$sid=$_GET['id'];
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
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categories</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseOne">Woman</a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                            <ul>
                                                    <?php
                                                    $sql="select * from subcategory where cid=1";
                                                    $res=mysqli_query($con,$sql);
                                                    while($rw=mysqli_fetch_assoc($res))
                                                    {
                                                    ?>
                                                    <li><a href="product.php?id=<?php echo $rw['id']; ?>"><?php echo $rw['sname'];?></a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseTwo">Men</a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                            <ul>
                                                    <?php
                                                    $sql="select * from subcategory where cid=2";
                                                    $res=mysqli_query($con,$sql);
                                                    while($rw=mysqli_fetch_assoc($res))
                                                    {
                                                    ?>
                                                    <li><a href="product.php?id=<?php echo $rw['id']; ?>"><?php echo $rw['sname'];?></a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseThree">Kids</a>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                            <ul>
                                                    <?php
                                                    $sql="select * from subcategory where cid=3";
                                                    $res=mysqli_query($con,$sql);
                                                    while($rw=mysqli_fetch_assoc($res))
                                                    {
                                                    ?>
                                                    <li><a href="product.php?id=<?php echo $rw['id']; ?>"><?php echo $rw['sname'];?></a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFour">Accessories</a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                            <ul>
                                                    <?php
                                                    $sql="select * from subcategory where cid=4";
                                                    $res=mysqli_query($con,$sql);
                                                    while($rw=mysqli_fetch_assoc($res))
                                                    {
                                                    ?>
                                                    <li><a href="product.php?id=<?php echo $rw['id']; ?>"><?php echo $rw['sname'];?></a></li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                       
                        
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                        <?php
                        $psql="select * from product where sid='$sid'";
                        $pres=mysqli_query($con,$psql);
                        while($prw=mysqli_fetch_assoc($pres))
                        {
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="dashboard/imgs/<?php echo $prw['img']; ?>">
                                    <ul class="product__hover">
                                    <form method="post" action="add-to-cart.php">
                                    <input type="hidden" name="fetch" value="<?php echo $prw['id']; ?>">
                                        <li><a href="dashboard/imgs/<?php echo $prw['img']; ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="product-details.php?pid=<?php echo $prw['id']; ?>"><span><i class="fa fa-eye" style="font-size:24px;"></i></span></a></li>
                                        <li><button class="button1 b1" style="border:none;"><span class="icon_bag_alt"></span></button></li>
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
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    

    <!-- Footer Section Begin -->
    <?php include('footer.php'); ?>
    <!-- Footer Section End -->

</body>

</html>