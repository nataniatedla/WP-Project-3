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
                    
                </div>
            </header>

        <div class="container text-white">
    <h2 class='text-center text-white'>My Wishlist</h2>

    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">

		 
			<br>
			<table class="cart-table account-table table table-bordered bg-white text-dark">
				<thead>
					<tr>
						<th>Property Name</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$u_id = $_SESSION['user_name']; 
  
				$sql = "SELECT * FROM wishlist WHERE uid = '$u_id'";
				//$sql = "SELECT * FROM wishlist JOIN products on products.product_id=wishlist.pid";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
				 // output data of each row
				 while($row = mysqli_fetch_assoc($result)) {
 			?>
					<tr>
						<td>
                        <a href="houseinfo.php?id=<?php echo $row["property_id"] ?>">	<?php echo $row["address"] ?></a>
						
						</td>
						<td>
						<?php echo $row["price"] ?>
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
			</div>
		</div>
	</section>
	
 
</div>

    </body>
</html>