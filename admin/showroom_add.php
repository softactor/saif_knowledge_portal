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
                                                    <option value="<?php echo $data->id; ?>" <?php if(isset($_SESSION['addr_div_id']) && $_SESSION['addr_div_id'] == $data->id){ echo 'selected'; } ?>><?php echo $data->name; ?></option>   
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
                                        <label for="role">Address District</label>
                                            <select class="form-control" name="addr_dis_id" id="add_district_id" onchange="getUpazilaByDistrict(this.value)">
                                                <option value="">Select</option>
                                                <?php
                                                    if(isset($_SESSION['addr_dis_id']) && !empty($_SESSION['addr_dis_id'])){
                                                        $table = 'addr_districts';
                                                        $order = 'ASC';
                                                        $column = 'name';
                                                        $dataType = 'obj';
                                                        $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                        if (isset($tableData) && !empty($tableData)) {
                                                            foreach ($tableData as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->id; ?>" <?php if(isset($_SESSION['addr_dis_id']) && $_SESSION['addr_dis_id'] == $data->id){ echo 'selected'; } ?>><?php echo $data->name; ?></option>   
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
                                                    if(isset($_SESSION['addr_upazila_id']) && !empty($_SESSION['addr_upazila_id'])){
                                                        $table = 'addr_upazilas';
                                                        $order = 'ASC';
                                                        $column = 'name';
                                                        $dataType = 'obj';
                                                        $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                        if (isset($tableData) && !empty($tableData)) {
                                                            foreach ($tableData as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->id; ?>" <?php if(isset($_SESSION['addr_upazila_id']) && $_SESSION['addr_upazila_id'] == $data->id){ echo 'selected'; } ?>><?php echo $data->name; ?></option>   
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
                                                    if(isset($_SESSION['addr_union_id']) && !empty($_SESSION['addr_union_id'])){
                                                        $table = 'addr_unions';
                                                        $order = 'ASC';
                                                        $column = 'name';
                                                        $dataType = 'obj';
                                                        $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                        if (isset($tableData) && !empty($tableData)) {
                                                            foreach ($tableData as $data) {
                                                                ?>
                                                                <option value="<?php echo $data->id; ?>" <?php if(isset($_SESSION['addr_union_id']) && $_SESSION['addr_union_id'] == $data->id){ echo 'selected'; } ?>><?php echo $data->name; ?></option>   
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
                                            <option value="<?php echo $gdata->id; ?>"<?php if(isset($_SESSION['division_id']) && $_SESSION['division_id'] == $gdata->id){ echo 'selected'; } ?>><?php echo $gdata->name; ?></option>
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
                                        <label for="exampleInputQuestion">Showroom/Service Center Name</label>
                                        <input type="text" class="form-control" id="showroom_title" name="showroom_title" placeholder="Enter showroom name" value="<?php if(isset($_SESSION['showroom_title']) && !empty($_SESSION['showroom_title'])){ echo $_SESSION['showroom_title']; } ?>">
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
                                        <label for="exampleInputQuestion">Address</label>
                                        <input type="text" class="form-control" id="showroom_address" name="showroom_address" placeholder="Enter address" value="<?php if(isset($_SESSION['showroom_address']) && !empty($_SESSION['showroom_address'])){ echo $_SESSION['showroom_address']; } ?>">
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
                                        <label for="exampleInputQuestion">Contact Person</label>
                                        <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Enter contact person" value="<?php if(isset($_SESSION['contact_name']) && !empty($_SESSION['contact_name'])){ echo $_SESSION['contact_name']; } ?>">
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
                                        <label for="exampleInputQuestion">Contact Number</label>
                                        <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter contact number" value="<?php if(isset($_SESSION['contact_number']) && !empty($_SESSION['contact_number'])){ echo $_SESSION['contact_number']; } ?>">
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
                                        <label for="exampleInputQuestion">Designation</label>
                                        <select class="form-control" id="designation" name="designation">
                                            <option value="">Select</option>
                                            <?php
                                            $table      = "designations";
                                            $groupData  = getTableDataByTableName($table, 'asc', 'name', 'obj');
                                            if (isset($groupData) && !empty($groupData)) {
                                                foreach ($groupData as $gdata) {
                                                    ?>
                                                    <option value="<?php echo $gdata->id; ?>"<?php if(isset($_SESSION['designation']) && $_SESSION['designation']==$gdata->id){ echo 'selected'; } ?>><?php echo $gdata->name; ?></option>
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
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php if(isset($_SESSION['email']) && !empty($_SESSION['email'])){ echo $_SESSION['email']; } ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Coverage area</label>
                                <input type="text" class="form-control" id="cov_area" name="cov_area" placeholder="Enter Coverage area with comma seperated value" value="<?php if(isset($_SESSION['cov_area']) && !empty($_SESSION['cov_area'])){ echo $_SESSION['cov_area']; } ?>">
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
