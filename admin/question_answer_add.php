<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content TEST-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php include 'operation_message.php'; ?>
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
                    <form role="form" method="post" action="">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputQuestion">Question</label>
                                <input type="text" class="form-control" id="question_title" name="question_title" placeholder="Enter question">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Answer</label>
                                <textarea id="editor1" name="question_answer" rows="10" cols="80"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputQuestion">Tag</label>
                                <input type="text" class="form-control" id="question_tag" name="question_tag" placeholder="Enter Tag with comma separated value">
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
