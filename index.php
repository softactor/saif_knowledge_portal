<?php session_start(); 
include 'admin/connection/connect.php';
include 'admin/function/login_process.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Knowledge Portal | Log in</title>
        <link rel="shortcut icon" type="image/x-icon" href="admin/images/icon/port.png" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="admin/vendor/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="admin/vendor/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="admin/vendor/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="admin/vendor/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="admin/vendor/plugins/iCheck/square/blue.css">
        <link rel="stylesheet" href="admin/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
    </head>
    <body class="hold-transition login-page" style="background-image: url('frontend/images/login_bg.jpeg');background-repeat: no-repeat;background-attachment: fixed;background-position: center;">
        <div class="login-box">
            <div class="login-logo login-logo-overwrite">
                <b style="color: white;">Knowledge Portal</b>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <?php 
                    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
                <div class="alert alert-warning">        
                    <?php    echo $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                </div>
                <?php } ?>
                    
                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?php if (isset($_SESSION['error_message']['email_empty']) && !empty($_SESSION['error_message']['email_empty'])) { ?>
                                <div class="alert alert-warning">
                                    <strong>Warning!</strong> <?php echo $_SESSION['error_message']['email_empty']; ?>
                                </div>
                                <?php
                                unset($_SESSION['error_message']['email_empty']);
                            }
                            ?>
                            <?php if (isset($_SESSION['error_message']['email_valid']) && !empty($_SESSION['error_message']['email_valid'])) { ?>
                                <div class="alert alert-warning">
                                    <strong>Warning!</strong> <?php echo $_SESSION['error_message']['email_valid']; ?>
                                </div>
                                <?php
                                unset($_SESSION['error_message']['email_valid']);
                            }
                            ?>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?php if (isset($_SESSION['error_message']['password_empty']) && !empty($_SESSION['error_message']['password_empty'])) { ?>
                            <div class="alert alert-warning">
                                <strong>Warning!</strong> <?php echo $_SESSION['error_message']['password_empty']; ?>
                            </div>
                            <?php
                            unset($_SESSION['error_message']['password_empty']);
                        }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="submit" name="user_login_submit" class="btn btn-primary btn-block btn-flat" value="Login">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>                
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="admin/vendor/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="admin/vendor/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="admin/vendor/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' /* optional */
                });
            });
        </script>
    </body>
</html>
