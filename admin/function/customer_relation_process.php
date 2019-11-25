<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['CustomerInformationAdd']) && !empty($_POST['CustomerInformationAdd'])) {
    
    $division_id        = $_POST['division_id'];
    $user_type          = $_POST['user_type'];
    $first_name         = $_POST['first_name'];
    $last_name          = $_POST['last_name'];
    $addr_division      = $_POST['addr_division'];
    $addr_district      = $_POST['addr_district'];
    $addr_upazila       = $_POST['addr_upazila'];
    $addr_union         = $_POST['addr_union'];
    $dob                = $_POST['dob'];
    $email              = $_POST['email'];
    $contact            = $_POST['contact'];
    $is_using_product   = $_POST['is_using_product'];
    $is_anyone_contact  = $_POST['is_anyone_contact'];
    
    $table              = "customer_info";
    $where              = "contact='$contact'";
    $isDuplicate = isDuplicateData($table, $where);
    if (!$isDuplicate) {

        $error = false;
        $_SESSION['error_data'] = [];
        if (empty($division_id)) {
            $error = true;
            $_SESSION['error_data']['division_id'] = 'Concern division is required!';
        }
        if (empty($first_name)) {
            $error = true;
            $_SESSION['error_data']['first_name'] = 'First is required!';
        }
        if (empty($last_name)) {
            $error = true;
            $_SESSION['error_data']['last_name'] = 'Last is required!';
        }
        if (empty($user_type)) {
            $error = true;
            $_SESSION['error_data']['user_type'] = 'User Type is required!';
        }
        if (empty($addr_division)) {
            $error = true;
            $_SESSION['error_data']['addr_division'] = 'Address Division is required!';
        }
        if (empty($addr_district)) {
            $error = true;
            $_SESSION['error_data']['addr_district'] = 'Address District is required!';
        }
        if (empty($contact)) {
            $error = true;
            $_SESSION['error_data']['contact'] = 'Contact is required!';
        }
        if ($error) {
            $_SESSION['error']              = "Please fill up the required fields";
            $_SESSION['division_id']        = $division_id;
            $_SESSION['user_type']          = $user_type;
            $_SESSION['first_name']         = $first_name;
            $_SESSION['last_name']          = $last_name;
            $_SESSION['addr_division']      = $addr_division;
            $_SESSION['addr_district']      = $addr_district;
            $_SESSION['addr_upazila']       = $addr_upazila;
            $_SESSION['addr_union']         = $addr_union;
            $_SESSION['dob']                = $dob;
            $_SESSION['email']              = $email;
            $_SESSION['contact']            = $contact;
            $_SESSION['is_using_product']   = $is_using_product;
            $_SESSION['is_anyone_contact']  = $is_anyone_contact;
        } else {
            $fields = [
                'division_id'           => $division_id,
                'user_type'             => $user_type,
                'first_name'            => $first_name,
                'last_name'             => $last_name,
                'addr_division'         => $addr_division,
                'addr_district'         => $addr_district,
                'addr_upazila'          => $addr_upazila,
                'addr_union'            => $addr_union,
                'dob'                   => $dob,
                'email'                 => $email,
                'contact'               => $contact,
                'is_using_product'      => $is_using_product,
                'is_anyone_contact'     => $is_anyone_contact
            ];
            $insert                     = saveData($table, $fields);
            unset($_SESSION['division_id']);
            unset($_SESSION['user_type']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            unset($_SESSION['addr_division']);
            unset($_SESSION['addr_district']);
            unset($_SESSION['addr_upazila']);
            unset($_SESSION['addr_union']);
            unset($_SESSION['dob']);
            unset($_SESSION['email']);
            unset($_SESSION['contact']);
            unset($_SESSION['is_using_product']);
            unset($_SESSION['is_anyone_contact']);
            $_SESSION['success']        = "Data have been successfully Saved.";
        }
    } else {
        $_SESSION['division_id']        = $division_id;
        $_SESSION['user_type']          = $user_type;
        $_SESSION['first_name']         = $first_name;
        $_SESSION['last_name']          = $last_name;
        $_SESSION['addr_division']      = $addr_division;
        $_SESSION['addr_district']      = $addr_district;
        $_SESSION['addr_upazila']       = $addr_upazila;
        $_SESSION['addr_union']         = $addr_union;
        $_SESSION['dob']                = $dob;
        $_SESSION['email']              = $email;
        $_SESSION['contact']            = $contact;
        $_SESSION['is_using_product']   = $is_using_product;
        $_SESSION['is_anyone_contact']  = $is_anyone_contact;
        $_SESSION['error']          = "Duplicate data found!.";
    }
    header("location: customer_information_add.php");
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
