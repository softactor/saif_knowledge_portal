<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['faqSave']) && !empty($_POST['faqSave'])) {
    $division_id        = $_POST['division_id'];
    $question_title     = mysqli_real_escape_string($conn,$_POST['question_title']);
    $question_answer    = $_POST['question_answer'];
    $question_tag       = $_POST['question_tag'];
    $table              = "faq";
    $where              = "question_title='$question_title'";
    $isDuplicate        = isDuplicateData($table, $where);
    if (!$isDuplicate) {
        $error = false;
        $_SESSION['error_data'] = [];
        if (empty($division_id)) {
            $error = true;
            $_SESSION['error_data']['division_id'] = 'Concern division is required!';
        }
        if (empty($question_title)) {
            $error = true;
            $_SESSION['error_data']['question_title'] = 'Question title is required!';
        }
        if (empty($question_answer)) {
            $error = true;
            $_SESSION['error_data']['question_answer'] = 'Question answer is required!';
        }
        if ($error) {
            $_SESSION['error']              = "Please fill up the required fields";
            $_SESSION['division_id']        = $division_id;
            $_SESSION['question_title']     = $question_title;
            $_SESSION['question_answer']    = $question_answer;
            $_SESSION['question_tag']       = $question_tag;
        } else {
            $fields = [
                'division_id' => $division_id,
                'question_title' => $question_title,
                'question_answer' => $question_answer,
                'question_tag' => $question_tag
            ];
            $insert = saveData($table, $fields);
            unset($_SESSION['division_id']);
            unset($_SESSION['question_title']);
            unset($_SESSION['question_answer']);
            unset($_SESSION['question_tag']);
            $_SESSION['success'] = "Data have been successfully Saved.";
        }
    } else {
        $_SESSION['division_id'] = $division_id;
        $_SESSION['question_title'] = $question_title;
        $_SESSION['question_answer'] = $question_answer;
        $_SESSION['question_tag'] = $question_tag;
        $_SESSION['error'] = "Duplicate data found!.";
    }
    header("location: question_answer_add.php");
    exit();
}
if (isset($_POST['faqUpdate']) && !empty($_POST['faqUpdate'])) {
    $faq_edit_id        = $_POST['faq_edit_id'];
    $division_id        = $_POST['division_id'];
    $question_title     = mysqli_real_escape_string($conn,$_POST['question_title']);
    $question_answer    = $_POST['question_answer'];
    $question_tag       = $_POST['question_tag'];
    $table              = "faq";
    $where              = "question_title='$question_title' and id!=$faq_edit_id";
    $isDuplicate        = isDuplicateData($table, $where);
    if (!$isDuplicate) {
        $error = false;
        $_SESSION['error_data'] = [];
        if (empty($division_id)) {
            $error = true;
            $_SESSION['error_data']['division_id'] = 'Concern division is required!';
        }
        if (empty($question_title)) {
            $error = true;
            $_SESSION['error_data']['question_title'] = 'Question title is required!';
        }
        if (empty($question_answer)) {
            $error = true;
            $_SESSION['error_data']['question_answer'] = 'Question answer is required!';
        }
        if ($error) {
            $_SESSION['error']              = "Please fill up the required fields";
            $_SESSION['division_id']        = $division_id;
            $_SESSION['question_title']     = $question_title;
            $_SESSION['question_answer']    = $question_answer;
            $_SESSION['question_tag']       = $question_tag;
        } else {
            $fields = [
                'division_id' => $division_id,
                'question_title' => $question_title,
                'question_answer' => $question_answer,
                'question_tag' => $question_tag
            ];
            $sql    = "UPDATE faq set division_id='$division_id',question_title='$question_title',question_answer='$question_answer',question_tag='$question_tag' where id=$faq_edit_id";
            $conn->query($sql); 
            unset($_SESSION['division_id']);
            unset($_SESSION['question_title']);
            unset($_SESSION['question_answer']);
            unset($_SESSION['question_tag']);
            $_SESSION['success'] = "Data have been successfully Updated.";
        }
    } else {
        $_SESSION['division_id'] = $division_id;
        $_SESSION['question_title'] = $question_title;
        $_SESSION['question_answer'] = $question_answer;
        $_SESSION['question_tag'] = $question_tag;
        $_SESSION['error'] = "Duplicate data found!.";
    }
    //question_answer_edit.php?faq_id
    header("location: question_answer_edit.php?faq_id=$faq_edit_id");
    exit();
}
if (isset($_GET['process_type']) && $_GET['process_type'] == 'get_division_wise_faq') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    
    $division_id=   $_POST['division_id'];
    $table      =   $_POST['table'].' where division_id='.$division_id;
    $tableData   = getTableDataByTableName($table, $order = 'asc', $column='question_title', $dataType = 'obj');
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
    }
}