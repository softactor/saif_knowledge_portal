<?php include 'header.php'; ?>
        <!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
        <div class="main-content-area">
            <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
            <section class="white" id="questions">
                <div class="container">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="listing">
                                <!-- Question Area Panel -->
                                <div class="listing-area">

                                    <!-- Question Listing -->
                                    <div class="listing-grid ">
                                        <div class="row">
                                            <div id="faq" class="col-md-12">
                                                <div class="jumbotron text-center">
                                                    <h1 class="service_title">Frequently asking questions</h1>
                                                </div>
                                                <div class="panel-group" id="accordion">
                                                    <?php
                                                        $table = 'faq';
                                                        $order = 'ASC';
                                                        $column = 'question_title';
                                                        $dataType = 'obj';
                                                        $tableData = getTableDataByTableName($table, $order, $column, $dataType);
                                                        if (isset($tableData) && !empty($tableData)) {
                                                            foreach ($tableData as $faq_key => $faq) {
                                                            ?>
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="panel-title">
                                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                                                           href="#collapse-<?php echo $faq_key; ?>">
                                                                            <span class="faq_question_title"><?php echo $faq->question_title; ?></span>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div id="collapse-<?php echo $faq_key; ?>" class="panel-collapse collapse">
                                                                    <div class="panel-body">
                                                                        <p>
                                                                            <?php echo $faq->question_answer; ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="panel-footer">
                                                                        <div class="btn-group btn-group-xs"><span class="btn">Was this question useful?</span>
                                                                            <a class="btn btn-success" href="#"><i class="fa fa-thumbs-up"></i> Yes</a> 
                                                                            <a class="btn btn-danger" href="#"><i class="fa fa-thumbs-down"></i> No</a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Question Listing End -->
                                </div>

                                <!-- Question Area Panel End -->
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
        