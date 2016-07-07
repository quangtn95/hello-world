
<?php
include_once("../../lib/connection.php");
$username = $_POST['txtusername'];
$name = $_POST['txtname'];
$pass = $_POST['txtpass'];
$email = $_POST['txtemail'];
$role = $_POST['txtrole'];

$sql = "INSERT INTO users (username, password, name, email, role) VALUES (:username, :pass, :name, :email, :role)";

$pre = $conn->prepare($sql);
$pre->bindParam(':username', $username, PDO::PARAM_STR);
$pre->bindParam(':pass', $pass, PDO::PARAM_STR);
$pre->bindParam(':name', $name, PDO::PARAM_STR);
$pre->bindParam(':email', $email, PDO::PARAM_STR);
$pre->bindParam(':role', $role, PDO::PARAM_STR);
$pre->execute();

header('Location:listUser.php');
?>