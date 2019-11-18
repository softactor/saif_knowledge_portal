<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<?php
    if(isset($_GET['showroom_id']) && !empty($_GET['showroom_id'])){
        $showroom_id     =   $_GET['showroom_id'];
        $editTableData       =   getDataRowByTableAndId('showrooms',$showroom_id);  
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
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
                    <?php include 'operation_message.php'; ?>
                    <form role="form" method="post" action="">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address Division<span class="required_text"></span></label>
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
                                                    <option value="<?php echo $data->id; ?>" <?php if(isset($editTableData->addr_div_id) && $editTableData->addr_div_id == $data->id){ echo 'selected'; } ?>><?php echo $data->name; ?></option>   
                                                    <?php
                                                }
                                            }
                                            ?>                        
                                        </select>
                                        <?php
                                            if(isset($_SESSION['error_data']['addr_div_id']) && !empty($_SESSION['error_data']['addr_div_id'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['addr_div_id'].'</div>';
                                                unset($_SESSION['error_data']['addr_div_id']);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address District<span class="required_text"></span></label>
                                            <select class="form-control" name="addr_dis_id" id="add_district_id" onchange="getUpazilaByDistrict(this.value)">
                                                <option value="">Select</option>
                                                <?php
                                                    if(isset($editTableData->addr_dis_id) && !empty($editTableData->addr_dis_id)){
                                                        $table = 'addr_districts';
                                                        $order = 'ASC';
                                                        $column = 'name';
                                                        $dataType = 'obj';
                                                        $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                        if (isset($tableData) && !empty($tableData)) {
                                                            foreach ($tableData as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->id; ?>" <?php if(isset($editTableData->addr_dis_id) && $editTableData->addr_dis_id == $data->id){ echo 'selected'; } ?>><?php echo $data->name; ?></option>   
                                                                <?php
                                                            }
                                                        }  
                                                    }
                                                ?>
                                            </select>
                                        <?php
                                            if(isset($_SESSION['error_data']['addr_dis_id']) && !empty($_SESSION['error_data']['addr_dis_id'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['addr_dis_id'].'</div>';
                                                unset($_SESSION['error_data']['addr_dis_id']);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address Upazila</label>
                                        <select class="form-control" name="addr_upazila_id" id="add_upazila_id" onchange="getUnionByUpazila(this.value)">
                                            <option value="">Select</option> 
                                            <?php
                                                    if(isset($editTableData->addr_upazila_id) && !empty($editTableData->addr_upazila_id)){
                                                        $table = 'addr_upazilas';
                                                        $order = 'ASC';
                                                        $column = 'name';
                                                        $dataType = 'obj';
                                                        $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                        if (isset($tableData) && !empty($tableData)) {
                                                            foreach ($tableData as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->id; ?>" <?php if(isset($editTableData->addr_upazila_id) && $editTableData->addr_upazila_id == $data->id){ echo 'selected'; } ?>><?php echo $data->name; ?></option>   
                                                                <?php
                                                            }
                                                        }  
                                                    }
                                                ?>
                                        </select>
                                        <?php
                                            if(isset($_SESSION['error_data']['addr_upazila_id']) && !empty($_SESSION['error_data']['addr_upazila_id'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['addr_upazila_id'].'</div>';
                                                unset($_SESSION['error_data']['addr_upazila_id']);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address Union</label>
                                        <select class="form-control" name="addr_union_id" id="add_union_id">
                                            <option value="">Select</option> 
                                            <?php
                                                    if(isset($editTableData->addr_union_id) && !empty($editTableData->addr_union_id)){
                                                        $table = 'addr_unions';
                                                        $order = 'ASC';
                                                        $column = 'name';
                                                        $dataType = 'obj';
                                                        $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                        if (isset($tableData) && !empty($tableData)) {
                                                            foreach ($tableData as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->id; ?>" <?php if(isset($editTableData->addr_union_id) && $editTableData->addr_union_id == $data->id){ echo 'selected'; } ?>><?php echo $data->name; ?></option>   
                                                                <?php
                                                            }
                                                        }  
                                                    }
                                                ?>
                                        </select>
                                        <?php
                                            if(isset($_SESSION['error_data']['addr_union_id']) && !empty($_SESSION['error_data']['addr_union_id'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['addr_union_id'].'</div>';
                                                unset($_SESSION['error_data']['addr_union_id']);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
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
                                            <option value="<?php echo $gdata->id; ?>"<?php if(isset($editTableData->division_id) && $editTableData->division_id == $gdata->id){ echo 'selected'; } ?>><?php echo $gdata->name; ?></option>
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
                                        <label for="exampleInputQuestion">Showroom/Service Center Name<span class="required_text"></span></label>
                                        <input type="text" class="form-control" id="showroom_title" name="showroom_title" placeholder="Enter showroom name" value="<?php if(isset($editTableData->showroom_title) && !empty($editTableData->showroom_title)){ echo $editTableData->showroom_title; } ?>">
                                        <?php
                                            if(isset($_SESSION['error_data']['showroom_title']) && !empty($_SESSION['error_data']['showroom_title'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['showroom_title'].'</div>';
                                                unset($_SESSION['error_data']['showroom_title']);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Address<span class="required_text"></span></label>
                                        <input type="text" class="form-control" id="showroom_address" name="showroom_address" placeholder="Enter address" value="<?php if(isset($editTableData->showroom_address) && !empty($editTableData->showroom_address)){ echo $editTableData->showroom_address; } ?>">
                                        <?php
                                            if(isset($_SESSION['error_data']['showroom_address']) && !empty($_SESSION['error_data']['showroom_address'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['showroom_address'].'</div>';
                                                unset($_SESSION['error_data']['showroom_address']);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Contact Person<span class="required_text"></span></label>
                                        <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Enter contact person" value="<?php if(isset($editTableData->contact_name) && !empty($editTableData->contact_name)){ echo $editTableData->contact_name; } ?>">
                                        <?php
                                            if(isset($_SESSION['error_data']['contact_name']) && !empty($_SESSION['error_data']['contact_name'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['contact_name'].'</div>';
                                                unset($_SESSION['error_data']['contact_name']);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Contact Number<span class="required_text"></span></label>
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter contact number" value="<?php if(isset($editTableData->contact_number) && !empty($editTableData->contact_number)){ echo $editTableData->contact_number; } ?>">
                                        <?php
                                            if(isset($_SESSION['error_data']['contact_number']) && !empty($_SESSION['error_data']['contact_number'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['contact_number'].'</div>';
                                                unset($_SESSION['error_data']['contact_number']);
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Designation<span class="required_text"></span></label>
                                        <select class="form-control" id="designation" name="designation">
                                            <option value="">Select</option>
                                            <?php
                                            $table      = "designations";
                                            $groupData  = getTableDataByTableName($table, 'asc', 'name', 'obj');
                                            if (isset($groupData) && !empty($groupData)) {
                                                foreach ($groupData as $gdata) {
                                                    ?>
                                                    <option value="<?php echo $gdata->id; ?>"<?php if(isset($editTableData->designation) && $editTableData->designation==$gdata->id){ echo 'selected'; } ?>><?php echo $gdata->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php
                                            if(isset($_SESSION['error_data']['designation']) && !empty($_SESSION['error_data']['designation'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['designation'].'</div>';
                                                unset($_SESSION['error_data']['designation']);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php if(isset($editTableData->email) && !empty($editTableData->email)){ echo $editTableData->email; } ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Coverage area</label>
                                <input type="text" class="form-control" id="cov_area" name="cov_area" placeholder="Enter Coverage area with comma seperated value" value="<?php if(isset($editTableData->cov_area) && !empty($editTableData->cov_area)){ echo $editTableData->cov_area; } ?>">
                            </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type='hidden' name="show_room_edit_id" value="<?php echo $editTableData->id; ?>">
                            <input type="submit" name="showroomUpdate" value="Update" class="btn btn-primary" />
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
