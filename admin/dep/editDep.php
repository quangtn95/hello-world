<?php
	require_once'../../lib/connection.php';
	$id = $_POST['txtid'];
	$name = $_POST['txtname'];
	$cell = $_POST['txtcell'];
	$email = $_POST['txtemail'];
	$mng = $_POST['txtmng'];

	$sql = 'update departments set dep_name = :name , office_num=:cell , email=:email , manager=:mng where id = :id';

	$pre = $conn->prepare($sql);
	$pre->bindParam(':id', $id, PDO::PARAM_INT);
	$pre->bindParam(':name', $name, PDO::PARAM_STR);
	$pre->bindParam(':cell', $cell, PDO::PARAM_STR);
	$pre->bindParam(':email', $email, PDO::PARAM_STR);
	$pre->bindParam(':mng', $mng, PDO::PARAM_STR);
	$pre->execute();
	header('Location: listDep.php');
?>