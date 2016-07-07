
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>

    <link rel="Shortcut Icon" href="images/nguoi.jpg"/>
    <link href="../../cj/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="cj/app.css">

</head>
<body>

    <?php
    include_once('lib/helper.php');
    ?>


    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-dafault">

                        <div class="panel-heading">
                            <h4>LOGIN</h4>
                        </div>

                        <div class="panel-body">
                            <form id="form-login" name="form1" action="index.php" method="POST" role="form">

                                <div>
                                    <?php show_error($error, 'message'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" value ='<?php echo (isset($_POST['username']) ? $_POST['username']: ''); ?>'>
                                    <?php show_error($error, 'username'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" value ='<?php echo (isset($_POST['password']) ? $_POST['password']: ''); ?>'>
                                    <?php show_error($error, 'password'); ?>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- End Row -->
        </div>
    </section>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="../../cj/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>