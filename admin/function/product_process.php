<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['ProductSave']) && !empty($_POST['ProductSave'])) {
    $image_path     =   '';
    $excel_path     =   '';
    $pdf_path       =   '';
    /**************************Product Image Save End:******************/
    $division_id    = $_POST['division_id'];
    $product_title  = mysqli_real_escape_string($conn,$_POST['product_title']);
    $description    = $_POST['description'];
    $tag            = $_POST['tag'];
    $product_type   = (isset($_POST['product_type']) ? $_POST['product_type']: '');
    $table          = "product_info";
    $where          = "product_title='$product_title' and division_id='$division_id'";
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
        
        /**************************Product Image Save Start:****************/  
        if (isset($_FILES['product_image']['name']) && !empty($_FILES['product_image']['name'])) {
            $numberOfRowsTable = "product_info where division_id='$division_id'";
            $numberOfRows = getDataRowByTable($numberOfRowsTable);
            $currentProductId = $numberOfRows + 1;
            $target_dir = "uploads/";
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
            $productFileName = "product_" . $currentProductId . "." . $imageFileType;
            $target_file = $target_dir . $productFileName;
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["product_image"]["tmp_name"]);
            if ($check == false) {
                $uploadOk = 0;
                $_SESSION['error_data']['image_type'] = 'Please upload a image file';
            }
            // Check file size
            if ($_FILES["product_image"]["size"] > 500000) {
                $uploadOk = 0;
                $_SESSION['error_data']['image_size'] = 'Sorry, Image file is too large.';
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $uploadOk = 0;
                $_SESSION['error_data']['image_allowed_type'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error = true;
                $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload image.';
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                    $image_path = $productFileName;
                    $_SESSION['error_data']['image_uploaded_msg'] = "The file " . basename($_FILES["product_image"]["name"]) . " has been uploaded.";
                } else {
                    $error = true;
                    $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload image.';
                }
            }
        }
        /**************************Product Image Save End:****************/ 
        
        /**************************Product Excel Save Start:****************/  
        if (isset($_FILES['product_excel']['name']) && !empty($_FILES['product_excel']['name'])) {
            $numberOfRowsTable  = "product_info where division_id='$division_id'";
            $numberOfRows       = getDataRowByTable($numberOfRowsTable);
            $currentProductId   = $numberOfRows + 1;
            $target_dir         = "uploads/";
            $uploadOk           = 1;
            $imageFileType      = strtolower(pathinfo($_FILES['product_excel']['name'], PATHINFO_EXTENSION));
            $productFileName    = "excel_" . $currentProductId . "." . $imageFileType;
            $target_file        = $target_dir . $productFileName;
            // Allow certain file formats
            if ($imageFileType != "xlsx") {
                $uploadOk = 0;
                $_SESSION['error_data']['image_allowed_type'] = 'Sorry, only Excel files are allowed.';
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error = true;
                $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload Excel File.';
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["product_excel"]["tmp_name"], $target_file)) {
                    $excel_path = $productFileName;
                    $_SESSION['error_data']['image_uploaded_msg'] = "The file " . basename($_FILES["product_excel"]["name"]) . " has been uploaded.";
                } else {
                    $error = true;
                    $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload image.';
                }
            }
        }
        /**************************Product Excel Save End:****************/
        
        /**************************Product PDF Save Start:****************/  
        if (isset($_FILES['product_pdf']['name']) && !empty($_FILES['product_pdf']['name'])) {
            $numberOfRowsTable  = "product_info where division_id='$division_id'";
            $numberOfRows       = getDataRowByTable($numberOfRowsTable);
            $currentProductId   = $numberOfRows + 1;
            $target_dir         = "uploads/";
            $uploadOk           = 1;
            $imageFileType      = strtolower(pathinfo($_FILES['product_pdf']['name'], PATHINFO_EXTENSION));
            $productFileName    = "pdf_" . $currentProductId . "." . $imageFileType;
            $target_file        = $target_dir . $productFileName;
            // Allow certain file formats
            if ($imageFileType != "pdf") {
                $uploadOk = 0;
                $_SESSION['error_data']['image_allowed_type'] = 'Sorry, only Excel files are allowed.';
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error = true;
                $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload Excel File.';
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["product_pdf"]["tmp_name"], $target_file)) {
                    $pdf_path = $productFileName;
                    $_SESSION['error_data']['image_uploaded_msg'] = "The file " . basename($_FILES["product_pdf"]["name"]) . " has been uploaded.";
                } else {
                    $error = true;
                    $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload image.';
                }
            }
        }
        /**************************Product Excel Save End:****************/
        
        if ($error) {
            $_SESSION['error']          = "Please fill up the required fields";
            $_SESSION['division_id']    = $division_id;
            $_SESSION['product_title']  = $product_title;
            $_SESSION['product_type']   = $product_type;
            $_SESSION['description']    = $description;
            $_SESSION['tag']            = $tag;
        } else {
            $fields = [
                'division_id'       => $division_id,
                'product_title'     => $product_title,
                'description'       => $description,
                'tag'               => $tag,
                'product_type'      => $product_type,
                'image_path'        => $image_path,
                'excel_path'        => $excel_path,
                'pdf_path'          => $pdf_path,
            ];
            $insert = saveData($table, $fields);
            print '<pre>';
            print_r($insert);
            print '</pre>';
            exit;
            
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
        $image_path     =    (isset($response->image_path) && !empty($response->image_path) ? $response->image_path:'');
        //excel_path
        $excel_path     =    (isset($response->excel_path) && !empty($response->excel_path) ? $response->excel_path:'');
        //pdf_path
        $pdf_path     =    (isset($response->pdf_path) && !empty($response->pdf_path) ? $response->pdf_path:'');
        $tag            =    $response->tag;
        $product_type   =    $response->product_type;
        $description   =     $response->description;
    ?>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><img src="../admin/images/icon/close.png" /></button>
            <h4 class="modal-title"><?php echo $product_title; ?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="front_product_files" style="float: right;">
                        <?php if (isset($image_path)) { ?>
                            <div class="product_files">
                                <img src="admin/uploads/<?php echo $image_path; ?>" width="100">
                            </div>
                        <?php }
                        ?>
                        <?php if (isset($excel_path)) { ?>
                            <div class="product_files">
                                <a href="admin/uploads/<?php echo $excel_path; ?>" target="_blank"><img src="admin/images/icon/100X100_excel.png"></a>
                            </div>
                        <?php }
                        ?>
                        <?php if (isset($pdf_path)) { ?>
                            <div class="product_files">
                                <a href="admin/uploads/<?php echo $pdf_path; ?>" target="_blank"><img src="admin/images/icon/100X100_pdf.png"></a>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo htmlspecialchars_decode($description); ?>
                </div>
            </div>
        </div>
    <?php }
}

