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
            Customer Info
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customer Info</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="customer_information_add.php" class="create_link"><i class="fa fa-plus"></i> Add</a>
                    </div>
                    <div class="box-body">
                        <?php
                        $table = ((is_super_admin($_SESSION['logged']['user_type']))? 'customer_info': "customer_info where division_id=".$_SESSION['logged']['division_id']);
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
                                        <th>Name</th>
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
                                            <td>
                                                <?php
                                                echo $adata->first_name.' '.$adata->last_name; 
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $adata->contact; 
                                                ?>
                                            </td>
                                            <td>
                                                <a href="customer_information_edit.php?customer_id=<?php echo $adata->id; ?>" class="btn btn-small"><i class="fa fa-pencil"></i></a>
                                                <button type="button" class="btn btn-small" onclick="confirm_delete_operation('<?php echo $adata->id; ?>', 'customer_info');"><i class="fa fa-close"></i></button>
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