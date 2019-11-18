<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<?php
//faq_id
    if(isset($_GET['faq_id']) && !empty($_GET['faq_id'])){
        $showroom_id    =   $_GET['faq_id'];
        $editTableData  =   getDataRowByTableAndId('faq',$showroom_id);  
    }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Question Answer
            <small>Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Question Answer</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="question_answer_list.php" class="create_link"><i class="fa fa-list"></i> List</a>
                    </div>
                    <?php include 'operation_message.php'; ?>
                    <form role="form" method="post" action="">
                        <div class="box-body">
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
                                            <option value="<?php echo $gdata->id; ?>"<?php if(isset($editTableData->division_id) && $editTableData->division_id==$gdata->id){ echo 'selected'; } ?>><?php echo $gdata->name; ?></option>
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
                            <div class="form-group">
                                <label for="exampleInputQuestion">Question<span class="required_text"></span></label>
                                <input type="text" class="form-control" id="question_title" name="question_title" placeholder="Enter question" value="<?php if(isset($editTableData->question_title) && !empty($editTableData->question_title)){ echo $editTableData->question_title; } ?>">
                                <?php
                                    if(isset($_SESSION['error_data']['question_title']) && !empty($_SESSION['error_data']['question_title'])){
                                        echo '<div class="error_message">'.$_SESSION['error_data']['question_title'].'</div>';
                                        unset($_SESSION['error_data']['question_title']);
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Answer<span class="required_text"></span></label>
                                <textarea id="editor1" name="question_answer" rows="10" cols="80"><?php if(isset($editTableData->question_answer) && !empty($editTableData->question_answer)){ echo $editTableData->question_answer; } ?></textarea>
                                <?php
                                    if(isset($_SESSION['error_data']['question_answer']) && !empty($_SESSION['error_data']['question_answer'])){
                                        echo '<div class="error_message">'.$_SESSION['error_data']['question_answer'].'</div>';
                                        unset($_SESSION['error_data']['question_answer']);
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Tag</label>
                                <input type="text" class="form-control" id="question_tag" name="question_tag" placeholder="Enter Tag with comma separated value" value="<?php if(isset($editTableData->question_tag) && !empty($editTableData->question_tag)){ echo $editTableData->question_tag; } ?>">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type='hidden' name="faq_edit_id" value="<?php echo $editTableData->id; ?>">
                            <input type="submit" name="faqUpdate" value="Update" class="btn btn-primary" />
                        </div>                        
                    </form>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
