<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['showroomSave']) && !empty($_POST['showroomSave'])){
    $addr_div_id        =   $_POST['addr_div_id'];
    $addr_dis_id        =   $_POST['addr_dis_id'];
    $addr_upazila_id    =   $_POST['addr_upazila_id'];
    $addr_union_id      =   $_POST['addr_union_id'];
    
    $division_id        =   $_POST['division_id'];
    $showroom_title     =   $_POST['showroom_title'];
    $showroom_address   =   $_POST['showroom_address'];
    $contact_name       =   $_POST['contact_name'];
    $contact_number     =   $_POST['contact_number'];
    
    $designation        =   $_POST['designation'];
    $email              =   $_POST['email'];
    $cov_area           =   $_POST['cov_area'];
    $table              =   "showrooms";
    $where              =   "showroom_title='$showroom_title'";
    $isDuplicate    =   isDuplicateData($table, $where);
    if(!$isDuplicate){
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
