<?php
include("conn.php");

$petid = intval($_POST['Pet_ID']);
$foodid = intval($_POST['Food_ID']);
$accessoryid = intval($_POST['Accessory_ID']);
$result = "";

if ($petid != NULL) {
    $result = mysqli_query($con, "SELECT * FROM pet WHERE Pet_ID=$petid");
} elseif ($foodid != NULL) {
    $result = mysqli_query($con, "SELECT * FROM petfood WHERE Food_ID=$foodid");
} elseif ($accessoryid != NULL) {
    $result = mysqli_query($con, "SELECT * FROM accessory WHERE Accessory_ID=$accessoryid");
} else {
    echo "<script>
    alert ('Error when retrieving data from database. Redirecting to Homepage.');
    window.location.href = '../homepage.html';
    </script>";
};

while ($row = mysqli_fetch_array($result)) {
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
        <link rel = "stylesheet" href = "css/addNew.css">

        <!--Link to JavaScript-->
        <script src = "console.js" defer></script>

        <!--Link to Font Awesome v4 and v5-->
        <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <link rel = "stylesheet" href = "https://use.fontawesome.com/releases/v5.15.4/css/v4-shims.css">

        <!--Link to Google Font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Rubik:wght@300&display=swap" rel="stylesheet">
        
        <!--Link to Pictures file-->
        <link rel = "icon" type = image/png href = art/logo.png>

        <!--Title-->
        <title>Les Pet Shop - Admin</title>
    </head>
    <body>
        <!--Back to Top Button-->
        <button id='back2top-btn' onclick='scroll2Top()' title='Purr back 2 top!~'><i class="fas fa-arrow-alt-circle-up fa-4x"></i></button>

        <!--Navigation Bar & Hamburger-->
        <header>
            <div class='nav-bar'>
                <img class='logo' src='art/logo.png'>

                <div class='name'>Les   Pet   Shop</div>

                <div class='nav-btn-container'>
                    <button onclick="document.location='homepage.html'"><span><i class="fas fa-home fa-2x"></i></span>HOME</button>
                    <button onclick="document.location='pet.html'"><span><i class="fas fa-paw fa-2x"></i></span>PETS</button>
                    <button onclick="document.location='food.html'"><span><i class="fas fa-fish fa-2x"></i></span>FOOD</button>
                    <button onclick="document.location='accessories.html'"><span><i class="fas fa-gift fa-2x"></i></span>ACCESSORIES</button>
                    <button onclick="document.location='userprofile.html'"><span><i class="fas fa-user-circle fa-2x"></i></span>PROFILE</button>
                    <button onclick="document.location='login.html'"><span><i class="fas fa-sign-in-alt fa-2x"></i></span>LOGIN</button>
                </div>

                <div class='hamburger-nbc'>
                    <button id='hamburger-bar'><i class='fa fa-bars fa-3x'></i></button>
                    <div class='hamburger-content'>
                        <button onclick="document.location='homepage.html'"><i class="fas fa-home fa-2x"></i><br>HOME</button>
                        <button onclick="document.location='pet.html'"><i class="fas fa-paw fa-2x"></i><br>PETS</button>
                        <button onclick="document.location='food.html'"><i class="fas fa-fish fa-2x"></i><br>FOOD</button>
                        <button onclick="document.location='accessories.html'"><i class="fas fa-gift fa-2x"></i><br>ACCESSORIES</button>
                        <button onclick="document.location='userprofile.html'"><i class="fas fa-user-circle fa-2x"></i><br>PROFILE</button>
                        <button onclick="document.location='login.html'"><i class="fas fa-sign-in-alt fa-2x"></i><br>LOGIN</button>
                    </div>
                </div>
            </div>
        </header>
        
        <!--Admin Edit Form-->
        <div class='main-container'>
            <div class='item-flex-container'>
                <form id='addForm' action="php/update.php" method="post" enctype="multipart/form-data">
                    <h1>WHAT DO YOU WANT TO ADD?</h1>

                    <div class="addnew">
                        <input type='hidden' name='id' value='<?php echo $row[0]?>'>
                        <label>Display Image: </label><input type="file" name="image" accept="image/*" required>
                        <hr>
                        <label>Name: </label><input type='text' name='name' value="<?php echo $row[1] ?>" required>
                        <hr>
                        <label>Description: </label><textarea name="description" value="<?php echo $row[3] ?>" rows="10" cols="10" required></textarea>
                        <hr>
                        <label>Price Tag: </label><input type="number" name="price" value="<?php echo $row[2] ?>" min="0" required>
                        <hr>
                        <div class="button-container">
                            <button id='submit' type="submit" name="editBtn">EDIT</button>
                            <button id='reset' type="reset">RESET</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
}

$updateNAME = $_POST['name'];
$updatePRICE = $_POST['price'];
$updateDES = $_POST['description'];
$updateIMG = file_get_contents($_FILES['image']['tmp_name']);

if (isset($_POST['editBtn'])) {
    if ($petid != NULL) {
        $update = "UPDATE pet SET Pet_Name='$updateNAME', Pet_Price='$updatePRICE', Pet_Description='$updateDES', Image_Source='$updateIMG' WHERE Pet_ID='$petid'";
        if (mysqli_query($con, $update)) {
            echo "<script> alert ('Data edited!');
            window.location.href= 'homepage.html';
            </script>";
        }

    } elseif ($foodid != NULL) {
        $update = "UPDATE food SET Food_Brand='$updateNAME', Food_Price='$updatePRICE', Food_Description='$updateDES', Image_Source='$updateIMG' WHERE Food_ID='$foodid'";
        if (mysqli_query($con, $update)) {
            echo "<script> alert ('Data edited!');
            window.location.href= 'homepage.html';
            </script>";
        }
    } elseif ($accessoryid != NULL) {
        $update = "UPDATE accessory SET Accessory_Name='$updateNAME', Accessory_Price='$updatePRICE', Accessory_Description='$updateDES', Image_Source='$updateIMG' WHERE Accessory_ID='$accessoryid'";
        if (mysqli_query($con, $update)) {
            echo "<script> alert ('Data edited!');
            window.location.href= 'homepage.html';
            </script>";
        }
    } else {
        echo "<script> alert ('Error occured while updating.');
        window.location.href= 'homepage.html';
        </script>";
    };
};

mysqli_close($con);
?>