<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<?php
    if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
        $user_id    =   $_GET['user_id'];
        $userData   =   getDataRowByTableAndId('users',$user_id);   
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>Update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="users_list.php" class="create_link"><i class="fa fa-list"></i> List</a>
                    </div>
                    <?php include 'operation_message.php'; ?>
                    <form role="form" method="post" action="">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputQuestion">Concern Division</label>
                                <select class="form-control" id="division_id" name="division_id">
                                    <option value="">Select</option>
                                    <?php
                                    $table = "division";
                                    $groupData = getTableDataByTableName($table, 'asc', 'name', 'obj');
                                    if (isset($groupData) && !empty($groupData)) {
                                        foreach ($groupData as $gdata) {
                                            ?>
                                            <option value="<?php echo $gdata->id; ?>"<?php if(isset($userData->division_id) && $userData->division_id == $gdata->id){ echo 'selected'; } ?>><?php echo $gdata->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <?php
                                    if(isset($_SESSION['error_data']['division_id']) && !empty($_SESSION['error_data']['division_id'])){
                                        echo '<div class="error_message">'.$_SESSION['error_data']['division_id'].'</div>';
                                        unset($_SESSION['error_data']['division_id']);
                                    }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">First Name<span class="required_text"></span></label>
                                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="<?php if(isset($userData->first_name) && !empty($userData->first_name)){ echo $userData->first_name; } ?>">
                                        <?php
                                            if(isset($_SESSION['error_data']['first_name']) && !empty($_SESSION['error_data']['first_name'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['first_name'].'</div>';
                                                unset($_SESSION['error_data']['first_name']);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Last Name<span class="required_text"></span></label>
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="<?php if(isset($userData->last_name) && !empty($userData->last_name)){ echo $userData->last_name; } ?>">
                                        <?php
                                            if(isset($_SESSION['error_data']['last_name']) && !empty($_SESSION['error_data']['last_name'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['last_name'].'</div>';
                                                unset($_SESSION['error_data']['last_name']);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php if (isset($userData->email) && !empty($userData->email)) {
                                echo $userData->email;
                            } ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                    </div>
                                </div>
                            </div>                            
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type='hidden' name="user_edit_id" value="<?php echo $user_id; ?>">
                            <input type="submit" name="userUpdate" value="Update" class="btn btn-primary" />
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
