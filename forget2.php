<?php
session_start();
include("connection17.php");

$emailerror = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $forget = $_POST['email'];

    // Validate email input
    if (empty($_POST["otp"])) {
        $emailerror = "Email is required";
    } else if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/", $_POST['email'])) {
        $emailerror = "Please enter a valid email";
    }

    if(!empty($_POST['submit'])){
        $email = $_POST["email"];
        $sql = "SELECT * FROM dollar WHERE email = '$forget'";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0){
            // Generate OTP
            $otp = rand(1000, 9999);
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;

            // Redirect to reset password page
            header("location: reset2.php");
            exit(); // Add exit to stop further execution
        } else {
            echo "Email not found";
        }
    } 
    if(!empty($_POST['link'])){
        $email = $_POST["email"];
        $sql = "SELECT * FROM dollar where email = '$email'";
        $result = mysqli_query($conn, $sql);
    
        if($result->num_rows > 0){
            
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $username = $row['name'];
                
            }
            $link = "http://localhost/demo/formpractice/loginsession2.php" .$username;
            $_SESSION['link'] = $link;
            $_SESSION['email'] = $email;
            echo "<a href='resetlink.php'>".$link."</a>";
    
            
    
          
        }
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
        <label >email</label>
        <input type="text" name="email" placeholder="enter email">

        <input type="submit" name="otp" value="get_otp">
        <input type="submit" name="link" value="get_link">
    </form>
</body>
</html>