<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['ProductSave']) && !empty($_POST['ProductSave'])){
    $division_id        =   $_POST['division_id'];
    $product_title      =   $_POST['product_title'];
    $description        =   $_POST['description'];
    $tag                =   $_POST['tag'];
    $product_type       =   $_POST['product_type'];
    $table              =   "product_info";
    $where              =   "product_title='$product_title'";
    $isDuplicate    =   isDuplicateData($table, $where);
    if(!$isDuplicate){
        $fields     =   [
            'division_id'       =>  $division_id,
            'product_title'     =>  $product_title,
            'description'       =>  $description,
            'tag'               =>  $tag,
            'product_type'      =>  $product_type,
        ];
        $insert =   saveData($table, $fields); 
        unset($_SESSION['division_id']);
        unset($_SESSION['product_title']);
        unset($_SESSION['description']);
        unset($_SESSION['tag']);
        unset($_SESSION['product_type']);
        $_SESSION['success']    =   "Data have been successfully Saved.";
    }else{
        $_SESSION['division_id']        =   $division_id;
        $_SESSION['product_title']      =   $product_title;
        $_SESSION['description']        =   $description;
        $_SESSION['tag']                =   $tag;
        $_SESSION['product_type']       =   $product_type;
        $_SESSION['error']              =   "Duplicate data found!.";
    }
    header("location: product_add.php");
    exit();
}
