<?php
include("adminsession.php");
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
        <title>Les Pet Shop - Add New Admin</title>
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
                    <button onclick="document.location='adminhomepage.php'"><span><i class="fas fa-home fa-2x"></i></span>HOME</button>
                    <button onclick="document.location='petAdmin.php'"><span><i class="fas fa-paw fa-2x"></i></span>PETS</button>
                    <button onclick="document.location='foodAdmin.php'"><span><i class="fas fa-fish fa-2x"></i></span>FOOD</button>
                    <button onclick="document.location='accessoriesAdmin.php'"><span><i class="fas fa-gift fa-2x"></i></span>ACCESSORIES</button>
                    <button onclick="document.location='logout.php'"><span><i class="fas fa-sign-out-alt fa-2x"></i></span>LOGOUT</button> 
                </div>
            </div>
        </header>
         
        <!--Admin Edit Form-->
        <div class='main-container'>
            <div class='item-flex-container'>
                <form id='addForm' action="addNewAdmin.php" method="post" enctype="multipart/form-data">
                    <h1>WHAT DO YOU WANT TO ADD?</h1>

                    <div class='radio-container'>
                        <input value='pet' type="radio" name="adding"><label>NEW PETS!</label>
                        <input value='food' type="radio" name="adding"><label>NEW FOOD!</label>
                        <input value='accessory' type="radio" name="adding"><label>NEW ITEMS/FASHION!</label>
                    </div>

                    <div class="addnew">
                        <label>Display Image: </label><input type="file" name="image" accept="image/*" required>
                        <hr>
                        <label>Name: </label><input type='text' name='name' required>
                        <hr>
                        <label>Description: </label><textarea name="description" rows="10" cols="10" required></textarea>
                        <hr>
                        <label>Price Tag: </label><input type="number" name="price" min="0" required>
                        <hr>
                        <label>Quantity / Available Stock: </label><input type="number" name="stock" min="0" required>
                        <hr>
                        <div class="button-container">
                            <button id='submit' type="submit">NEW STUFF OUT!!!</button>
                            <button id='reset' type="reset">RESET</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>