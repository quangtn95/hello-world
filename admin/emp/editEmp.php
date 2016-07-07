<?php
	include_once("../../lib/connection.php");
	$id = $_POST['txtid'];
	$name = $_POST['txtname'];
	$sex = $_POST['txtsex'];
	$bday = $_POST['txtdate'];
	$address = $_POST['txtaddress'];
	$anh = $_FILES['hinh']['name'];
	$job_title = $_POST['txtjob'];
	$cellphone = $_POST['txtcell'];
	$email = $_POST['txtemail'];
	$dep_name = $_POST['txtdep'];

	$folder = "../../upload/";
	$file = basename($anh);
	$full_path = $folder.$file;

	if(move_uploaded_file($_FILES['hinh']['tmp_name'], $full_path)==true)
	{
		$sql = "UPDATE employees SET name =:name, sex=:sex, birthday=:bday, address=:address, image=:hinh, job_title=:job_title, cellphone=:cellphone, email=:email, dep_name=:dep_name where id = :id";

		$pre = $conn->prepare($sql);
		$pre->bindParam(':id', $id, PDO::PARAM_INT);
		$pre->bindParam(':name', $name, PDO::PARAM_STR);
		$pre->bindParam(':sex', $sex, PDO::PARAM_STR);
		$pre->bindParam(':bday', $bday, PDO::PARAM_STR);
		$pre->bindParam(':address', $address, PDO::PARAM_STR);
		$pre->bindParam(':hinh', $full_path);
		$pre->bindParam(':job_title', $job_title, PDO::PARAM_STR);
		$pre->bindParam(':cellphone', $cellphone, PDO::PARAM_STR);
		$pre->bindParam(':email', $email, PDO::PARAM_STR);
		$pre->bindParam(':dep_name', $dep_name, PDO::PARAM_STR);
		$pre->execute();
	}

		header('Location:listEmp.php');
?>