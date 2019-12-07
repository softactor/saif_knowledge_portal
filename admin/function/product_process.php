<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['ProductSave']) && !empty($_POST['ProductSave'])) {
    /**************************Product Image Save Start:****************/
    
    $productImage   =   $_FILES['product_image'];
    print '<pre>';
    print_r($productImage);
    print '</pre>';
    exit;
    
            
    $target_dir     = "uploads/";
    $target_file    = $target_dir . basename($_FILES["product_image"]["name"]);
    $uploadOk       = 1;
    $imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check          = getimagesize($_FILES["product_image"]["tmp_name"]);
    if($check == false) {
        $uploadOk      = 0;
        $_SESSION['error_data']['image_type'] = 'Please upload a image file';
    }
    // Check file size
    if ($_FILES["product_image"]["size"] > 500000) {
        $uploadOk      = 0;
        $_SESSION['error_data']['image_size'] = 'Sorry, Image file is too large.';
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $uploadOk      = 0;
        $_SESSION['error_data']['image_allowed_type'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $error = true;
        $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload image.';
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            $_SESSION['error_data']['image_uploaded_msg'] = "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
        } else {
            $error = true;
            $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload image.';
        }
    }
    
    print '<pre>';
    print_r($_SESSION);
    print '</pre>';
    exit;
    

    /**************************Product Image Save End:******************/
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
