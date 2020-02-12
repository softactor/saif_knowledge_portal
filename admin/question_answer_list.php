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
            Question Answer
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Question Answer</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="question_answer_add.php" class="create_link"><i class="fa fa-plus"></i> Add</a>
                    </div>
                    <div class="box-body">
                        <table id="faq_list_data" class="table table-striped table-bordered list-table-custom-style" style="width:100%">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <select class="form-control" id="division_id" name="division_id" onchange="get_dropdown_wise_faq_data()">
                                            <option value="">Select All</option>
                                                <?php
                                                $table = 'division';
                                                $order = 'ASC';
                                                $column = 'name';
                                                $dataType = 'obj';
                                                $divitableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                if (isset($divitableData) && !empty($divitableData)) {
                                                    foreach ($divitableData as $dividata) {
                                                ?>
                                                        <option value="<?php echo $dividata->id; ?>"><?php echo $dividata->name; ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </th>
                                    <th>Question</th>
                                    <th>
                                        <div class="form-group">
                                            <select class="form-control" id="is_status" name="is_status" onchange="get_dropdown_wise_faq_data();">
                                                <option value="">Select</option>
                                                <option value="0" <?php if(isset($editTableData->is_status) && $editTableData->is_status==0){ echo 'selected'; } ?>>Unapprove</option>
                                                <option value="1"<?php if(isset($editTableData->is_status) && $editTableData->is_status==1){ echo 'selected'; } ?>>Approve</option>
                                            </select>
                                        </div>
                                    </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
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
