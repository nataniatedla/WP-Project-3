<?php

    session_start();
    
    $servername = "localhost";
    $username = "kajibade1";
    $password = "kajibade1";
    $dbname = "kajibade1";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password , $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (!isset($_SESSION['user_name'])) {
        header('location:dashboardNew.php');

    } else {
        $u_id = $_SESSION['user_id'];
        $p_id = $_GET['id']; 

        
        $sql_Check = "SELECT * FROM wishlist where pid = $p_id AND uid = $u_id";
        $result_check = mysqli_query($conn, $sql_Check);

        if (mysqli_num_rows($result_check) == 1 ) {
            echo "You've already added this property to your wishlist.";
            header('location:show-wishlist.php');
        } else {

            $insertWishlist = "INSERT INTO wishlist (pid, uid)
            VALUES ('$p_id', '$u_id')";

            if (mysqli_query($conn, $insertWishlist)) {
                echo "inserted";
                header('location:show-wishlist.php');
            }
        }

        
    }


?>