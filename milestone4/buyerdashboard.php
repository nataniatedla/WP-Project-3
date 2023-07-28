<html>
    <head>
        <meta charset="UTF-8">
    <!-- css stylesheets -->
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="cards.css">
        <link rel="stylesheet" href="thankyou.css">

        <!-- javascript -->
        <script type="text/javascript" src="dashboard.js" defer></script>
    
        <title>UBuyIt - Buyer Dashboard</title>
    </head>
    <body onload="openMessage()">

    <!-- THANK YOU MESSAGE -->
        <div class="messageContainer">
                <div class="thankyou" id="thankyou">
                <img class="smile" src="smile.png">
                <h2>Thank you for choosing us!</h2>
                <p>You have successfully logged into your account. Happy browsing!</p>
                <button type="button" onclick="closeMessage()">Continue to Dashboard</button>
            </div>
        </div>

    <!-- UBUYIT HEADER -->
        <header>
                <h1>UBuyIt</h1>
            
                <div class="register-button-container">
                    <a href="signupform.html" class="register-button">Register</a>
                    <a href="login.html" class="login-button">Login</a>
                </div>
            </header>

    <!-- SEARCH BAR -->
        <div class="search">
            <label for="searchInput">Search</label>
            <input type="search" id="searchInput" oninput="liveSearch()" placeholder="Search...">
            <br>
            
            <div class="query">
                <h3>Title of Prope</h3>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized </p>
            </div>

            <div class="query">
                <h3>What we do</h3>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized </p>
            </div>

            <div class="query">
                <h3>Why work here</h3>
                <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularized</p>
            </div>
        </div>
    


    <!-- DASHBOARD CARDS -->
        <div class="uhm">
            <h2> Some properties you might be interested in...</h2>
        </div>

        <div class="container">

            <!-- CARD 1 -->
            <div class="card">
                <div class="cover cover1">
                    <div class="content">
                        <img src="house1.jpg">
                    </div>
                </div>
                <div class="cover cover2">
                    <div class="content">
                        <h3> $453,000</h3>
                        <hr>
                        <p>2 </p>
                        <a href="houseinfo.html">Read More</a>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="card">
                <div class="cover cover1">
                    <div class="content">
                        <img src="house2.jpg">
                    </div>
                </div>
                <div class="cover cover2">
                    <div class="content">
                        <h3></h3>
                        <p></p>
                        <a href="houseinfo.html">Read More</a>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="card">
                <div class="cover cover1">
                    <div class="content">
                        <img src="house3.jpg">
                    </div>
                </div>
                <div class="cover cover2">
                    <div class="content">
                        <p></p>
                        <a href="houseinfo.html">Read More</a>
                    </div>
                </div>
            </div>
        </div>

    <!-- WISHLIST -->
        <div class="wishlist">
            <a href="wishlist.html" class="register-button">View Wishlist</a>
        </div>

        <p>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="border:0;width:88px;height:31px"
                    src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                    alt="Valid CSS!" />
            </a>
        </p>
        

    </body>
</html>