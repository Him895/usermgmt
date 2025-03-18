<?php
session_start();
include 'connection17.php';
//check session submit have value or not//
if(!isset($_SESSION['name'])){
    header("location:loginsession2.php");
    exit();
}
//retrive user data from the database//
$name = $_SESSION['name'];

$sql = "SELECT * FROM dollar WHERE name= '$name'";
$result = mysqli_query($conn, $sql);
 
if($result && mysqli_num_rows($result) > 0){
  $user = mysqli_fetch_assoc($result);
  $name = $user['name'];
  $email = $user['email'];
  $gender = $user['gender'];
}else{
  echo "user not found";
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
<p>name : <?php echo $name ?></p>
<p>email : <?php echo $email ?></p>
<p>gender : <?php echo $gender ?></p>

<a href="logout2.php">logout</a>
    
</body>
</html>