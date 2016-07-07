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
	<title>Form Add Employee</title>
	
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

        $sql="select * from departments";
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
                                    <a href="../dep/listDep.php">List Department</a>
                                </li>
                                <li>
                                    <a href="../dep/formAddDep.php">Add Department</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Employee<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="listEmp.php">List Employee</a>
                                </li>
                                <li>
                                    <a href="formAddEmp.php">Add Employee</a>
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
                    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Add Employee</h3>
							</div>

							<div class="panel-body">
								<form id="registration_form" name="registration_form" method="POST" enctype="multipart/form-data" action="addEmp.php" accept-charset="utf-8">
									<div style="display:none;">
										<input type="hidden" name="_method" value="POST"/>
									</div>

									<div class="row">
										<div class="col-sm-5">
											<img src="../../images/icon-profile.png" class="img-responsive" alt="Employee Photo"/>
											<input type="file" name="hinh" id="form_image"/>
                                            <span class="error_form" id="image_error_message"></span>
										</div>

										<div class="col-sm-7">
											<div class="form-group">
												<label>Employee Name</label>
												<input name="txtname" class="form-control" maxlength="100" type="text" id="form_name"/>
												<span class="error_form" id="name_error_message"></span>
											</div>

											<div class="form-group">
												<label>Sex:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
												<input type="radio" name="txtsex" value="Nam" checked="checked"/>Nam
		            							<input type="radio" name="txtsex" value="Nữ"/>Nữ
											</div>

											<div class="form-group">
												<label>Birthday</label>
												<input name="txtdate" class="form-control" maxlength="100" type="text" id="form_date" placeholder="YYYY-MM-DD"/>
												<span class="error_form" id="date_error_message"></span>
											</div>

											<div class="form-group">
												<label>Address</label>
												<input name="txtaddress" class="form-control" maxlength="100" type="text" id="form_address"/>
												<span class="error_form" id="address_error_message"></span>
											</div>

											<div class="form-group">
												<label>Job Title</label>
												<input name="txtjob" class="form-control" maxlength="100" type="text" id="form_job"/>
												<span class="error_form" id="job_error_message"></span>
											</div>

											<div class="form-group">
												<label>Cellphone</label>
													<input name="txtcell" class="form-control" maxlength="20" type="tel" id="form_phone"/>
													<span class="error_form" id="phone_error_message"></span>
											</div>

											<div class="form-group">
												<label>Email</label>
												<input name="txtemail" class="form-control" maxlength="256" type="email" id="form_email"/>
												<span class="error_form" id="email_error_message"></span>
											</div>

											<div class="form-group">
												<label>Department</label>
												<select name="txtdep" class="form-control" id="txtdep">
													<option value=""></option>
				                                    <?php
				                                        while ($data = $pre->fetch(PDO::FETCH_ASSOC)){
				                                    ?>
				                                    <option value="<?php echo $data['dep_name'] ?>"><?php echo $data['dep_name'] ?></option>
				                                    <?php
				                                        }
				                                    ?>
												</select>
											</div>

											<div>
												<a href="listEmp.php" class="btn btn-danger">Cancel</a>
												<input class="btn btn-success" type="submit" name="button" value="Add"/>
											</div>
										</div>
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
    <!-- /#wrapper -->


	<script src="../../cj/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../cj/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../cj/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../../cj/dist/js/sb-admin-2.js"></script>
    <script src="../../cj/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="../../cj/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../../js/scriptEmp.js"></script>

</body>
</html>