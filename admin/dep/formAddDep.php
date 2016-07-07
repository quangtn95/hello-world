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
    <title>Form Add Department</title>

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

        $sql="select * from employees";
        $pre = $conn -> prepare($sql);
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
                    <div><br/></div>
                    <div><br/></div>
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Department</h3>
                            </div>

                            <div class="panel-body">
                                <form id="registration_form" name="form1" method="POST" action="addDep.php">
                                    <div style="display:none;">
                                        <input type="hidden" name="_method" value="POST"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Department Name</label>
                                        <input name="txtname" class="form-control" maxlength="256" type="text" id="form_name"/>
                                        <span class="error_form" id="name_error_message"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Office Phone</label>
                                        <input name="txtcell" class="form-control" maxlength="20" type="tel" id="form_phone"/>
                                        <span class="error_form" id="phone_error_message"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="txtemail" class="form-control" type="tel" id="form_email"/>
                                        <span class="error_form" id="email_error_message"></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Manager</label>
                                        
                                        <select name="txtmng" class="form-control" id="txtmng">
                                            <option value=""></option>
                                            <?php
                                                while ($data = $pre->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <option value="<?php echo $data['name'] ?>"><?php echo $data['name'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>

                                        
                                    </div>
                                    <div class="submit">
                                        <a href="listDep.php" class="btn btn-danger">Cancel</a>
                                        <input class="btn btn-success" type="submit" name="button" value="Add"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>


    <script src="../../cj/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../cj/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../cj/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../../cj/dist/js/sb-admin-2.js"></script>
    <script src="../../cj/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../../cj/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/scriptDep.js"></script>
</body>
</html>