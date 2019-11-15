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
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- ./col -->
            <a href="question_answer_list.php" class="small-box-footer">
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                <?php
                                    $table = ((is_super_admin($_SESSION['logged']['user_type']))? 'faq': "faq where division_id=".$_SESSION['logged']['division_id']);  
                                    echo getDataRowByTable($table);
                                ?>
                            </h3>
                            <p>Question Answer</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>
                </div>
            </a>
            <a href="product_list.php" class="small-box-footer">
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                <?php
                                    $table = ((is_super_admin($_SESSION['logged']['user_type']))? 'product_info': "product_info where division_id=".$_SESSION['logged']['division_id']); 
                                    echo getDataRowByTable($table);
                                ?>
                            </h3>
                            <p>Product</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
            </a>
            <!-- ./col -->
            <a href="showroom_list.php" class="small-box-footer">
                <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                <?php
                                    $table = ((is_super_admin($_SESSION['logged']['user_type']))? 'showrooms': "showrooms where division_id=".$_SESSION['logged']['division_id']);
                                    echo getDataRowByTable($table);
                                ?>
                            </h3>
                            <p>Showroom</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div> 
            </a>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>
