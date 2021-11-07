<?php
//include("session.php");
//$username=$_SESSION['mySession'];
$username= "Box";
?>

<html>
<head>
    <!--Link to Pictures file-->
    <link rel = "icon" type = image/png href = ../art/logo.png>

    <!--Title-->
    <title>Les Pet Shop</title>

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c8bccee41a.js" crossorigin="anonymous"></script>

    <!--Add font library-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--link css-->
    <link href="../css/profile.css" rel="stylesheet">

    <!--Link to JavaScript-->
    <script src = "../console.js"></script>

</head>

<body style="background-image:url('../art/profile_background.jpg'); background-size: cover;">
<!--Back to Top Button-->
<button id='back2top-btn' onclick='scroll2Top()' title='Purr back 2 top!~'><i class="fas fa-arrow-alt-circle-up fa-4x"></i></button>

<!--Navigation Bar & Hamburger-->
<header>
    <div class='nav-bar'>
        <img class='logo' src='../art/logo.png'>

        <div class='name'>Les   Pet   Shop</div>

        <div class='nav-btn-container'>
            <button onclick="document.location='../homepage.html'"><span><i class="fas fa-home fa-2x"></i></span>HOME</button>
            <button onclick="document.location='../.html'"><span><i class="fas fa-paw fa-2x"></i></span>PETS</button>
            <button onclick="document.location='../food.html'"><span><i class="fas fa-fish fa-2x"></i></span>FOOD</button>
            <button onclick="document.location='../accessories.html'"><span><i class="fas fa-gift fa-2x"></i></span>ACCESSORIES</button>
            <button onclick="document.location='../userprofile.php'"><span><i class="fas fa-user-circle fa-2x"></i></span>PROFILE</button>
            <button onclick="document.location='../login.html'"><span><i class="fas fa-sign-in-alt fa-2x"></i></span>LOGIN</button>
        </div>

        <div class='hamburger-nbc'>
            <button id='hamburger-bar'><i class='fa fa-bars fa-3x'></i></button>
            <div class='hamburger-content'>
                <button onclick="document.location='../homepage.html'"><i class="fas fa-home fa-2x"></i><br>HOME</button>
                <button onclick="document.location='../pet.html'"><i class="fas fa-paw fa-2x"></i><br>PETS</button>
                <button onclick="document.location='../food.html'"><i class="fas fa-fish fa-2x"></i><br>FOOD</button>
                <button onclick="document.location='../accessories.html'"><i class="fas fa-gift fa-2x"></i><br>ACCESSORIES</button>
                <button onclick="document.location='../userprofile.php'"><i class="fas fa-user-circle fa-2x"></i><br>PROFILE</button>
                <button onclick="document.location='../login.html'"><i class="fas fa-sign-in-alt fa-2x"></i><br>LOGIN</button>
            </div>
        </div>
    </div>
</header>

