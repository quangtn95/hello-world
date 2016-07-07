<?php
	include_once('../../lib/connection.php');
	
	$id = $_GET['id'];
	
	$sql = "DELETE FROM employees WHERE id = :id";
	$pre = $conn->prepare($sql);
	$pre->bindParam(':id', $id, PDO::PARAM_INT);   
	$pre->execute();
	
	header('Location: listEmp.php');
?>