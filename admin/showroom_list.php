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
            Showroom/Service Center
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Showroom/Service Center</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="showroom_add.php" class="create_link"><i class="fa fa-plus"></i> Add</a>
                    </div>
                    <div class="box-body">
                        <?php
                        $table = ((is_super_admin($_SESSION['logged']['user_type']))? 'showrooms': "showrooms where division_id=".$_SESSION['logged']['division_id']);
                        $order = 'ASC';
                        $column = 'showroom_title';
                        $dataType = 'obj';
                        $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                        if (isset($tableData) && !empty($tableData)) {
                            ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact</th>
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
                                            <td><?php echo (isset($adata->showroom_title) && !empty($adata->showroom_title) ? $adata->showroom_title : 'No data'); ?></td>
                                            <td><?php echo (isset($adata->showroom_address) && !empty($adata->showroom_address) ? $adata->showroom_address : 'No data'); ?></td>
                                            <td><?php echo (isset($adata->contact_number) && !empty($adata->contact_number) ? $adata->contact_number : 'No data'); ?></td>
                                            <td>
                                                <a href="showroom_edit.php?showroom_id=<?php echo $adata->id; ?>" class="btn btn-small"><i class="fa fa-pencil"></i></a>
                                                <button type="button" class="btn btn-small" onclick="confirm_delete_operation('<?php echo $adata->id; ?>', 'showrooms');"><i class="fa fa-close"></i></button>
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
