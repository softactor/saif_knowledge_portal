<?php include 'header.php'; ?>
<!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
<div class="main-content-area">
    <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
    <section class="section-padding-80 white" id="questions">
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="jumbotron text-center">
                        <h1 class="service_title">Showroom Information</h1>
                    </div>
                    <?php
                    $table = 'showrooms';
                    $order = 'ASC';
                    $column = 'showroom_title';
                    $dataType = 'obj';
                    $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                    if (isset($tableData) && !empty($tableData)) {
                        ?>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Division</th>
                                    <th>Showroom</th>
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
                                        <td>
                                            <?php
                                            if (isset($faq->division_id) && !empty($faq->division_id)) {
                                                $table = "division where id=$faq->division_id";
                                                echo $divisionData = getNameByIdAndTable($table);
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $faq->showroom_title; ?></td>
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
        