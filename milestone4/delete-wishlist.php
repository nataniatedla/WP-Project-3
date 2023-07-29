<?php
session_start();
include('props.php');
if(!isset($_SESSION['user'])){
    
header('location:buyerdashboard.php');
} else{
    $p_id = $_GET['pid']; 
    $c_id = $_GET['cid'];

    $delWishlist = "DELETE FROM wishlist WHERE pid='$p_id' AND uid='$c_id'";   
	if(mysqli_query($conn, $delWishlist)){
        header('location:show-wishlist.php');

    }
}

?>