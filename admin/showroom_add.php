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
            <small>Add</small>
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
                        <a href="showroom_list.php" class="create_link"><i class="fa fa-list"></i> List</a>
                    </div>
                    <form role="form" method="post" action="">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address Division</label>
                                        <select class="form-control" id="addr_div_id" name="addr_div_id" onchange="getDistrictByDivision(this.value)">
                                            <option value="">Select</option>
                                            <?php
                                            $table = 'addr_divisions';
                                            $order = 'ASC';
                                            $column = 'name';
                                            $dataType = 'obj';
                                            $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                            if (isset($tableData) && !empty($tableData)) {
                                                foreach ($tableData as $data) {
                                                    ?>
                                                    <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>   
                                                    <?php
                                                }
                                            }
                                            ?>                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address District</label>
                                            <select class="form-control" name="addr_dis_id" id="add_district_id" onchange="getUpazilaByDistrict(this.value)">
                                                <option value="">Select</option>                       
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address Upazila</label>
                                        <select class="form-control" name="addr_upazila_id" id="add_upazila_id" onchange="getUnionByUpazila(this.value)">
                                            <option value="">Select</option>                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address Union</label>
                                        <select class="form-control" name="addr_union_id" id="add_union_id">
                                            <option value="">Select</option>                       
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Division</label>
                                <select class="form-control" id="division_id" name="division_id">
                                    <option value="">Select</option>
                                    <?php
                                    $table = "division";
                                    $groupData = getTableDataByTableName($table, 'asc', 'name', 'obj');
                                    if (isset($groupData) && !empty($groupData)) {
                                        foreach ($groupData as $gdata) {
                                            ?>
                                            <option value="<?php echo $gdata->id; ?>"><?php echo $gdata->name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Showroom/Service Center Name</label>
                                <input type="text" class="form-control" id="showroom_title" name="showroom_title" placeholder="Enter showroom name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Address</label>
                                <input type="text" class="form-control" id="showroom_address" name="showroom_address" placeholder="Enter address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Contact Person</label>
                                <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Enter contact person">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Contact Number</label>
                                <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter contact number">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" name="showroomSave" value="Save" class="btn btn-primary" />
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
