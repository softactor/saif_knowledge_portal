<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['ProductSave']) && !empty($_POST['ProductSave'])) {
    $division_id    = $_POST['division_id'];
    $product_title  = $_POST['product_title'];
    $description    = $_POST['description'];
    $tag            = $_POST['tag'];
    $product_type   = $_POST['product_type'];
    $table          = "product_info";
    $where          = "product_title='$product_title'";
    $isDuplicate    = isDuplicateData($table, $where);
    if (!$isDuplicate) {
        $error = false;
        $_SESSION['error_data'] = [];
        if (empty($division_id)) {
            $error = true;
            $_SESSION['error_data']['division_id'] = 'Concern division is required!';
        }
        if (empty($product_title)) {
            $error = true;
            $_SESSION['error_data']['product_title'] = 'Product title is required!';
        }
        if (empty($product_type)) {
            $error = true;
            $_SESSION['error_data']['product_type'] = 'Product Type is required!';
        }
        if (empty($description)) {
            $error = true;
            $_SESSION['error_data']['description'] = 'Description is required!';
        }
        if ($error) {
            $_SESSION['error']          = "Please fill up the required fields";
            $_SESSION['division_id']    = $division_id;
            $_SESSION['product_title']  = $product_title;
            $_SESSION['product_type']   = $product_type;
            $_SESSION['description']    = $description;
            $_SESSION['tag']            = $tag;
        } else {
            $fields = [
                'division_id' => $division_id,
                'product_title' => $product_title,
                'description' => $description,
                'tag' => $tag,
                'product_type' => $product_type,
            ];
            $insert = saveData($table, $fields);
            unset($_SESSION['division_id']);
            unset($_SESSION['product_title']);
            unset($_SESSION['description']);
            unset($_SESSION['tag']);
            unset($_SESSION['product_type']);
            $_SESSION['success'] = "Data have been successfully Saved.";
        }
    } else {
        $_SESSION['division_id'] = $division_id;
        $_SESSION['product_title'] = $product_title;
        $_SESSION['description'] = $description;
        $_SESSION['tag'] = $tag;
        $_SESSION['product_type'] = $product_type;
        $_SESSION['error'] = "Duplicate data found!.";
    }
    header("location: product_add.php");
    exit();
}
if (isset($_GET['process_type']) && $_GET['process_type'] == 'get_product_details_modal_data') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    
    $table      =   $_POST['table'];
    $fieldName  =   $_POST['fieldName'];
    $id         =   $_POST['id'];
    $response   = getDataRowByTableAndId($table, $id);
    if(isset($response) && !empty($response)){
        $division_id    =    $response->division_id;
        $product_title  =    $response->product_title;
        $image_path     =    $response->image_path;
        $tag            =    $response->tag;
        $product_type   =    $response->product_type;
        $description   =    $response->description;
    ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo $product_title; ?></h4>
        </div>
        <div class="modal-body">
            <?php echo htmlspecialchars_decode($description); ?>
        </div>
    <?php }
}

if (isset($_POST['productUpdate']) && !empty($_POST['productUpdate'])) {
    $product_edit_id     = $_POST['product_edit_id'];
    $division_id         = $_POST['division_id'];
    $product_title       = $_POST['product_title'];
    $description         = $_POST['description'];
    $tag                 = $_POST['tag'];
    $product_type        = $_POST['product_type'];
    $table               = "product_info";
    $where               = "product_title='$product_title' and id!=$product_edit_id";
    $isDuplicate = isDuplicateData($table, $where);
    if (!$isDuplicate) {

        $error = false;
        $_SESSION['error_data'] = [];
        if (empty($division_id)) {
            $error = true;
            $_SESSION['error_data']['division_id'] = 'Concern division is required!';
        }
        if (empty($product_title)) {
            $error = true;
            $_SESSION['error_data']['product_title'] = 'Product title is required!';
        }
        if (empty($product_type)) {
            $error = true;
            $_SESSION['error_data']['product_type'] = 'Product Type is required!';
        }
        if (empty($description)) {
            $error = true;
            $_SESSION['error_data']['description'] = 'Description is required!';
        }
        if ($error) {
            $_SESSION['error']          = "Please fill up the required fields";
            $_SESSION['division_id']    = $division_id;
            $_SESSION['product_title']  = $product_title;
            $_SESSION['product_type']   = $product_type;
            $_SESSION['description']    = $description;
            $_SESSION['tag']            = $tag;
        } else {
            $fields = [
                'division_id' => $division_id,
                'product_title' => $product_title,
                'description' => $description,
                'tag' => $tag,
                'product_type' => $product_type,
            ];
            $sql            = "UPDATE product_info set division_id='$division_id',product_title='$product_title',description='$description',product_type='$product_type',tag='$tag' where id=$product_edit_id";
            $conn->query($sql);
            unset($_SESSION['division_id']);
            unset($_SESSION['product_title']);
            unset($_SESSION['description']);
            unset($_SESSION['tag']);
            unset($_SESSION['product_type']);
            $_SESSION['success'] = "Data have been successfully Saved.";
        }
    } else {
        $_SESSION['division_id'] = $division_id;
        $_SESSION['product_title'] = $product_title;
        $_SESSION['description'] = $description;
        $_SESSION['tag'] = $tag;
        $_SESSION['product_type'] = $product_type;
        $_SESSION['error'] = "Duplicate data found!.";
    }
    header("location: product_edit.php?product_id=$product_edit_id");
    exit();
}
