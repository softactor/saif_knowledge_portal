<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">        
        <h1>
            Customer
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customer</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="product_list.php" class="create_link"><i class="fa fa-list"></i> List</a>
                    </div>
                    <?php include 'operation_message.php'; ?>
                    <form role="form" method="post" action="">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Division<span class="required_text"></span></label>
                                        <select class="form-control" id="division_id" name="division_id">
                                            <option value="">Select</option>
                                            <?php
                                            $table = "division";
                                            $groupData = getTableDataByTableName($table, 'asc', 'name', 'obj');
                                            if (isset($groupData) && !empty($groupData)) {
                                                foreach ($groupData as $gdata) {
                                                    ?>
                                                    <option value="<?php echo $gdata->id; ?>"<?php
                                                    if (isset($_SESSION['division_id']) && $_SESSION['division_id'] == $gdata->id) {
                                                        echo 'selected';
                                                    }
                                                    ?>><?php echo $gdata->name; ?></option>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">User Type<span class="required_text"></span></label>
                                        <div class="radio">
                                            <label class="radio-inline"><input type="radio" name="user_type" value="1" <?php
                                        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {
                                            echo 'checked';
                                        }
                                        ?>>Dealer</label>
                                            <label class="radio-inline"><input type="radio" name="user_type" value="2" <?php
                                        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 2) {
                                            echo 'checked';
                                        }
                                        ?>>General</label>
                                        </div>
<?php
if (isset($_SESSION['error_data']['user_type']) && !empty($_SESSION['error_data']['user_type'])) {
    echo '<div class="error_message">' . $_SESSION['error_data']['user_type'] . '</div>';
    unset($_SESSION['error_data']['user_type']);
}
?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">First Name<span class="required_text"></span></label>
                                        <input type="text" class="form-control" id="product_title" name="first_name" placeholder="Enter First Name" value="<?php
                                               if (isset($_SESSION['first_name']) && !empty($_SESSION['first_name'])) {
                                                   echo $_SESSION['first_name'];
                                               }
                                               ?>">
<?php
if (isset($_SESSION['error_data']['first_name']) && !empty($_SESSION['error_data']['first_name'])) {
    echo '<div class="error_message">' . $_SESSION['error_data']['first_name'] . '</div>';
    unset($_SESSION['error_data']['first_name']);
}
?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Last Name<span class="required_text"></span></label>
                                        <input type="text" class="form-control" id="product_title" name="last_name" placeholder="Enter Last Name" value="<?php
                                               if (isset($_SESSION['last_name']) && !empty($_SESSION['last_name'])) {
                                                   echo $_SESSION['last_name'];
                                               }
                                               ?>">
<?php
if (isset($_SESSION['error_data']['last_name']) && !empty($_SESSION['error_data']['last_name'])) {
    echo '<div class="error_message">' . $_SESSION['error_data']['last_name'] . '</div>';
    unset($_SESSION['error_data']['last_name']);
}
?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address Division<span class="required_text"></span></label>
                                        <select class="form-control" id="addr_div_id" name="addr_division" onchange="getDistrictByDivision(this.value)">
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
                                                    <option value="<?php echo $data->id; ?>" <?php if (isset($_SESSION['addr_division']) && $_SESSION['addr_division'] == $data->id) {
                                            echo 'selected';
                                        } ?>><?php echo $data->name; ?></option>   
                                                <?php
                                            }
                                        }
                                        ?>                        
                                        </select>