if (isset($_POST['productUpdate']) && !empty($_POST['productUpdate'])) {
    $product_edit_id     = $_POST['product_edit_id'];
    $division_id         = $_POST['division_id'];
    $product_title       = mysqli_real_escape_string($conn,$_POST['product_title']);
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
        
        $table      = "product_info where id=$product_edit_id";
        $pdata      = getDataRowIdAndTable($table);
        
        /**************************Product Image Save Start:****************/  
        if (isset($_FILES['product_image']['name']) && !empty($_FILES['product_image']['name'])) {
            $currentProductId = $product_edit_id;
            $target_dir = "uploads/";
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION));
            $productFileName = "product_" . $currentProductId . "." . $imageFileType;
            $target_file = $target_dir . $productFileName;
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["product_image"]["tmp_name"]);
            if ($check == false) {
                $uploadOk = 0;
                $_SESSION['error_data']['image_type'] = 'Please upload a image file';
            }
            // Check file size
            if ($_FILES["product_image"]["size"] > 5000000) {
                $uploadOk = 0;
                $_SESSION['error_data']['image_size'] = 'Sorry, Image file is too large.';
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $uploadOk = 0;
                $_SESSION['error_data']['image_allowed_type'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error = true;
                $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload image.';
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                    $image_path = $productFileName;
                    $_SESSION['error_data']['image_uploaded_msg'] = "The file " . basename($_FILES["product_image"]["name"]) . " has been uploaded.";
                } else {
                    $error = true;
                    $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload image.';
                }
            }
        }
        /**************************Product Image Save End:****************/ 
        
        /**************************Product Excel Save Start:****************/  
        if (isset($_FILES['product_excel']['name']) && !empty($_FILES['product_excel']['name'])) {
            $currentProductId   = $product_edit_id;
            $target_dir         = "uploads/";
            $uploadOk           = 1;
            $imageFileType      = strtolower(pathinfo($_FILES['product_excel']['name'], PATHINFO_EXTENSION));
            $productFileName    = "excel_" . $currentProductId . "." . $imageFileType;
            $target_file        = $target_dir . $productFileName;
            // Allow certain file formats
            if ($imageFileType != "xlsx") {
                $uploadOk = 0;
                $_SESSION['error_data']['image_allowed_type'] = 'Sorry, only Excel files are allowed.';
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error = true;
                $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload Excel File.';
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["product_excel"]["tmp_name"], $target_file)) {
                    $excel_path = $productFileName;
                    $_SESSION['error_data']['image_uploaded_msg'] = "The file " . basename($_FILES["product_excel"]["name"]) . " has been uploaded.";
                } else {
                    $error = true;
                    $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload image.';
                }
            }
        }
        /**************************Product Excel Save End:****************/
        
        /**************************Product PDF Save Start:****************/  
        if (isset($_FILES['product_pdf']['name']) && !empty($_FILES['product_pdf']['name'])) {
            $currentProductId   = $product_edit_id;
            $target_dir         = "uploads/";
            $uploadOk           = 1;
            $imageFileType      = strtolower(pathinfo($_FILES['product_pdf']['name'], PATHINFO_EXTENSION));
            $productFileName    = "pdf_" . $currentProductId . "." . $imageFileType;
            $target_file        = $target_dir . $productFileName;
            // Allow certain file formats
            if ($imageFileType != "pdf") {
                $uploadOk = 0;
                $_SESSION['error_data']['image_allowed_type'] = 'Sorry, only Excel files are allowed.';
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error = true;
                $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload Excel File.';
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["product_pdf"]["tmp_name"], $target_file)) {
                    $pdf_path = $productFileName;
                    $_SESSION['error_data']['image_uploaded_msg'] = "The file " . basename($_FILES["product_pdf"]["name"]) . " has been uploaded.";
                } else {
                    $error = true;
                    $_SESSION['error_data']['image_uploaded_msg'] = 'Sorry, Failed to upload image.';
                }
            }
        }
        /**************************Product Excel Save End:****************/
        
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
                'image_path'        => (isset($image_path) && !empty($image_path) ? : $pdata->image_path),
                'excel_path'        => (isset($excel_path) && !empty($excel_path) ? : $pdata->excel_path),
                'pdf_path'          => (isset($pdf_path) && !empty($pdf_path) ? : $pdata->pdf_path)
            ];
            $image_path        = (isset($image_path) && !empty($image_path) ? $image_path: $pdata->image_path);
            $excel_path        = (isset($excel_path) && !empty($excel_path) ? $excel_path: $pdata->excel_path);
            $pdf_path          = (isset($pdf_path) && !empty($pdf_path) ? $pdf_path: $pdata->pdf_path);
            $sql            = "UPDATE product_info set division_id='$division_id',product_title='$product_title',description='$description',image_path='$image_path',excel_path='$excel_path',pdf_path='$pdf_path',product_type='$product_type',tag='$tag' where id=$product_edit_id";
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
