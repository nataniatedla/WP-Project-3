<?php
    include('loginsuccess.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <!-- css stylesheets -->
        <link rel="stylesheet" href="dashboard.css">

        <title>UBuyIt - House Listing 1</title>
    </head>
    <body>
        <!-- UBUYIT HEADER -->
        <header>
                <h1>UBuyIt</h1>
            
                <div class="register-button-container">
                    <a href="signupform.html" class="register-button">Register</a>
                    <a href="login.html" class="login-button">Login</a>
                </div>
            </header>


            <div class="block">
                <h2>My Wishlist</h2>

                <section id="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <table class="wishlist">
                                    <thead>
                                        <tr>
                                            <th>Property Name</th>
                                            <th>Price</th>

                                            <th>Date and Time</th>
                                            <th>Delete Item?</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                <?php
                                   $u_id = $_SESSION['user'];

                                   $sql = "SELECT * FROM wishlist JOIN props.property_id = wishlist.pid";
                                   //$sql = "SELECT * FROM wishlist JOIN props on props.home uid = wishlist.pid";
                                   $result = mysqli_query($conn, $sqli);

                                   if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                <tr>
                                    <td>
                                        <?php echo $row["property_id"] ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $row["price"] ?>
                                    </td>

                                    <td>
                                        <a href="delete-wishlist.php?pid=<?php echo $row["product_id"] ?>&cid=<?php echo $_SESSION['customerid'] ?>">Delete</a> 
                                        
                                    </td>
                                </tr> 
                            <?php
				                }
                                } else {
                                    echo "0 results";
                                } 
                
                            ?>
                        </tbody>
                        </table>


                            </div>
                        </div>
                    </div>
                </section>

            </div>

    </body>
</html>