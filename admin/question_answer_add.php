<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Question Answer
            <small>Add</small>
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
                                            <option value="<?php echo $gdata->id; ?>"<?php if(isset($_SESSION['division_id']) && $_SESSION['division_id']==$gdata->id){ echo 'selected'; } ?>><?php echo $gdata->name; ?></option>
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
                                <input type="text" class="form-control" id="question_title" name="question_title" placeholder="Enter question" value="<?php if(isset($_SESSION['question_title']) && !empty($_SESSION['question_title'])){ echo $_SESSION['question_title']; } ?>">
                                <?php
                                    if(isset($_SESSION['error_data']['question_title']) && !empty($_SESSION['error_data']['question_title'])){
                                        echo '<div class="error_message">'.$_SESSION['error_data']['question_title'].'</div>';
                                        unset($_SESSION['error_data']['question_title']);
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Answer<span class="required_text"></span></label>
                                <textarea id="editor1" name="question_answer" rows="10" cols="80"><?php if(isset($_SESSION['question_answer']) && !empty($_SESSION['question_answer'])){ echo $_SESSION['question_answer']; } ?></textarea>
                                <?php
                                    if(isset($_SESSION['error_data']['question_answer']) && !empty($_SESSION['error_data']['question_answer'])){
                                        echo '<div class="error_message">'.$_SESSION['error_data']['question_answer'].'</div>';
                                        unset($_SESSION['error_data']['question_answer']);
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Tag</label>
                                <input type="text" class="form-control" id="question_tag" name="question_tag" placeholder="Enter Tag with comma separated value" value="<?php if(isset($_SESSION['question_tag']) && !empty($_SESSION['question_tag'])){ echo $_SESSION['question_tag']; } ?>">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <input type="submit" name="faqSave" value="Save" class="btn btn-primary" />
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
