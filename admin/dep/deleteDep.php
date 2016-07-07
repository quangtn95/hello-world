<?php
	include_once('../../lib/connection.php');
	
	$id = $_GET['id'];
	
	$sql = "DELETE FROM departments WHERE id = :id";
	$pre = $conn->prepare($sql);
	$pre->bindParam(':id', $id, PDO::PARAM_INT);   
	$pre->execute();

	$sql2 = "SELECT * FROM departments WHERE id = :id";
	$pre2 = $conn->prepare($sql2);
	$pre2->bindParam(':id', $id, PDO::PARAM_INT);   
	$pre2->execute();
	$data2 = $pre2->fetch(PDO::FETCH_ASSOC);

	$name = $data2['dep_name'];

	$sql3 = "DELETE FROM employees WHERE dep_name = '$name'";
	$pre3 = $conn->prepare($sql3);
	$pre3->bindParam(':id', $id, PDO::PARAM_INT);   
	$pre3->execute();
	
	header('Location: listDep.php');
?>