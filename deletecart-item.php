<?php
session_start();
//session_destroy();
$id=$_GET['id'];
include('connect.php');
    foreach($_SESSION['cart'] as $key=>$val)
    {
		//echo $val['id'];
		
        if($_GET['id']==$val)
        {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo "<script>alert('Product is removed from your cart')
            window.location.href='shoping-cart.php'</script>";
			
        }
        
    }
?>