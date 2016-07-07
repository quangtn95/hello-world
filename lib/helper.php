<?php
    session_start();
	require_once("connection.php");

	function show_error($error, $key){
	    echo '<span style="color: red">'.(empty($error[$key]) ? "" : $error[$key]). '</span>';
	}

	$error = array();
    //Kiểm tra người dùng đã ấn nút submit hay chưa
    if(isset($_POST['submit'])){
        //Lấy thông tin người dùng
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) && empty($password)){
            $error['message'] = 'Bạn chưa nhập Username và Password <div><br/></div>';
        }

        elseif (empty($username)){
            $error['username'] = '<div><br/></div>Bạn chưa nhập Username';
        }

        elseif(empty($password)){
            $error['password'] = '<div><br/></div>Bạn chưa nhập Password';
        }

        else{
            $sql = "select * from users where username = :username and password = :password";

         	$pre = $conn -> prepare($sql);
            $pre->bindParam(':username', $username, PDO::PARAM_STR);
            $pre->bindParam(':password', $password, PDO::PARAM_STR);
        	$pre -> execute();

            $row = $pre->fetch(PDO::FETCH_NUM);

            if($row == 0)
            {
                $error['message'] =  "Username và Password không đúng <div><br/></div>";
            }else{
                $pre -> execute();
                $data = $pre->fetch(PDO::FETCH_ASSOC);
                if(($data['role'])==2){
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    header('Location:admin/dep/listDep.php');
                }else{
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    header('Location:member/dep/listDep.php');
                }
            }
             
        }

    }
?>