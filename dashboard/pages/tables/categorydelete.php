<?php
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","ecodatabse");
$sql="delete from category where id=$id";
$res=mysqli_query($con,$sql);
if($res)
{
    echo "<script>alert('Category deleted')
    window.location.href='categorytable.php'</script>";
}
else
{
    echo "<script>alert('Category not deleted')
    window.location.href='categorytable.php'</script>";
}
?>