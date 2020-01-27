<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users
            <small>Add</small>
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
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">User Type</label>
                                        <select class="form-control" id="user_type" name="user_type">
                                            <option value="">Select</option>
                                            <?php
                                            $table = "user_type";
                                            $groupData = getTableDataByTableName($table, 'asc', 'type_order', 'obj');
                                            if (isset($groupData) && !empty($groupData)) {
                                                foreach ($groupData as $gdata) {
                                                    ?>
                                                    <option value="<?php echo $gdata->short_name; ?>"<?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == $gdata->short_name) {
                                                echo 'selected';
                                            } ?>><?php echo $gdata->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php
                                        if (isset($_SESSION['error_data']['user_type']) && !empty($_SESSION['error_data']['user_type'])) {
                                            echo '<div class="error_message">' . $_SESSION['error_data']['user_type'] . '</div>';
                                            unset($_SESSION['error_data']['user_type']);
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
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
                                                    <option value="<?php echo $gdata->id; ?>"<?php if (isset($_SESSION['division_id']) && $_SESSION['division_id'] == $gdata->id) {
                                                echo 'selected';
                                            } ?>><?php echo $gdata->name; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </select>
                                        <?php
                                        if (isset($_SESSION['error_data']['division_id']) && !empty($_SESSION['error_data']['division_id'])) {
                                            echo '<div class="error_message">' . $_SESSION['error_data']['division_id'] . '</div>';
                                            unset($_SESSION['error_data']['division_id']);
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputQuestion">Name<span class="required_text"></span></label>
                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Name" value="<?php if (isset($_SESSION['first_name']) && !empty($_SESSION['first_name'])) {
                                            echo $_SESSION['first_name'];
                                        } ?>">
<?php
if (isset($_SESSION['error_data']['first_name']) && !empty($_SESSION['error_data']['first_name'])) {
    echo '<div class="error_message">' . $_SESSION['error_data']['first_name'] . '</div>';
    unset($_SESSION['error_data']['first_name']);
}
?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                                echo $_SESSION['email'];
                            } ?>">
                                    <?php
                                        if(isset($_SESSION['error_data']['email']) && !empty($_SESSION['error_data']['email'])){
                                            echo '<div class="error_message">'.$_SESSION['error_data']['email'].'</div>';
                                            unset($_SESSION['error_data']['email']);
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                        <?php
                                        if(isset($_SESSION['error_data']['password']) && !empty($_SESSION['error_data']['password'])){
                                            echo '<div class="error_message">'.$_SESSION['error_data']['password'].'</div>';
                                            unset($_SESSION['error_data']['password']);
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>                            
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" name="userSave" value="Create" class="btn btn-primary" />
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