<?php
if (isset($_SESSION['error_data']['addr_division']) && !empty($_SESSION['error_data']['addr_division'])) {
    echo '<div class="error_message">' . $_SESSION['error_data']['addr_division'] . '</div>';
    unset($_SESSION['error_data']['addr_division']);
}
?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address District<span class="required_text"></span></label>
                                        <select class="form-control" name="addr_district" id="add_district_id" onchange="getUpazilaByDistrict(this.value)">
                                            <option value="">Select</option>
                                            <?php
                                            if (isset($_SESSION['addr_district']) && !empty($_SESSION['addr_district'])) {
                                                $table = 'addr_districts';
                                                $order = 'ASC';
                                                $column = 'name';
                                                $dataType = 'obj';
                                                $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                if (isset($tableData) && !empty($tableData)) {
                                                    foreach ($tableData as $data) {
                                                        ?>
                                                        <option value="<?php echo $data->id; ?>" <?php if (isset($_SESSION['addr_district']) && $_SESSION['addr_district'] == $data->id) {
                                            echo 'selected';
                                        } ?>><?php echo $data->name; ?></option>   
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                        </select>
<?php
if (isset($_SESSION['error_data']['addr_district']) && !empty($_SESSION['error_data']['addr_district'])) {
    echo '<div class="error_message">' . $_SESSION['error_data']['addr_district'] . '</div>';
    unset($_SESSION['error_data']['addr_district']);
}
?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address Upazila</label>
                                        <select class="form-control" name="addr_upazila" id="add_upazila_id" onchange="getUnionByUpazila(this.value)">
                                            <option value="">Select</option> 
                                            <?php
                                            if (isset($_SESSION['addr_upazila']) && !empty($_SESSION['addr_upazila'])) {
                                                $table = 'addr_upazilas';
                                                $order = 'ASC';
                                                $column = 'name';
                                                $dataType = 'obj';
                                                $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                if (isset($tableData) && !empty($tableData)) {
                                                    foreach ($tableData as $data) {
                                                        ?>
                                                        <option value="<?php echo $data->id; ?>" <?php if (isset($_SESSION['addr_upazila']) && $_SESSION['addr_upazila'] == $data->id) {
                                            echo 'selected';
                                        } ?>><?php echo $data->name; ?></option>   
            <?php
        }
    }
}
?>
                                        </select>
                                            <?php
                                            if (isset($_SESSION['error_data']['addr_upazila']) && !empty($_SESSION['error_data']['addr_upazila'])) {
                                                echo '<div class="error_message">' . $_SESSION['error_data']['addr_upazila'] . '</div>';
                                                unset($_SESSION['error_data']['addr_upazila']);
                                            }
                                            ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="role">Address Union</label>
                                        <select class="form-control" name="addr_union" id="add_union_id">
                                            <option value="">Select</option> 
                                            <?php
                                            if (isset($_SESSION['addr_union']) && !empty($_SESSION['addr_union'])) {
                                                $table = 'addr_unions';
                                                $order = 'ASC';
                                                $column = 'name';
                                                $dataType = 'obj';
                                                $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                if (isset($tableData) && !empty($tableData)) {
                                                    foreach ($tableData as $data) {
                                                        ?>
                                                        <option value="<?php echo $data->id; ?>" <?php if (isset($_SESSION['addr_union_id']) && $_SESSION['addr_union_id'] == $data->id) {
                                            echo 'selected';
                                        } ?>><?php echo $data->name; ?></option>   
            <?php
        }
    }
}
?>
                                        </select>
<?php
if (isset($_SESSION['error_data']['addr_union']) && !empty($_SESSION['error_data']['addr_union'])) {
    echo '<div class="error_message">' . $_SESSION['error_data']['addr_union'] . '</div>';
    unset($_SESSION['error_data']['addr_union']);
}
?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Birthday</label>
                                        <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter Date Of Birth" value="<?php if(isset($_SESSION['product_type']) && $_SESSION['product_type'] == 1){ echo 'checked'; } ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Email</label>
                                        <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter Email" value="<?php if(isset($_SESSION['product_type']) && $_SESSION['product_type'] == 1){ echo 'checked'; } ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Contact<span class="required_text"></span></label>
                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact Number" value="<?php if(isset($_SESSION['product_type']) && $_SESSION['product_type'] == 1){ echo 'checked'; } ?>">
                                        <?php
if (isset($_SESSION['error_data']['contact']) && !empty($_SESSION['error_data']['contact'])) {
    echo '<div class="error_message">' . $_SESSION['error_data']['contact'] . '</div>';
    unset($_SESSION['error_data']['contact']);
}
?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Are you using our Product</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="is_using_product" <?php if(isset($_SESSION['is_using_product']) && $_SESSION['is_using_product'] == 1){ echo 'checked'; } ?>>Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="is_using_product" <?php if(isset($_SESSION['is_using_product']) && $_SESSION['is_using_product'] == 2){ echo 'checked'; } ?>>No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">After sell any one contact you</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="is_anyone_contact" <?php if(isset($_SESSION['is_anyone_contact']) && $_SESSION['is_anyone_contact'] == 1){ echo 'checked'; } ?>>Yes
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="is_anyone_contact" <?php if(isset($_SESSION['is_anyone_contact']) && $_SESSION['is_anyone_contact'] == 2){ echo 'checked'; } ?>>No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Product Name</label>
                                        <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter Product Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">When start using?</label>
                                        <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter Using Date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">User feedback</label>
                                        <textarea name="description" rows="5" cols="80"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">User Suggestion</label>
                                        <textarea name="description" rows="5" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Communicating Agent feedback</label>
                                        <textarea name="description" rows="5" cols="80"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Next schedule to contact again</label>
                                        <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter Next Schedule Date">
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" name="CustomerInformationAdd" value="Save" class="btn btn-primary" />
                        </div>
                    </form>
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
