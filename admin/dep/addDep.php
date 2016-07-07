
<?php
include_once("../../lib/connection.php");
$name = $_POST['txtname'];
$cell = $_POST['txtcell'];
$email = $_POST['txtemail'];
$mng = $_POST['txtmng'];

$sql = "INSERT INTO departments(dep_name, office_num, email, manager) VALUES (:name, :cell, :email, :mng)";

$pre = $conn->prepare($sql);
$pre->bindParam(':name', $name, PDO::PARAM_STR);
$pre->bindParam(':cell', $cell, PDO::PARAM_STR);
$pre->bindParam(':email', $email, PDO::PARAM_STR);
$pre->bindParam(':mng', $mng, PDO::PARAM_STR);
$pre->execute();
header('Location:listDep2.php');
?>