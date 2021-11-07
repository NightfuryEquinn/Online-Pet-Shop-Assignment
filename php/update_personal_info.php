<?php
$username = $_SESSION['mySession'];

include("conn.php");
$sql = "UPDATE customer SET 
Username='$_POST[user_username]', 
Name='$_POST[user_name]', 
Contact_No='$_POST[user_contact_number]', 
Email='$_POST[user_email]', 
Address='$_POST[user_address]', 
City='$_POST[user_city]', 
Postal_code='$_POST[user_postcode]' 
State='$_POST[user_state]' 

WHERE Username=$username";

//Function to update selected profile picture
function update_profile_pic($img){
    $image = file_get_contents($img);
    $sql="UPDATE customer SET
    Profile_pic=?
    WHERE Username='".$username."'";
    $stmt = mysqli_prepare($con,$sql);
    mysqli_stmt_bind_param($stmt,"s",$image);
    mysqli_stmt_execute($stmt);
    $check = mysqli_stmt_affected_rows($stmt);
    if($check == 1){
        echo 'Successfully Uploaded';
    } 
    else {
        echo 'Could not upload';
    }
}

//Call update profile picture function
if (isset($_GET['pfp1'])){
    update_profile_pic("../art/profile_cat.png");
}
if (isset($_GET['pfp2'])){
    update_profile_pic("../art/profile_dog.jpg");
}

if (mysqli_query($con, $sql)) {
mysqli_close($con);
echo"<script>alert(\"Changes are made successfully.\")
windows.location.href=\"userprofile.php\"</script>";
}?>