<?php
session_start();
include("connection17.php");
$nameerror = $passworderror = "";
$name = $password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['name'])){
        $nameerror = "Name is required";
    } else  if (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
        $nameerror = "Please enter only alphabet";
    }
    if(empty($_POST['password'])){
        $passworderror = "Please enter your password";
    }
    if(!empty($_POST['name']) && !empty($_POST['password']));
        $name = $_POST['name'];
        $password = $_POST['password'];

        $sql = "SELECT name,password FROM dollar WHERE name = '$name'AND password = '$password'";
        $result = mysqli_query($conn, $sql);
     if ($result->num_rows > 0) {
        
        $_SESSION['name'] = $name; 
        header("Location: profile2.php");
        exit();
     }else{
      echo  $loginerror = "invalid user id";
        
     }
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box1{
            margin: 10% 32%;
           width:30% ;
          background-color:silver ;
          padding: 20px 50px;
          border-radius: 15px;
        
        }
        h1{
            margin-bottom: 30px;
        }
        .box3{
            height: 20px;
            width: 150px;
            border: 1px solid black;
            background-color: #f0f0f0;
            text-align: center;
        }
        a{
            text-decoration: none;
            color: black;
           padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="box1">
    <form action="" method="post">
        <h1>Login form</h1>
        <div class="box2">
        <label>Name</label>
        <input type="text" name="name" placeholder="please enter your name">
        <br><br>

        <label for="">Password</label>
        <input type="text" name="password" placeholder="please enter your password">
        <br><br>

        <input type="submit">
        </div>
        <br>
        <div class="box3">
            <a href="forget2.php">Forget password</a>
        </div>
    </form>
    </div>
</body>
</html>