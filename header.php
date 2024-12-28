<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/dropdown.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    .navbar a:hover, .dropdown:hover .dropbtn {
    background-color:#ca1515;
    }

    .button1:hover{
        background-color:#ca1515;
        color: #ffffff;
	    transform: rotate(360deg);
    }
    .b1{
        font-size: 22px;
        
	color: #1c1c1c;
	height: 40px;
	width: 40px;
	line-height: 40px;
	text-align: center;
	border: 1px solid #ebebeb;
	background: #ffffff;
	display: block;
	border-radius: 50%;
	-webkit-transition: all, 0.5s;
	-moz-transition: all, 0.5s;
	-ms-transition: all, 0.5s;
	-o-transition: all, 0.5s;
	transition: all, 0.5s;
    }

    

</style>
   
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.php">Home</a></li>
                            <li><a href="./shop.php">Shop</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <!-- <a href="login.php">Login</a> -->
                            <?php
                            if(!isset($_SESSION['ecouname']))
                            {
                            ?>
                            <a href="login.php" style="color:black; font-weight:bold; margin-left:10px; font-size:20px;">Login</a>
                            <?php
                            }
                            else
                            {
                            ?>
                        <div class="dropdown">
                        <button class="dropbtn" style="font-weight:bold;"><i class="fa fa-user"></i> My Profile
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content" style="font-weight:bold;">
                          <a href="profile.php">Profile</a>
                          <a href="logout.php">Logout</a>
                        </div>
                        </div> 
                            <?php
                            }
                            ?>
                        </div>
                        <ul class="header__right__widget">
                            <!-- <li><span class="icon_search search-switch"></span></li>
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">2</div>
                            </a></li> -->
                            <?php
                            if(!empty($_SESSION['cart']))
                            {
                                $count=count(array_keys($_SESSION['cart']));
                            
                                
                            ?>
                            <li><a href="shoping-cart.php"><span class="icon_bag_alt"></span>
                                <div class="tip"><?php echo $count;?></div>
                            </a></li>
                            <?php
                            }
                            else
                            {
                            ?>
                            <li><a href="shoping-cart.php"><span class="icon_bag_alt"></span>
                                <div class="tip">0</div>
                            </a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
</body>
</html>