<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['process_type']) && $_GET['process_type'] == 'common_delete') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    
    $table      =   $_POST['table'];
    $fieldName  =   $_POST['fieldName'];
    $id         =   $_POST['delete_id'];
    $response   =   deleteRecordByTableAndId($table,$fieldName,$id);
    echo json_encode($response);
}
if (isset($_GET['process_type']) && $_GET['process_type'] == 'productSingleFileDel') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    
    $delete_id      = $_POST['delete_id'];
    $fieldName      = $_POST['fieldName'];
    $sql            = "UPDATE product_info set $fieldName='' WHERE id=$delete_id";
    $conn->query($sql);
    $feedback       =   [
        'status'    =>  'success',
        'message'   =>  'Item has been successfully deleted.'
    ];
    echo json_encode($feedback);
}
if (isset($_GET['process_type']) && $_GET['process_type'] == 'common_data_get') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    
    $table      =   $_POST['table'];
    $fieldName  =   $_POST['fieldName'];
    $id         =   $_POST['id'];
    $response   = getDataRowByTableAndId($table, $id);
    if(isset($response) && !empty($response)){
        $status     =   'success';
        $data       =   $response;
        $message    =   'Data found';
    }else{
        $status     =   'error';
        $data       =   '';
        $message    =   'Data not found';
    }
    $feedback       =   [
        'status'    =>  $status,
        'data'      =>  $data,
        'message'   =>  $message
    ];
    echo json_encode($feedback);
}