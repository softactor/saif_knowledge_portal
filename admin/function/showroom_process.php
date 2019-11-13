<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['showroomSave']) && !empty($_POST['showroomSave'])){
    $division_id        =   $_POST['division_id'];
    $showroom_title     =   $_POST['showroom_title'];
    $showroom_address   =   $_POST['showroom_address'];
    $contact_name       =   $_POST['contact_name'];
    $contact_number     =   $_POST['contact_number'];
    $table              =   "showrooms";
    $where              =   "showroom_title='$showroom_title'";
    $isDuplicate    =   isDuplicateData($table, $where);
    if(!$isDuplicate){
        $fields     =   [
            'division_id'       =>  $division_id,
            'showroom_title'    =>  $showroom_title,
            'showroom_address'  =>  $showroom_address,
            'contact_name'      =>  $contact_name,
            'contact_number'    =>  $contact_number,
        ];
        $insert =   saveData($table, $fields); 
        unset($_SESSION['division_id']);
        unset($_SESSION['showroom_title']);
        unset($_SESSION['showroom_address']);
        unset($_SESSION['contact_name']);
        unset($_SESSION['contact_number']);
        $_SESSION['success']    =   "Data have been successfully Saved.";
    }else{
        $_SESSION['division_id']        =   $division_id;
        $_SESSION['showroom_title']     =   $showroom_title;
        $_SESSION['showroom_address']   =   $showroom_address;
        $_SESSION['contact_name']       =   $contact_name;
        $_SESSION['contact_number']     =   $contact_number;
        $_SESSION['error']              =   "Duplicate data found!.";
    }
    header("location: showroom_add.php");
    exit();
}
