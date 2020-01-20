<?php include 'header.php'; ?>
<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
<!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
<div class="main-content-area">
    <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
    <section class="white" id="questions">
        <div class="container">
            <!-- Row -->
            <div class="row">
                <div class="col-md-4">
                    <h1 class="service_title">Product Information</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table id="product_data" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>
                                    <div class="form-group">
                                        <select class="form-control" id="division_id" name="division_id" onchange="get_division_wise_product_data(this.value);">
                                        <option value="">Select All</option>
                                            <?php
                                            $table = 'division';
                                            $order = 'ASC';
                                            $column = 'name';
                                            $dataType = 'obj';
                                            $divitableData = getTableDataByTableName($table, $order, $column, $dataType);
                                            if (isset($divitableData) && !empty($divitableData)) {
                                                foreach ($divitableData as $dividata) {
                                            ?>
                                                    <option value="<?php echo $dividata->id; ?>"><?php echo $dividata->name; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </th>
                                <th>Product</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                    </table>
                </div>
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