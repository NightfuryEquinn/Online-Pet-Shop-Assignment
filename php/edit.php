<?php
include("adminsession.php");
session_start();
?>

<!--Same structure like addNewAdmin.html--> 
<!--Access after admin select "Edit"-->

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
        <link rel = "stylesheet" href = "../css/addNew.css">

        <!--Link to JavaScript-->
        <script src = "../console.js" defer></script>

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
        <title>Les Pet Shop - Edit Admin</title>
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
                    <button onclick="document.location='petAdmin.php'"><span><i class="fas fa-paw fa-2x"></i></span>PETS</button>
                    <button onclick="document.location='foodAdmin.php'"><span><i class="fas fa-fish fa-2x"></i></span>FOOD</button>
                    <button onclick="document.location='accessoriesAdmin.php'"><span><i class="fas fa-gift fa-2x"></i></span>ACCESSORIES</button>
                    <button onclick="document.location='userprofile.php'"><span><i class="fas fa-user-circle fa-2x"></i></span>PROFILE</button>
                    <div class="dropdown">
                        <button onclick="document.location='../loginform.html'"><span><i class="fas fa-sign-in-alt fa-2x"></i></span>LOGIN</button>
                        <div class="dropdown-content">
                            <a href="../loginform.html"><i class="fas fa-sign-in-alt">&nbsp&nbspLog In</i></a>
                            <a href="../signupform.html"><i class="fas fa-user-plus">&nbsp&nbspSign Up</i></a>
                            <a href="../adminaccess.html"><i class="fas fa-crown">&nbspAdmin Access</i></a>
                        </div>
                    </div>
                </div>

                <div class='hamburger-nbc'>
                    <button id='hamburger-bar'><i class='fa fa-bars fa-3x'></i></button>
                    <div class='hamburger-content'>
                        <button onclick="document.location='../homepage.html'"><i class="fas fa-home fa-2x"></i><br>HOME</button>
                        <button onclick="document.location='petAdmin.php'"><i class="fas fa-paw fa-2x"></i><br>PETS</button>
                        <button onclick="document.location='foodAdmin.php'"><i class="fas fa-fish fa-2x"></i><br>FOOD</button>
                        <button onclick="document.location='accessoriesAdmin.php'"><i class="fas fa-gift fa-2x"></i><br>ACCESSORIES</button>
                        <button onclick="document.location='userprofile.php'"><i class="fas fa-user-circle fa-2x"></i><br>PROFILE</button>
                        <div class="dropdown">
                            <button onclick="document.location='../loginform.html'"><i class="fas fa-sign-in-alt fa-2x"></i><br>LOGIN</button>
                            <div class="dropdown-content">
                                <a href="../loginform.html"><i class="fas fa-sign-in-alt">&nbsp&nbspLog In</i></a>
                                <a href="../signupform.html"><i class="fas fa-user-plus">&nbsp&nbspSign Up</i></a>
                                <a href="../adminaccess.html"><i class="fas fa-crown">&nbspAdmin Access</i></a>
                            </div>
                        </div>      
                    </div>
                </div>
            </div>
        </header>
        
        <!--Admin Edit Form-->
        <div class='main-container'>
            <div class='item-flex-container'>

                <?php
                    include("conn.php");
                    $editID = intval($_GET["Product_ID"]);
                    $editData = mysqli_query($con, "SELECT * FROM product WHERE Product_ID=$editID");
                    while($displayEdit = mysqli_fetch_array($editData)) {
                ?>

                <form id='addForm' action="update.php" method="post" enctype="multipart/form-data">
                    <h1>WHAT DO YOU WANT TO ADD?</h1>

                    <input type="hidden" name="id" value="<?php echo $displayEdit['Product_ID']?>">
                    
                    <div class='radio-container'>
                        <input value='pet' type="radio" name="adding" 

                        <?php if ($displayEdit['Product_Category'] == 'pet'){ ?> 
                        checked="checked"    
                        <?php } ?>>

                        <label>PETS</label>

                        <input value='food' type="radio" name="adding"

                        <?php if ($displayEdit['Product_Category'] == 'food'){ ?> 
                        checked="checked"    
                        <?php } ?>>

                        <label>FOOD</label>
                        
                        <input value='accessory' type="radio" name="adding"

                        <?php if ($displayEdit['Product_Category'] == 'accessory'){ ?> 
                        checked="checked"    
                        <?php } ?>>

                        <label>ITEMS/FASHION</label>
                    </div>

                    <div class="addnew">
                        <label>Display Image: </label><input type="file" name="image" accept="image/*" required>
                        <hr>
                        <label>Name: </label><input type='text' name='name' value="<?php echo $displayEdit['Product_Name']?>" required>
                        <hr>
                        <label>Description: </label><textarea name="description" rows="10" cols="10" value="<?php echo $displayEdit['Product_Description']?>" required></textarea>
                        <hr>
                        <label>Price Tag: </label><input type="number" name="price" min="0" value="<?php echo $displayEdit['Product_Price']?>" required>
                        <hr>
                        <label>Quantity / Available Stock: </label><input type="number" name="stock" min="0" value="<?php echo $displayEdit['Product_Stock']?>" required>
                        <hr>
                        <div class="button-container">
                            <button id='submit' type="submit">UPDATE</button>
                            <button id='reset' type="reset">RESET</button>
                        </div>
                    </div>
                </form>

                <?php
                    }
                    mysqli_close($con);
                ?>

            </div>
        </div>
    </body>
</html>