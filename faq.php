<?php include 'header.php'; ?>
<!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
<div class="main-content-area">
    <!-- =-=-=-=-=-=-= Latest Questions  =-=-=-=-=-=-= -->
    <section class="white" id="questions">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="service_title">FAQ</h1>
                </div>
                <div class="col-md-8">
                    <form class="form-inline pull-right" action="/action_page.php">
                        <div class="form-group">
                            <input type="text" class="form-control" id="faq_search_bar" id="faq_search_bar" style="width: 449px; height: 49px;">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="division_id" id="division_id" onchange="getDivisionWiseFaq(this.value, 'faq');">
                                <option value="">Select Division</option>
                                <?php
                                    $table = "division";
                                    $groupData = getTableDataByTableName($table, 'asc', 'name', 'obj');
                                    if (isset($groupData) && !empty($groupData)) {
                                        foreach ($groupData as $gdata) {
                                            ?>
                                    <option value="<?php echo $gdata->id; ?>"<?php
                                    if (isset($_SESSION['division_id']) && $_SESSION['division_id'] == $gdata->id) {
                                        echo 'selected';
                                    }
                                    ?>><?php echo $gdata->name; ?></option>
                                            <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <!--<button type="submit" class="btn btn-default">Submit</button>-->
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="listing">
                        <!-- Question Area Panel -->
                        <div class="listing-area">
                            <!-- Question Listing -->
                            <div class="listing-grid ">
                                <div class="row">
                                    <div id="faq" class="col-md-12">
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
                                                    <div class="panel panel-default AccordionContainer">
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
                                            }
                                            ?>
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
        