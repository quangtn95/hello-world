<?php
    session_start();
    //tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
    //nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
    if (!isset($_SESSION['username'])) {
        header('Location: ../../index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Detail of Department</title>

    <link rel="Shortcut Icon" href="../../images/nguoi.jpg"/>
    <link href="../../cj/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../cj/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="../../cj/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../cj/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../../cj/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../cj/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../cj/style.css">
    
</head>
<body>
    <?php
        
        require_once("../../lib/connection.php");
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $conn->query("set names utf8");
        
        $id = $_GET['id'];
        $query = "select * from departments where id = ".$id;

        $pre = $conn -> prepare($query);
        $pre -> execute();
        
    ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Web Application</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['username']; ?><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../user/formEditPass.php"><i class="fa fa-gear fa-fw"></i> Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="../../index.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Department<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="listDep.php">List Department</a>
                                </li>
                                <li>
                                    <a href="formAddDep.php">Add Department</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Employee<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../emp/listEmp.php">List Employee</a>
                                </li>
                                <li>
                                    <a href="../emp/formAddEmp.php">Add Employee</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../user/listUser.php">List User</a>
                                </li>
                                <li>
                                    <a href="../user/formAddUser.php">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <table class="table table-striped table-hover">
                        <caption></caption>
                        
                        <tbody>
                            <?php
                                while ($data = $pre->fetch(PDO::FETCH_ASSOC)){
                            ?>

                            <tr>
                                <td class = "title">Name</td>
                                <td><?php echo ucwords($data['dep_name']) ?></td>
                            </tr>

                            <tr>
                                <td class = "title">Office Number</td>
                                <td><?php echo $data['office_num'] ?></td>
                            </tr>

                            <tr>
                                <td class = "title">Email</td>
                                <td><?php echo $data['email'] ?></td>
                            </tr>

                            <tr>
                                <td class = "title">Manager</td>
                                <td><?php echo ucwords($data['manager']) ?></td>
                            </tr>

                            <?php
                                }
                            ?>
                        </tbody>
                    </table>

                    <a href="listDep.php" class="btn btn-default">Back</a>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <script src="../../cj/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../cj/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../cj/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../../cj/dist/js/sb-admin-2.js"></script>
    <script src="../../cj/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../../cj/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
</body>
</html>