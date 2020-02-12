<!-- Modal -->
<div id="new_quires_entry_modal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:85%">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="admin/images/icon/close.png" /></button>
            </div>
            <div class="modal-body">
                <form role="form" action="" id="new_quires_entry_form">
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
                                        <option value="<?php echo $gdata->id; ?>"<?php if (isset($_SESSION['division_id']) && $_SESSION['division_id'] == $gdata->id) {
                                    echo 'selected';
                                } ?>><?php echo $gdata->name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <?php
                            if (isset($_SESSION['error_data']['division_id']) && !empty($_SESSION['error_data']['division_id'])) {
                                echo '<div class="error_message">' . $_SESSION['error_data']['division_id'] . '</div>';
                                unset($_SESSION['error_data']['division_id']);
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputQuestion">Question<span class="required_text"></span></label>
                            <input type="text" class="form-control" id="question_title" name="question_title" placeholder="Enter question" value="<?php if (isset($_SESSION['question_title']) && !empty($_SESSION['question_title'])) {
                                echo $_SESSION['question_title'];
                            } ?>">
                            <?php
                            if (isset($_SESSION['error_data']['question_title']) && !empty($_SESSION['error_data']['question_title'])) {
                                echo '<div class="error_message">' . $_SESSION['error_data']['question_title'] . '</div>';
                                unset($_SESSION['error_data']['question_title']);
                            }
                            ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="button" name="faqSave" value="Save" class="btn btn-default" onclick="saveNewQueryData();">Send</button>
                    </div>                        
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>