<div class="body-container">
    <div class="profile">
        <h1>Profile</h1>
        <hr>
        <?php include("conn.php");
                $result = mysqli_query($con,"SELECT * FROM customer WHERE Username='Box'");
                $row = mysqli_fetch_array($result);
        ?>
        <div class="profile-top" style="background-image: url('../art/profile_cover.jpg')">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Profile_pic']).'" id ="profile-picture"/>';
                echo "<h2>".$row['Username']."</h2>";?>
        </div>
        <div class="profile-mid">
            <h2>Personal Information</h2>
            <div class="personal-info">
                <div class="personal-info-card">
                    <div class="info-left">
                        <label>Username:</label>
                        <?php echo "<p>".$row['Username']."</p>";?>
                        <label>Name:</label>
                        <?php echo "<p>".$row['Name']."</p>";?>
                        <label>Contact number:</label>
                        <?php echo "<p>".$row['Contact_No']."</p>";?>
                        <label>E-mail:</label>
                        <?php echo "<p>".$row['Email']."</p>";?>
                        
                    </div>
                    <div class="info-right">
                        <label>Password:</label>
                        <p>********</p>
                        <label>Address:</label>
                        <?php 
                        echo "<p>".$row['Address']."<br>".$row['City']." ".$row['Postal_code']."<br>".$row['State']."</p>"; 
                        ?>
                        <br><br>
                        <a href="accountEdit.php" target="_blank" id="modify-button"><i class="material-icons">edit</i>Modify your personal information</a>
                    </div>
                </div>
            </div>

            <h2>Personal order history</h2>
            <div class="order-history-container">
                <?php 
                    include("conn.php");
                    // find number of rows in table 
                    $result = mysqli_query($con,"SELECT COUNT(*) FROM ");
                    $r = mysqli_fetch_row($result);
                    $row_num = $r[0];

                    // number of rows to show per page
                    $limit_row = 6;
                    // get total pages
                    $totalpages = ceil($row_num / $limit_row);

                    // get the current page or set a default as 1
                    if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
                    // cast var as int
                    $currentpage = (int) $_GET['currentpage'];
                    } 
                    else {
                    $currentpage = 1;
                    }

                    //set current page to last page if it is greater than total pages
                    if ($currentpage > $totalpages) {
                    $currentpage = $totalpages;
                    } 
                    //set current page to first page if it is greater than total pages
                    if ($currentpage < 1) {
                    $currentpage = 1;
                    }

                    // set the offset
                    $offset = ($currentpage - 1) * $limit_row;

                    $result = mysqli_query($con,"SELECT o.*,sp.*,s.*,p.*, c.*(sp.Quantity * p.Product_Price) AS Total 
                    FROM customerorder o, shopping_product sp, shoppingcart s, product p, customer c 
                    WHERE c.Customer_ID = s.Customer_ID, sp.Shopping_ID = s.Shopping_ID, p.Product_ID = sp.Product_ID,  o.Shopping_ID = s.Shopping_ID, c.Username='".$username."'
                    LIMIT $offset, $limit_row");
                ?>

                <?php 
                    //Show back button if it is not page 1
                    if ($currentpage > 1) {
                    $prevpage = $currentpage - 1;
                    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><i class=\"fas fa-caret-left arrow\"></i></a>";
                    }
                ?>

                <table class="order-history-table">
                    <tr>
                        <th class="date">Date</th>
                        <th class="item-name">Item name</th>
                        <th class="price">Price</th>
                        <th class="quantity">Quantity</th>
                        <th class="total">Total</th>
                    </tr>
                    <?php
                        while ($row = mysqli_fetch_array($result)) {
                            echo"<tr>
                            <td>".$row['Order_Date']."</td>
                            <td>".$row['Product_Name']."</td>
                            <td>".$row['Product_Price']."</td>
                            <td>".$row['Quantity']."</td>
                            <td>".$row['Total']."</td>
                            </tr>";
                        }
                    ?>
                </table>

                <?php
                    //show forward button if not on last page
                    if ($currentpage != $totalpages) {
                        // get next page
                        $nextpage = $currentpage + 1;
                        // forward button linked to next page
                        echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'><i class=\"fas fa-caret-right arrow\"></i></a>";
                    }
                ?>
                
            </div>
            <br><br><br><br><br><br><br><br><br><br>
        </div>

    </div>
</div>


<footer>
    <div class="footer-flexbox">
        <div class='footer-flexbox-item'>
            <h3>About Us</h3>
            <p>Les Pet Shop is always here for you and your pets. You can find yourself a companion and high quality pet product here!</p>
        </div>
        <div class='footer-flexbox-item'>
            <h3>More From Us</h3>
            <ul>
            <li><i class="fas fa-paw"></i><a href="pet.html">Pets</a></li>
            <li><i class="fas fa-paw"></i><a href="food.html">Pets Food</a></li>
            <li><i class="fas fa-paw"></i><a href="accessories.html">Pets Accessories</a></li>
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