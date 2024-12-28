<?php
session_start();
// $pid=$_GET['pid'];
include('connect.php');

if(!isset($_SESSION['ecouname']))
{
    echo "<script>alert('First login')
    window.location.href='login.php'</script>";
}
else
{
if(isset($_POST['fetch']))
{
	$fetch=$_POST['fetch'];
	
	
    if(empty($_SESSION['cart']))
    {
        $_SESSION['cart']=array();
    }
    
    
    if(!in_array($fetch, $_SESSION['cart'])){
		array_push($_SESSION['cart'], $fetch);
        echo "<script>alert('Product added to cart')
        window.location.href='shoping-cart.php'</script>";
	}
	else{
		// echo "<script>alert('Product already in cart')window.location.href='shopping_cart.php'</script>";
        echo "<script>alert('Product already in cart')
        window.location.href='shoping-cart.php'</script>";
	}
    

}

}
?>