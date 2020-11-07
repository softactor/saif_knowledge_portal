<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['showroomSave']) && !empty($_POST['showroomSave'])){
    $addr_div_id        =   mysqli_real_escape_string($conn, $_POST['addr_div_id']);
    $addr_dis_id        =   mysqli_real_escape_string($conn, $_POST['addr_dis_id']);
    $addr_upazila_id    =   mysqli_real_escape_string($conn, $_POST['addr_upazila_id']);
    $addr_union_id      =   mysqli_real_escape_string($conn, $_POST['addr_union_id']);
    
    $division_id        =   mysqli_real_escape_string($conn, $_POST['division_id']);
    $showroom_title     =   mysqli_real_escape_string($conn, $_POST['showroom_title']);
    $showroom_address   =   mysqli_real_escape_string($conn, $_POST['showroom_address']);
    $contact_name       =   mysqli_real_escape_string($conn, $_POST['contact_name']);
    $contact_number     =   mysqli_real_escape_string($conn, $_POST['contact_number']);
    
    $designation        =   mysqli_real_escape_string($conn, $_POST['designation']);
    $email              =   mysqli_real_escape_string($conn, $_POST['email']);
    $cov_area           =   mysqli_real_escape_string($conn, $_POST['cov_area']);
    $table              =   "showrooms";
    $where              =   "showroom_title='$showroom_title'";
    $isDuplicate    =   isDuplicateData($table, $where);
    if(!$isDuplicate){
        $error  =   false;
        $_SESSION['error_data'] =   [];
        if(empty($addr_div_id)){
            $error      =   true;
            $_SESSION['error_data']['addr_div_id']   =   'Address division is required!';
        }
        if(empty($addr_dis_id)){
            $error      =   true;
            $_SESSION['error_data']['addr_dis_id']   =   'Address district is required!';
        }
        if(empty($division_id)){
            $error      =   true;
            $_SESSION['error_data']['division_id']   =   'Concern division is required!';
        }
        if(empty($showroom_title)){
            $error      =   true;
            $_SESSION['error_data']['showroom_title']   =   'Showroom title is required!';
        }
        if(empty($showroom_address)){
            $error      =   true;
            $_SESSION['error_data']['showroom_address']   =   'Showroom address is required!';
        }
        if(empty($contact_name)){
            $error      =   true;
            $_SESSION['error_data']['contact_name']   =   'Contact name is required!';
        }
        if(empty($contact_number)){
            $error      =   true;
            $_SESSION['error_data']['contact_number']   =   'Contact number is required!';
        }
        if(empty($designation)){
            $error      =   true;
            $_SESSION['error_data']['designation']   =   'Designation is required!';
        }
        if($error){
            $_SESSION['error']    =   "Please fill up the required fields";
            $_SESSION['addr_div_id']        =   $addr_div_id;
            $_SESSION['addr_dis_id']        =   $addr_dis_id;
            $_SESSION['addr_upazila_id']    =   $addr_upazila_id;
            $_SESSION['addr_union_id']      =   $addr_union_id;
            $_SESSION['division_id']        =   $division_id;
            $_SESSION['showroom_title']     =   $showroom_title;
            $_SESSION['showroom_address']   =   $showroom_address;
            $_SESSION['contact_name']       =   $contact_name;
            $_SESSION['contact_number']     =   $contact_number;
            $_SESSION['designation']        =   $designation;
            $_SESSION['email']              =   $email;
            $_SESSION['cov_area']           =   $cov_area;
        }else{        
            $fields     =   [
                'addr_div_id'       =>  $addr_div_id,
                'addr_dis_id'       =>  $addr_dis_id,
                'addr_upazila_id'   =>  $addr_upazila_id,
                'addr_union_id'     =>  $addr_union_id,
                'division_id'       =>  $division_id,
                'showroom_title'    =>  $showroom_title,
                'showroom_address'  =>  $showroom_address,
                'contact_name'      =>  $contact_name,
                'contact_number'    =>  $contact_number,
                'designation'       =>  $designation,
                'email'             =>  $email,
                'cov_area'          =>  $cov_area,
            ];
            $insert =   saveData($table, $fields); 
            unset($_SESSION['addr_div_id']);
            unset($_SESSION['addr_dis_id']);
            unset($_SESSION['addr_upazila_id']);
            unset($_SESSION['addr_union_id']);
            unset($_SESSION['division_id']);
            unset($_SESSION['showroom_title']);
            unset($_SESSION['showroom_address']);
            unset($_SESSION['contact_name']);
            unset($_SESSION['contact_number']);
            unset($_SESSION['designation']);
            unset($_SESSION['email']);
            unset($_SESSION['cov_area']);
            $_SESSION['success']    =   "Data have been successfully Saved.";
        }
    }else{
        $_SESSION['addr_div_id']        =   $addr_div_id;
        $_SESSION['addr_dis_id']        =   $addr_dis_id;
        $_SESSION['addr_upazila_id']    =   $addr_upazila_id;
        $_SESSION['addr_union_id']      =   $addr_union_id;
        $_SESSION['division_id']        =   $division_id;
        $_SESSION['showroom_title']     =   $showroom_title;
        $_SESSION['showroom_address']   =   $showroom_address;
        $_SESSION['contact_name']       =   $contact_name;
        $_SESSION['contact_number']     =   $contact_number;
        $_SESSION['designation']        =   $designation;
        $_SESSION['email']              =   $email;
        $_SESSION['cov_area']           =   $cov_area;
        $_SESSION['error']              =   "Duplicate data found!.";
    }
    header("location: showroom_add.php");
    exit();
}
if(isset($_POST['showroomUpdate']) && !empty($_POST['showroomUpdate'])){
    $show_room_edit_id  =   $_POST['show_room_edit_id'];
    $addr_div_id        =   mysqli_real_escape_string($conn, $_POST['addr_div_id']);
    $addr_dis_id        =   mysqli_real_escape_string($conn, $_POST['addr_dis_id']);
    $addr_upazila_id    =   mysqli_real_escape_string($conn, $_POST['addr_upazila_id']);
    $addr_union_id      =   mysqli_real_escape_string($conn, $_POST['addr_union_id']);
    
    $division_id        =   mysqli_real_escape_string($conn, $_POST['division_id']);
    $showroom_title     =   mysqli_real_escape_string($conn, $_POST['showroom_title']);
    $showroom_address   =   mysqli_real_escape_string($conn, $_POST['showroom_address']);
    $contact_name       =   mysqli_real_escape_string($conn, $_POST['contact_name']);
    $contact_number     =   mysqli_real_escape_string($conn, $_POST['contact_number']);
    
    $designation        =   mysqli_real_escape_string($conn, $_POST['designation']);
    $email              =   mysqli_real_escape_string($conn, $_POST['email']);
    $cov_area           =   mysqli_real_escape_string($conn, $_POST['cov_area']);
    $table              =   "showrooms";
    $where              =   "showroom_title='$showroom_title' and id!=$show_room_edit_id";
    $isDuplicate    =   isDuplicateData($table, $where);
    if(!$isDuplicate){
        $error  =   false;
        $_SESSION['error_data'] =   [];
        if(empty($addr_div_id)){
            $error      =   true;
            $_SESSION['error_data']['addr_div_id']   =   'Address division is required!';
        }
        if(empty($addr_dis_id)){
            $error      =   true;
            $_SESSION['error_data']['addr_dis_id']   =   'Address district is required!';
        }
        if(empty($division_id)){
            $error      =   true;
            $_SESSION['error_data']['division_id']   =   'Concern division is required!';
        }
        if(empty($showroom_title)){
            $error      =   true;
            $_SESSION['error_data']['showroom_title']   =   'Showroom title is required!';
        }
        if(empty($showroom_address)){
            $error      =   true;
            $_SESSION['error_data']['showroom_address']   =   'Showroom address is required!';
        }
        if(empty($contact_name)){
            $error      =   true;
            $_SESSION['error_data']['contact_name']   =   'Contact name is required!';
        }
        if(empty($contact_number)){
            $error      =   true;
            $_SESSION['error_data']['contact_number']   =   'Contact number is required!';
        }
        if(empty($designation)){
            $error      =   true;
            $_SESSION['error_data']['designation']   =   'Designation is required!';
        }
        if($error){
            $_SESSION['error']    =   "Please fill up the required fields";
            $_SESSION['addr_div_id']        =   $addr_div_id;
            $_SESSION['addr_dis_id']        =   $addr_dis_id;
            $_SESSION['addr_upazila_id']    =   $addr_upazila_id;
            $_SESSION['addr_union_id']      =   $addr_union_id;
            $_SESSION['division_id']        =   $division_id;
            $_SESSION['showroom_title']     =   $showroom_title;
            $_SESSION['showroom_address']   =   $showroom_address;
            $_SESSION['contact_name']       =   $contact_name;
            $_SESSION['contact_number']     =   $contact_number;
            $_SESSION['designation']        =   $designation;
            $_SESSION['email']              =   $email;
            $_SESSION['cov_area']           =   $cov_area;
        }else{        
            $fields     =   [
                'addr_div_id'       =>  $addr_div_id,
                'addr_dis_id'       =>  $addr_dis_id,
                'addr_upazila_id'   =>  $addr_upazila_id,
                'addr_union_id'     =>  $addr_union_id,
                'division_id'       =>  $division_id,
                'showroom_title'    =>  $showroom_title,
                'showroom_address'  =>  $showroom_address,
                'contact_name'      =>  $contact_name,
                'contact_number'    =>  $contact_number,
                'designation'       =>  $designation,
                'email'             =>  $email,
                'cov_area'          =>  $cov_area,
            ];
            $sql    = "UPDATE showrooms set division_id='$division_id',addr_dis_id='$addr_dis_id',addr_div_id='$addr_div_id',addr_upazila_id='$addr_upazila_id',addr_union_id='$addr_union_id',showroom_title='$showroom_title',showroom_address='$showroom_address',contact_name='$contact_name',contact_number='$contact_number',designation='$designation',email='$email',cov_area='$cov_area' where id=$show_room_edit_id";
            $conn->query($sql); 
            unset($_SESSION['addr_div_id']);
            unset($_SESSION['addr_dis_id']);
            unset($_SESSION['addr_upazila_id']);
            unset($_SESSION['addr_union_id']);
            unset($_SESSION['division_id']);
            unset($_SESSION['showroom_title']);
            unset($_SESSION['showroom_address']);
            unset($_SESSION['contact_name']);
            unset($_SESSION['contact_number']);
            unset($_SESSION['designation']);
            unset($_SESSION['email']);
            unset($_SESSION['cov_area']);
            $_SESSION['success']    =   "Data have been successfully Updated.";
        }
    }else{
        $_SESSION['addr_div_id']        =   $addr_div_id;
        $_SESSION['addr_dis_id']        =   $addr_dis_id;
        $_SESSION['addr_upazila_id']    =   $addr_upazila_id;
        $_SESSION['addr_union_id']      =   $addr_union_id;
        $_SESSION['division_id']        =   $division_id;
        $_SESSION['showroom_title']     =   $showroom_title;
        $_SESSION['showroom_address']   =   $showroom_address;
        $_SESSION['contact_name']       =   $contact_name;
        $_SESSION['contact_number']     =   $contact_number;
        $_SESSION['designation']        =   $designation;
        $_SESSION['email']              =   $email;
        $_SESSION['cov_area']           =   $cov_area;
        $_SESSION['error']              =   "Duplicate data found!.";
    }
    header("location: showroom_edit.php?showroom_id=$show_room_edit_id");
    exit();
}
if (isset($_GET['process_type']) && $_GET['process_type'] == 'get_showroom_details_modal_data') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    
    $table      =   $_POST['table'];
    $fieldName  =   $_POST['fieldName'];
    $id         =   $_POST['id'];
    $response   = getDataRowByTableAndId($table, $id);
    if(isset($response) && !empty($response)){
        $division_id        =    $response->division_id;
        $showroom_title     =    $response->showroom_title;
        $showroom_address   =    $response->showroom_address;
        $contact_name       =    $response->contact_name;
        $contact_number     =    $response->contact_number;
        $designation        =    $response->designation;
        $email              =    $response->email;
    ?>
<div class="modal-header" style="background-color: lightgreen">
            <button type="button" class="close" data-dismiss="modal"><img src="admin/images/icon/close.png" /></button>
            <h2 class="modal-title">Showroom Details</h2>
        </div>
        <div class="modal-body">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Showroom</b> <a class="pull-right"><?php echo $showroom_title; ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Contact Name</b> <a class="pull-right"><?php echo (isset($contact_name) && !empty($contact_name) ? $contact_name: 'No Records'); ?></a>
                        </li>
                        <li class="list-group-item">
                            <?php
                                $designationTable   =   'designations where id='
                            ?>
                            <b>Designation</b> <a class="pull-right"><?php echo (isset($designation) && !empty($designation) ? getNameByIdAndTable('designations where id='.$designation): 'No Records'); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right"><?php echo (isset($email) && !empty($email) ? $email: 'No Records'); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Contact Number</b> <a class="pull-right"><?php echo (isset($contact_number) && !empty($contact_number) ? $contact_number: 'No Records'); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Address</b> <a class="pull-right"><?php echo (isset($showroom_address) && !empty($showroom_address) ? $showroom_address: 'No Records'); ?></a>
                        </li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    <?php }
}
if (isset($_GET['process_type']) && $_GET['process_type'] == 'getFrontendShowrooms') {
    include '../connection/connect.php';
    include '../helper/utilities.php';

    $column = array("p.id", "p.division_id","p.showroom_title");
    $query = "SELECT p.id, p.division_id, p.showroom_title FROM showrooms as p ";

    if (isset($_POST["division_id"]) && !empty($_POST["division_id"])) {
        $query .= " WHERE ";
        $query .= "p.division_id = " . $_POST["division_id"];
    }

    if (isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"])) {
        $query .= ' where p.division_id LIKE "%' . $_POST["search"]["value"] . '%" ';
        $query .= 'OR p.showroom_title LIKE "%' . $_POST["search"]["value"] . '%"';
    }

    if (isset($_POST["order"]) && !empty($_POST["order"])) {
        $query .= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
    } else {
        $query .= ' ORDER BY p.showroom_title ASC ';
    }

    $query1 = '';
    $limit  =   $_POST["length"];
    if(isset($limit) && $limit!=-1){
        $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }
    $number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

    $result = mysqli_query($conn, $query . $query1);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
        $table_name     =   "showrooms";
        $division_id    =   $row["division_id"];
        $primary_id     =   $row["id"];
        $table          =   "division where id=$division_id";
        
        $sub_array      = array();
        $sub_array[]    = getNameByIdAndTable($table);;
        $sub_array[]    = $row["showroom_title"];
        $sub_array[]    = '<button type="button" class="btn btn-small details-btn" onclick="get_showroom_details(\''.$primary_id.'\',\''.$table_name.'\');">Details</button>';
        $data[]         = $sub_array;
    }

    $output = array(
        "draw"              => intval($_POST["draw"]),
        "recordsTotal"      =>  getDataRowByTable('showrooms'),
        "recordsFiltered"   => $number_filter_row,
        "data"              => $data
       );
       
       echo json_encode($output);
       exit;
}