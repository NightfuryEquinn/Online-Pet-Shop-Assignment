<html>
<head>
    <!--Link to Pictures file-->
    <link rel = "icon" type = image/png href = "../art/logo.png">

    <!--Title-->
    <title>Les Pet Shop</title>

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c8bccee41a.js" crossorigin="anonymous"></script>
    <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.15.4/css/v4-shims.css">

    <!--Add font library-->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Rubik:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--link css-->
    <link href="../css/profile.css" rel="stylesheet">

    <!--Add JS script-->
    <script src="../console.js"></script>

</head>
<body style="background-color: #eee2dcc7;margin:10px 50px;">
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
        <h1>Manage Account</h1>
        <hr>
        <?php
            include("conn.php");
            //include("session.php");
            //$username= $_SESSION['mySession'];
            $username="Box";
            $result = mysqli_query($con,"SELECT * FROM customer WHERE Username='Box'");
            while($row = mysqli_fetch_array($result))
            {
        ?>
        <div class="manage-account">
            <div class="tab-container">
                <div class="change-pfp">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Profile_pic']).'" id ="account-profile-picture"/>';?>
                    <p><i class="material-icons">edit</i>Change profile picture</p>
                    <div class="dropdown-pfp">
                        <a href="update_personal_info.php?pfp1=true"><img src="../art/profile_cat.png" alt="cat profile picture"></a>
                        <a href="update_personal_info.php?pfp2=true"><img src="../art/profile_dog.jpg" alt="dog profile picture"></a>
                    </div>
                </div>
                <div class="tab active" id="tab1" onclick="opentab(1)">Account Information</div>
                <div class="tab" id="tab2" onclick="opentab(2)">Account Security</div>
            </div>

            <form class="content" style="background-image: url('../art/white_texture.png')" id="personal-info-form" action="update_personal_info.php" method="post"onsubmit="modify_details()">
                <div class="form-left">
                    <h2>Modify Account Information</h2>
                    <h3>Personal details</h3>
                    <div>Username:</div>
                    <input type="text" name="user_username" required="required" value="<?php echo $row['Username']?>">
                    <div>Name:</div>
                    <input type="text" name="user_name" required="required" value="<?php echo $row['Name']?>">
                    <div>Contact number:</div>
                    <input type="text" name="user_contact_number" required="required" pattern="[0][1][0-9]-[0-9]{4}[0-9]{4}|[0][1][0-9]-[0-9]{3}[0-9]{4}" value="<?php echo $row['Contact_No']?>">
                    <div>E-mail:</div>
                    <input type="email" name="user_email" required="required" value="<?php echo $row['Email']?>">
                </div>
                <div class="form-right">
                    <h2>&nbsp</h2>
                    <h3>Delivery Address</h3>
                    <div>Address:</div>
                    <input type="text" name="user_address" required="required" value="<?php echo $row['Address']?>">
                    <div>City:</div>
                    <input type="text" name="user_city" required="required" value="<?php echo $row['City']?>">
                    <div>Postal code:</div>
                    <input type="text" name="user_postcode" required="required" value="<?php echo $row['Postal_code']?>">
                    <div>State:</div>
                    <Select name="user_state">
                        <option value="Johor" <?php if ($row['State'] == "Johor") { ?>
                                                selected="selected"
                                            <?php } ?>>Johor</option>
                        <option value="Kedah" <?php if ($row['State'] == "Kedah") { ?>
                                                selected="selected"
                                            <?php } ?>>Kedah</option>
                        <option value="Kelantan" <?php if ($row['State'] == "Kelantan") { ?>
                                                selected="selected"
                                            <?php } ?>>Kelantan</option>
                        <option value="Melacca" <?php if ($row['State'] == "Melacca") { ?>
                                                selected="selected"
                                            <?php } ?>>Melacca</option>
                        <option value="Negeri Sembilan" <?php if ($row['State'] == "Negeri Sembilan") { ?>
                                                selected="selected"
                                            <?php } ?>>Negeri Sembilan</option>
                        <option value="Pahang" <?php if ($row['State'] == "Pahang") { ?>
                                                selected="selected"
                                            <?php } ?>>Pahang</option>
                        <option value="Penang" <?php if ($row['State'] == "Penang") { ?>
                                                selected="selected"
                                            <?php } ?>>Penang</option>
                        <option value="Perak" <?php if ($row['State'] == "Perak") { ?>
                                                selected="selected"
                                            <?php } ?>>Perak</option>
                        <option value="Perlis" <?php if ($row['State'] == "Perlis") { ?>
                                                selected="selected"
                                            <?php } ?>>Perlis</option>
                        <option value="Sabah" <?php if ($row['State'] == "Sabah") { ?>
                                                selected="selected"
                                            <?php } ?>>Sabah</option>
                        <option value="Sarawak" <?php if ($row['State'] == "Sarawak") { ?>
                                                selected="selected"
                                            <?php } ?>>Sarawak</option>
                        <option value="Selangor" <?php if ($row['State'] == "Selangor") { ?>
                                                selected="selected"
                                            <?php } ?>>Selangor</option>
                        <option value="Terengganu" <?php if ($row['State'] == "Terengganu") { ?>
                                                selected="selected"
                                            <?php } ?>>Terengganu</option>
                        <option value="Kuala Lumpur" <?php if ($row['State'] == "Kuala Lumpur") { ?>
                                                selected="selected"
                                            <?php } ?>>Kuala Lumpur</option>
                        <option value="Labuan" <?php if ($row['State'] == "Labuan") { ?>
                                                selected="selected"
                                            <?php } ?>>Labuan</option>
                        <option value="Putrajaya" <?php if ($row['State'] == "Putrajaya") { ?>
                                                selected="selected"
                                            <?php } ?>>Putrajaya</option>
                    </Select>
                    <br><br>
                    <div><input type="submit" value="submit" name="submit"></div>
                </div>  
            </form>
            
            <form class="content" style="background-image: url('../art/white_texture.png')" id="change-password-form" action="update_password.php" method="post" onsubmit="password_change()">
                    <h2>Change account password</h2><br><br>
                    <div>Current password:</div>
                    <input type="password" name="user_currentpassword" required="required">
                    <div>New password:</div>
                    <input type="password" name="user_newpassword" required="required">
                    <div>Confirm your password again:</div>
                    <input type="password" name="user_confirmpassword" required="required">
                    <br><br><br><br>
                    <div><input type="submit" value="submit" name="submit"></div>
            </form>
            <?php
                }
                mysqli_close($con);
            ?>
        </div>
        <br><br>

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
</html>
