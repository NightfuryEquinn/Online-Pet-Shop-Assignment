<!--Retrieve data to display-->
<!DOCTYPE html>
<html>
    <head>
        <!--How code being decoded-->
        <meta charset = "utf-8">

        <!--How page being display based on viewport-->
        <meta name = "viewport" content = "width = device-width, initial-scale = 1 shrink-to-fit = no">

        <!--Add author, web description, keywords for search engine, and copyright-->
        <meta name = "author" content = "Yip Zi Xian | Neong Yee Kay | Wong Xie Ling">
        <meta name = "description" content = "Browse for your fluffy or exotic companions">
        <meta name = "keywords" content = "Les Petz Shop University Assignment, Les Petz Shop, University Assignment">
        <meta name = "copyright" content = "Copyright 2021 Yip Zi Xian, Neong Yee Kay, Wong Xie Ling">

        <!--Link to CSS-->
        <link rel = "stylesheet" href = "../css/content.css">

        <!--Link to JavaScript-->
        <script src = "../console.js"></script>

        <!--Link to Font Awesome v4 and v5-->
        <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.15.4/css/v4-shims.css">

        <!--Link to Google Font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Rubik:wght@300&display=swap" rel="stylesheet">
        
        <!--Link to Pictures file-->
        <link rel = "icon" type = image/png href = ../art/logo.png>

        <!--Title-->
        <title>Les Pet Shop - Accessories</title>
    </head>

    <body>
        <!--Back to Top Button-->
        <button id='back2top-btn' onclick='scroll2Top()' title='Purr back 2 top!~'><i class="fas fa-arrow-alt-circle-up fa-4x"></i></button>

        <!--Navigation Bar & Hamburger-->
        <header>
            <div class='nav-bar'>
                <img class='logo' src='../art/logo.png'>

                <div class='name'>Les   Pet   Shop</div>

                <div class='nav-btn-container'>
                    <button onclick="document.location='../homepage.html'"><span><i class="fas fa-home fa-2x"></i></span>HOME</button>
                    <button onclick="document.location='../pet.html'"><span><i class="fas fa-paw fa-2x"></i></span>PETS</button>
                    <button onclick="document.location='../food.html'"><span><i class="fas fa-fish fa-2x"></i></span>FOOD</button>
                    <button onclick="document.location='../accessories.html'"><span><i class="fas fa-gift fa-2x"></i></span>ACCESSORIES</button>
                    <button onclick="document.location='../userprofile.html'"><span><i class="fas fa-user-circle fa-2x"></i></span>PROFILE</button>
                    <button onclick="document.location='../login.html'"><span><i class="fas fa-sign-in-alt fa-2x"></i></span>LOGIN</button>
                </div>

                <div class='hamburger-nbc'>
                    <button id='hamburger-bar'><i class='fa fa-bars fa-3x'></i></button>
                    <div class='hamburger-content'>
                        <button onclick="document.location='../homepage.html'"><i class="fas fa-home fa-2x"></i><br>HOME</button>
                        <button onclick="document.location='../pet.html'"><i class="fas fa-paw fa-2x"></i><br>PETS</button>
                        <button onclick="document.location='../food.html'"><i class="fas fa-fish fa-2x"></i><br>FOOD</button>
                        <button onclick="document.location='../accessories.html'"><i class="fas fa-gift fa-2x"></i><br>ACCESSORIES</button>
                        <button onclick="document.location='../userprofile.html'"><i class="fas fa-user-circle fa-2x"></i><br>PROFILE</button>
                        <button onclick="document.location='../login.html'"><i class="fas fa-sign-in-alt fa-2x"></i><br>LOGIN</button>
                    </div>
                </div>
            </div>
        </header>

        <!--Cat Curved Bottom Background-->
        <img class='cat-background' src='../art/luxury.jpg'>

        <!--Title Quote-->
        <h1>LUXURIOUS PET LIFE</h1>

        <!--Search Bar-->
        <div class="search-bar">
            <input type='text' placeholder="What'cha wanna find here?" name="searchText">
            <br><br>
            <button name="search">SEARCH</button>
        </div>

        <!--Search activation-->
        <?php
            include("conn.php");

            $searchText = "";

            if(isset($_POST["search"])) {
                $searchText = $_POST['search'];
            }

            $searchResult = mysqli_query($con, "SELECT * FROM product WHERE Product_Category='accessory' LIKE '%$searchText%' ORDER BY Product_Name");
        ?>

        <!--Pet Flexboxes-->
        <div class='pet-flexbox-container'>

            <?php
                // Get and display data
                while ($row = mysqli_fetch_array($searchResult)){
                    
                    $display = '
                    
                    <div class="pet-card">
                    
                    <div class="pet-imagebox"
                    
                    <img src="data:image/jpg;base64, '.base64_encode($row['Product_Image']).'"

                    </div>

                    <div class="pet-descriptionbox">

                    <h2>'.$row['Product_Name'].'</h2>

                    <h6>'.$row['Product_Description'].'</h6>

                    <p>'.$row['Product_Price'].'</p>

                    <button>TAKE IT HOME!</button>

                    </div>

                    </div>

                    ';

                    echo $display;
                }

                // Close connection to database
                mysqli_close($con); 
            ?>

        <!--Footer-->
        <footer class="footer">
            <div class="footer-flex-container">
                <div class="footer-content"><h3>Home</h3>
                    <p>Les Pet Shop is always here for you and your pets. You can find yourself a companion and high quality pet product here!</p>
                </div>
                <div class="footer-content"><h3>Our services</h3>
                    <ul>
                        <li><i class="fas fa-paw"></i><a href="../pet.html">Pets</a></li>
                        <li><i class="fas fa-paw"></i><a href="../food.html">Pets Food</a></li>
                        <li><i class="fas fa-paw"></i><a href="../accessories.html">Pets Accessories</a></li>
                    </ul>
                </div>
                <div class="footer-content"><h3>Social media</h3>
                    <p>Find us on social media<br><br>
                    <a href="www.facebook.com" class="fa fa-facebook"></a>
                    <a href="www.twitter.com" class="fa fa-twitter"></a>
                    <a href="www.instagram.com" class="fa fa-instagram"></a></p>
                </div>
                <div class="footer-content contact"><h3>Contact us</h3>
                    <p>2, Jalan Besar 5,<br>50000 Kuala Lumpur, <br>Malaysia</p>
                    <p>Email: <a href="mailto:lespetshopt@gmail.com">lespetshopt@gmail.com</a></p>
                    <p>Phone no: <a href="tel:0312345678">03-12345678</a></p>
                </div>
            </div>
            <p id="copyright"><b>&#169 2021 Les Pet Shop (Team Name)</b></p>
        </footer>
    </body>
</html>