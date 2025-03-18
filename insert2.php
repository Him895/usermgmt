<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student2";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("". $conn->connect_error);
}
$name = $_POST["name"];
$email = $_POST["email"];
$mobileno = $_POST["mobileno"];
$city = $_POST["city"];
$gender = $_POST["gender"];

$sql = "INSERT  into goku (name,email,mobileno,city,gender) VALUES ('$name','$email','$mobileno','$city','$gender')";
$result = mysqli_query($conn,$sql);

?>