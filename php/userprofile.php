<?php
include("session.php");
$customer_id = intval($_SESSION['Customer_ID']);
?>

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

        <!--Link to Pictures file-->
        <link rel = "icon" type = image/png href = ../art/logo.png>

        <!--Title-->
        <title>Les Pet Shop - Profile</title>

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

    <body style="background:url('../art/profile_background.jpg') no-repeat center center; background-size: cover;">
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

        <div class="body-container">
            <div class="profile">
                <h1>Profile</h1>
                <hr>
                <div class="profile-top" style="background-image: url('../art/profile_cover.jpg')">
                     <img src="../art/profile_cat" alt="profile picture" id ="profile-picture">
                     <?php include("conn.php");
                        $result = mysqli_query($con,"SELECT * FROM customer WHERE Customer_ID=$customer_id");
                        $row = mysqli_fetch_array($result);
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
                                <?php if ($row['Contact_No']=='NULL'){
                                    echo "<br><br>";
                                    }
                                else{
                                    echo "<p>".$row['Contact_No']."</p>";
                                }?>
                                <label>E-mail:</label>
                                <?php echo "<p>".$row['Email']."</p>";?>
                                
                            </div>
                            <div class="info-right">
                                <label>Password:</label>
                                <p>********</p>
                                <label>Address:</label>
                                <?php if ($row['Address']=='NULL'){
                                    echo "<br><br><br>";
                                    ;}
                                else{
                                    echo "<p>".$row['Address']."<br>".$row['City']." ".$row['Postal_code']."<br>".$row['State']."</p>";
                                }?>
                                <br><br>
                                <a href="accountEdit.php" target="_blank" id="modify-button"><i class="material-icons">edit</i>Modify your personal information</a>
                            </div>
                        </div>
                    </div>
                    <h2>Shopping Cart</h2>
                    <div class="cart-container"> 
                        <?php 
                            include("conn.php");
                            // find number of rows in table 
                            $result = mysqli_query($con,"SELECT *, sp.Shopping_ID AS \"Cart_ID\", sp.Product_ID AS \"Item_ID\", (sp.Quantity*p.Product_Price) AS \"Total\"
                            FROM shoppingcart s, shopping_product sp, product p
                            WHERE s.Shopping_ID = sp.Shopping_ID AND p.Product_ID = sp.Product_ID AND s.Customer_ID=$customer_id AND s.Status='unpaid'
                            GROUP BY sp.Product_ID");     
                        ?>
                        <table class="cart-table">
                            <tr>
                                <th class="cart-header">Item Name</th>
                                <th class="cart-header">Price</th>
                                <th class="cart-header">Quantity</th>
                                <th class="cart-header">Total</th>
                            </tr>

                            
                            <?php
                                $checkout_price = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    echo"<form id='quantity-form' method='post' action='updatecart.php?Product_ID=".$row['Item_ID']."'>";
                                    echo"<tr>
                                    <td>".$row['Product_Name']."</td>
                                    <td>RM ".$row['Product_Price']."</td>
                                    <input type='hidden' name='sid' value=".$row['Cart_ID'].">
                                    <input type='hidden' name='pid' value=".$row['Item_ID'].">
                                    <td><input type='number' id='update-qty' name='update-qty' required='required' value=".$row['Quantity']."></td>
                                    <td>RM ".$row['Total']."</td>
                                    <td><input type='submit' name='Update' value='Update' id='small-button' form='quantity-form'/></td>
                                    </tr>";
                                    echo"</form>";
                                    $checkout_price = $checkout_price + $row['Total'];
                                }
                                //reserve an empty row
                                echo
                                "<tr style='color:#E85A4F;'>
                                <td>Happy</td>
                                <td>Pet</td>
                                <td>Shopping</td>
                                <td>!!</td>
                                </tr>";
                            ?>
                            
                        </table>
                        <div class="cart-bottom">
                            <hr>
                            <p>Total: RM <?php echo $checkout_price ?></p>
                            <button onclick="document.location = '../payment.html';" class="cart-button">Checkout</button>
                            <button onclick="document.location = 'resetcart.php';" class="cart-button">Clear</button>
                        </div>
                    </div>

                    <h2>Personal order history</h2>
                    <div class="order-history-container">
                        <?php 
                            include("conn.php");
                            // find number of rows in table 
                            $result = mysqli_query($con,"SELECT COUNT(*) FROM shoppingcart WHERE Status = 'paid' AND Customer_ID = $customer_id");

                            $r = mysqli_fetch_row($result);
                            $row_num = $r[0];

                            // number of rows to show per page
                            $limit_row = 6;
                            // get total pages
                            $totalpages = ceil($row_num / $limit_row);

                            // get the current page or set a default as 1
                            if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
                            // make currentpage var as integer
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
                        

                            $result = mysqli_query($con,"SELECT sp.*, s.*, p.*, (sp.Quantity * p.Product_Price) AS \"Total\"
                            FROM shopping_product sp, shoppingcart s, product p
                            WHERE sp.Shopping_ID = s.Shopping_ID AND p.Product_ID = sp.Product_ID AND s.Customer_ID=$customer_id AND s.Status= 'paid'
                            GROUP BY sp.Product_ID
                            LIMIT $offset, $limit_row");

                            //Show back button if it is not page 1
                            if ($currentpage > 1) {
                            $prevpage = $currentpage - 1;
                            echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><i class=\"fas fa-caret-left arrow\"></i></a>";
                            }
                            
                            //table
                            echo'<table class="order-history-table">
                                <tr>
                                    <th class="date">Date</th>
                                    <th class="item-name">Item name</th>
                                    <th class="price">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                </tr>';


                            while ($row = mysqli_fetch_array($result)) {
                                echo
                                "<tr>
                                <td>".$row['Checkout_date']."</td>
                                <td>".$row['Product_Name']."</td>
                                <td>RM ".$row['Product_Price']."</td>
                                <td>".$row['Quantity']."</td>
                                <td>".$row['Total']."</td>
                                </tr>";
                            }

                            //reserve an empty row
                            echo
                            "<tr style='color:#E85A4F;>
                            <td>Happy</td>
                            <td>Pet</td>
                            <td>Shopping</td>
                            <td>!!</td>
                            <td>:)</td>
                            </tr>";

                            //show forward button if not on last page
                            if ($currentpage != $totalpages) {
                                // get next page
                                $nextpage = $currentpage + 1;
                                // forward button linked to next page
                                echo "<a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'><i class=\"fas fa-caret-right arrow\"></i></a>";
                            }                
                    ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>