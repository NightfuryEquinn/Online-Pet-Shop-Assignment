<?php
include("session.php");
$customer_id=$_SESSION['Customer_ID'];
?>

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
                    <button onclick="document.location='homepage.php'"><span><i class="fas fa-home fa-2x"></i></span>HOME</button>
                    <button onclick="document.location='pet.php'"><span><i class="fas fa-paw fa-2x"></i></span>PETS</button>
                    <button onclick="document.location='food.php'"><span><i class="fas fa-fish fa-2x"></i></span>FOOD</button>
                    <button onclick="document.location='accessories.php'"><span><i class="fas fa-gift fa-2x"></i></span>ACCESSORIES</button>
                    <button onclick="document.location='userprofile.php'"><span><i class="fas fa-user-circle fa-2x"></i></span>PROFILE</button>
                    <button onclick="document.location='logout.php'"><span><i class="fas fa-sign-out-alt fa-2x"></i></span>LOGOUT</button> 
                </div>
            </div>
        </header>

        <!--Curved Bottom Background-->
        <img class='curve-background' src='../art/luxury.jpg'>

        <!--Title Quote-->
        <h1>LUXURIOUS PET LIFE</h1>

        <!--Search Bar-->
        <form method="POST">
            <div class="search-bar">
                <input type='text' placeholder="What'cha wanna find here?" name="searchText">
                <br><br>
                <button name="search">SEARCH</button>
            </div>
        </form>

        <!--Search activation-->
        <?php
            include("conn.php");

            $searchText = "";

            if(isset($_POST["search"])) {
                $searchText = $_POST['searchText'];
            }

            $searchResult = mysqli_query($con, "SELECT * FROM product WHERE Product_Category='accessory' AND Product_Name LIKE '%$searchText%' ORDER BY Product_Name");
        ?>

        <!--Content Flexboxes-->
        <div class='content-flexbox-container'>

            <?php
                // Get and display data
                while ($row = mysqli_fetch_array($searchResult)){
                    
                    $display = '
                    
                    <div class="content-card">
                    
                    <div class="content-imagebox">
                    
                    <img src="data:image/jpg;base64, '.base64_encode($row['Product_Image']).'">

                    </div>

                    <div class="content-descriptionbox">

                    <h1>'.$row['Product_ID'].'</h1>

                    <h2>'.$row['Product_Name'].'</h2>

                    <h6>'.$row['Product_Description'].'</h6>

                    <p>RM '.$row['Product_Price'].'</p>

                    <form method="post" action="accessoriesToCart.php">
                    
                    <input type="hidden" name="Product_ID" value='.$row['Product_ID'].'>
                    
                    <input type="number" name="Quantity" value=1>
                    
                    <input type="submit" name="submit" value="Take it home">
                    
                    </form>
                    
                    </div>

                    </div>

                    ';

                    echo $display;
                }

                // Close connection to database
                mysqli_close($con); 
            ?>
        </div>

        <!--Footer-->
        <footer>
            <div class="footer-flexbox">
                <div class='footer-flexbox-item'>
                    <h3>About Us</h3>
                    <p>Les Pet Shop is always here for you and your pets. You can find yourself a companion and high quality pet product here!</p>
                </div>
                <div class='footer-flexbox-item'>
                    <h3>More From Us</h3>
                    <ul>
                    <li><i class="fas fa-paw"></i><a href="php/pet.php">Pets</a></li>
                    <li><i class="fas fa-paw"></i><a href="php/food.php">Pets Food</a></li>
                    <li><i class="fas fa-paw"></i><a href="php/accessories.php">Pets Accessories</a></li>
                    </ul>
                 </div>
                <div class='footer-flexbox-item'>
                    <h3>Stay with Us</h3>
                    <p class="media">
                        Find us on social media<br><br>
                        <a href="www.facebook.com" class="fa fa-facebook"></a>
                        <a href="www.twitter.com" class="fa fa-twitter"></a>
                        <a href="www.instagram.com" class="fa fa-instagram"></a>
                    </p>
                </div>
                <div class='footer-flexbox-item'>
                    <h3>Contact Us</h3>
                    <p>2, Jalan Besar 5,<br>50000 Kuala Lumpur, <br>Malaysia</p>
                    <p>Email: <a href="mailto:lespetshopt@gmail.com">lespetshopt@gmail.com</a></p>
                    <p>Phone no: <a href="tel:0312345678">03-12345678</a></p>
                </div>
            </div>
            <p id="copyright"><b>&#169 2021 Les Pet Shop (Team Name)</b></p>
        </footer>
    </body>
</html>