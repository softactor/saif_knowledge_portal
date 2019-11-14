<?php include 'header.php'; ?>
<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
<!-------------------------------------Datatables----->
<link rel="stylesheet" href="frontend/css/bootstrap.min.css">
<link rel="stylesheet" href="frontend/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="frontend/css/dataTable.custom.css">
<!-------------------------------------Datatables----->
<!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
<div class="main-content-area">
    <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
    <section class="section-padding-80 white" id="questions">
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="jumbotron text-center">
                        <h1 class="service_title">Product Information</h1>
                    </div>
                    <?php
                    $table = 'product_info';
                    $order = 'ASC';
                    $column = 'question_title';
                    $dataType = 'obj';
                    $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                    if (isset($tableData) && !empty($tableData)) {
                        ?>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Division</th>
                                    <th>Product</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sl = 1;
                                foreach ($tableData as $faq_key => $faq) {
                                    ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $faq->division_id; ?></td>
                                        <td><?php echo $faq->product_title; ?></td>
                                        <td>Details</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>                        
            </div>
            <!-- Row End -->
        </div>
        <!-- end container -->
    </section>
    <!-- =-=-=-=-=-=-= Latest Questions  End =-=-=-=-=-=-= -->
</div>
<!-- =-=-=-=-=-=-= Main Area End =-=-=-=-=-=-= -->
<?php include 'footer.php'; ?>
        