<?php
session_start();
session_destroy();
header('location:pages/samples/login.php');
?>