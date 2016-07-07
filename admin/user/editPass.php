
<?php
include_once("../../lib/connection.php");
$username = $_POST['txtusername'];
$passnew = $_POST['txtpassnew'];

$sql = "UPDATE users SET password = :passnew where username = :username";

$pre = $conn->prepare($sql);
$pre->bindParam(':username', $username, PDO::PARAM_STR);
$pre->bindParam(':passnew', $passnew, PDO::PARAM_STR);
$pre->execute();

header('Location:listUser.php');
?>