<?php
session_start();

include 'connection17.php';

$otpinsert = $_SESSION['otp'];

echo "otp : $otpinsert ";

if(isset($_POST['submit'])){
    $newpassword = $_POST['newpassword'];
    $confirmpassword = $_POST['confirmpassword'];
    $otp = $_POST['otp'];

    if($otp == $_SESSION['otp']){
        if($newpassword == $confirmpassword){
             $email = $_SESSION['email'];
             $query = "UPDATE dollar SET password = '$newpassword' WHERE email = '$email'";
             $data = mysqli_query($conn, $query);
 
             if($data == true){
                 echo "Password reset successfully";
                 header("location: loginsession2.php");
                 exit();
             } else {
                 echo "Failed to reset password. Please try again.";
             }
         } else {
             echo "Passwords do not match!";
         }
     } else {
         echo "Invalid OTP!";
     }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label >OTP</label>
        <input type="text" name="otp" placeholder="Enter your otp">

        <label>New password</label>
        <input type="password" name="newpassword" placeholder="Enter your new password">

        <label>Confirm password</label>
        <input type="password" name="confirmpassword" placeholder="Enter your new password">

        <input type="submit" name="submit" value="reset password">
    </form>
</body>
</html>