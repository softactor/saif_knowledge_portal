<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<?php
    if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
        $product_id     =   $_GET['product_id'];
        $tableData       =   getDataRowByTableAndId('product_info',$product_id);   
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">        
        <h1>
            Product
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Product</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="product_list.php" class="create_link"><i class="fa fa-list"></i> List</a>
                    </div>
                    <?php include 'operation_message.php'; ?>
                    <form role="form" method="post" action="" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Division<span class="required_text"></span></label>
                                        <select class="form-control" id="division_id" name="division_id">
                                            <option value="">Select</option>
                                            <?php
                                            $table = "division";
                                            $groupData = getTableDataByTableName($table, 'asc', 'name', 'obj');
                                            if (isset($groupData) && !empty($groupData)) {
                                                foreach ($groupData as $gdata) {
                                                    ?>
                                                    <option value="<?php echo $gdata->id; ?>"<?php if(isset($tableData->division_id) && $tableData->division_id == $gdata->id){ echo 'selected'; } ?>><?php echo $gdata->name; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php
                                    if(isset($_SESSION['error_data']['division_id']) && !empty($_SESSION['error_data']['division_id'])){
                                            echo '<div class="error_message">'.$_SESSION['error_data']['division_id'].'</div>';
                                            unset($_SESSION['error_data']['division_id']);
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Product Type<span class="required_text"></span></label>
                                        <div class="radio">
                                            <label class="radio-inline"><input type="radio" name="product_type" value="1" <?php if(isset($tableData->product_type) && $tableData->product_type == 1){ echo 'checked'; } ?>>Existing</label>
                                            <label class="radio-inline"><input type="radio" name="product_type" value="2" <?php if(isset($tableData->product_type) && $tableData->product_type == 2){ echo 'checked'; } ?>>Upcoming</label>
                                        </div>
                                        <?php
                                    if(isset($_SESSION['error_data']['product_type']) && !empty($_SESSION['error_data']['product_type'])){
                                            echo '<div class="error_message">'.$_SESSION['error_data']['product_type'].'</div>';
                                            unset($_SESSION['error_data']['product_type']);
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Product Title<span class="required_text"></span></label>
                                <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Enter product title" value="<?php if(isset($tableData->product_title) && !empty($tableData->product_title)){ echo $tableData->product_title; } ?>">
                                <?php
                                    if(isset($_SESSION['error_data']['product_title']) && !empty($_SESSION['error_data']['product_title'])){
                                        echo '<div class="error_message">'.$_SESSION['error_data']['product_title'].'</div>';
                                        unset($_SESSION['error_data']['product_title']);
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Description<span class="required_text"></span></label>
                                <textarea id="editor1" name="description" rows="10" cols="80"><?php if(isset($tableData->description) && !empty($tableData->description)){ echo $tableData->description; } ?></textarea>
                                <?php
                                    if(isset($_SESSION['error_data']['description']) && !empty($_SESSION['error_data']['description'])){
                                        echo '<div class="error_message">'.$_SESSION['error_data']['description'].'</div>';
                                        unset($_SESSION['error_data']['description']);
                                    }
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product_files_section">
                                        <?php if (isset($tableData->image_path) && !empty($tableData->image_path)) { ?>
                                        <div class="product_files" id="list_row_id_image_path">
                                            <div class="product_file_delete_section" onclick="delete_product_item('<?php echo $tableData->id ?>', 'image_path')">
                                                <a class="btn btn-social-icon btn-google"><i class="fa fa-close"></i></a>
                                            </div>
                                            <img src="uploads/<?php echo $tableData->image_path; ?>" width="100">                                            
                                        </div>
                                        <?php }
                                        ?>
                                        <?php if (isset($tableData->excel_path) && !empty($tableData->excel_path)) { ?>
                                        <div class="product_files" id="list_row_id_excel_path">
                                            <div class="product_file_delete_section" onclick="delete_product_item('<?php echo $tableData->id ?>', 'excel_path')">
                                                <a class="btn btn-social-icon btn-google"><i class="fa fa-close"></i></a>
                                            </div>
                                            <a href="uploads/<?php echo $tableData->excel_path; ?>" target="_blank"><img src="images/icon/100X100_excel.png"></a>
                                        </div>
                                        <?php }
                                        ?>
                                        <?php if (isset($tableData->pdf_path) && !empty($tableData->pdf_path)) { ?>
                                        <div class="product_files" id="list_row_id_pdf_path">
                                            <div class="product_file_delete_section" onclick="delete_product_item('<?php echo $tableData->id ?>', 'pdf_path')">
                                                <a class="btn btn-social-icon btn-google"><i class="fa fa-close"></i></a>
                                            </div>
                                            <a href="uploads/<?php echo $tableData->pdf_path; ?>" target="_blank"><img src="images/icon/100X100_pdf.png"></a>
                                        </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Product Image</label>
                                        <input type="file" class="form-control" id="product_image" name="product_image">
                                        <?php
                                            if(isset($_SESSION['error_data']['image_type']) && !empty($_SESSION['error_data']['image_type'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['image_type'].'</div>';
                                                unset($_SESSION['error_data']['image_type']);
                                            }
                                            if(isset($_SESSION['error_data']['image_size']) && !empty($_SESSION['error_data']['image_size'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['image_size'].'</div>';
                                                unset($_SESSION['error_data']['image_size']);
                                            }
                                            if(isset($_SESSION['error_data']['image_allowed_type']) && !empty($_SESSION['error_data']['image_allowed_type'])){
                                                echo '<div class="error_message">'.$_SESSION['error_data']['image_allowed_type'].'</div>';
                                                unset($_SESSION['error_data']['image_allowed_type']);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Product Excel</label>
                                        <input type="file" class="form-control" id="product_excel" name="product_excel">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputQuestion">Product PDF</label>
                                        <input type="file" class="form-control" id="product_pdf" name="product_pdf">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Tag</label>
                                <input type="text" class="form-control" id="tag" name="tag" placeholder="Enter Tag with comma separated value" value="<?php if(isset($tableData->tag) && !empty($tableData->tag)){ echo $tableData->tag; } ?>">
                            </div>                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type='hidden' name="product_edit_id" value="<?php echo $tableData->id; ?>">
                            <input type="submit" name="productUpdate" value="Update" class="btn btn-primary" />
                        </div>
                    </form>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
