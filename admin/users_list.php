<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php include 'operation_message.php'; ?>
        <h1>
            Users
            <small>List</small>
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
                        <a href="user_add.php" class="create_link"><i class="fa fa-plus"></i> Add</a>
                    </div>
                    <div class="box-body">
                        <?php
                        $table = "users where user_type!='su'";
                        $order = 'ASC';
                        $column = 'first_name';
                        $dataType = 'obj';
                        $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                        if (isset($tableData) && !empty($tableData)) {
                            ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Division</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 0;
                                    foreach ($tableData as $adata) {
                                        ?>
                                        <tr id="list_row_id_<?php echo $adata->id; ?>">
                                            <td><?php echo ++$sl; ?></td>
                                            <td>
                                                <?php 
                                                    if(isset($adata->division_id) && !empty($adata->division_id)){
                                                        $table  =   "division where id=$adata->division_id";
                                                        echo $divisionData   = getNameByIdAndTable($table);
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo (isset($adata->first_name) && !empty($adata->first_name) ? $adata->first_name : 'No data'); ?></td>
                                            <td><?php echo (isset($adata->last_name) && !empty($adata->last_name) ? $adata->last_name : 'No data'); ?></td>
                                            <td><?php echo (isset($adata->email) && !empty($adata->email) ? $adata->email : 'No data'); ?></td>
                                            <td>
                                                <a href="user_edit.php?user_id=<?php echo $adata->id; ?>" class="btn btn-small"><i class="fa fa-pencil"></i></a>
                                                <button type="button" class="btn btn-small" onclick="confirm_delete_operation('<?php echo $adata->id; ?>', 'users');"><i class="fa fa-close"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div class="alert alert-warning">
                                <strong>Sorry there is no data!</strong>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
