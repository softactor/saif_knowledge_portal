<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['process_type']) && $_GET['process_type'] == 'getDistrictByDivision') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $status             = 'success';
    $message            = 'Daily Assignment have been successfully updated';
    $feedback           = '';
    $division_id        = mysqli_real_escape_string($conn, $_POST['division_id']);
    // delivery_assignment table update
    $sql = "addr_districts WHERE division_id=$division_id";
    $tabledata   =   getTableDataByTableName($sql,'asc','name','obj');
    echo "<option value=''>Please Select</option>";
    if(isset($tabledata) && !empty($tabledata)){
        foreach($tabledata as $data){ ?>
            <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
    <?php }
    }
}
if (isset($_GET['process_type']) && $_GET['process_type'] == 'getUpazilaByDistrict') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $status             = 'success';
    $message            = 'Daily Assignment have been successfully updated';
    $feedback           = '';
    $district_id        = mysqli_real_escape_string($conn, $_POST['district_id']);
    // delivery_assignment table update
    $sql = "addr_upazilas WHERE district_id=$district_id";
    $tabledata   =   getTableDataByTableName($sql,'asc','name','obj');
    echo "<option value=''>Please Select</option>";
    if(isset($tabledata) && !empty($tabledata)){
        foreach($tabledata as $data){ ?>
            <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
    <?php }
    }
}
if (isset($_GET['process_type']) && $_GET['process_type'] == 'getUnionByUpazila') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $status             = 'success';
    $message            = 'Daily Assignment have been successfully updated';
    $feedback           = '';
    $upazila_id        = mysqli_real_escape_string($conn, $_POST['upazila_id']);
    // delivery_assignment table update
    $sql = "addr_unions WHERE upazila_id=$upazila_id";
    $tabledata   =   getTableDataByTableName($sql,'asc','name','obj');
    echo "<option value=''>Please Select</option>";
    if(isset($tabledata) && !empty($tabledata)){
        foreach($tabledata as $data){ ?>
            <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
    <?php }
    }
}