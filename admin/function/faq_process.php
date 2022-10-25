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
    $is_status          = $_POST['is_status'];
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
                'division_id'       => $division_id,
                'question_title'    => $question_title,
                'question_answer'   => $question_answer,
                'question_tag'      => $question_tag,
                'is_status'         => $is_status
            ];
            $sql    = "UPDATE faq set division_id='$division_id',question_title='$question_title',question_answer='$question_answer',question_tag='$question_tag',is_status='$is_status' where id=$faq_edit_id";
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
    $table      =   $_POST['table'].' where is_status=1 AND division_id='.$division_id;
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
if (isset($_GET['process_type']) && $_GET['process_type'] == 'getAllFAQData') {
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $division_id_where  =   false;
    $is_status_where    =   false;
    $column = array("p.id", "p.division_id","p.question_title","p.is_status");
    $query = "SELECT p.id, p.division_id, p.question_title, p.is_status FROM faq as p WHERE 1 ";

    if (isset($_POST["division_id"]) && !empty($_POST["division_id"])) {
        $query .= " AND p.division_id = " . $_POST["division_id"];
        $division_id_where  =   true;
    }
    
    if (isset($_POST["is_status"]) && $_POST["is_status"]!="") {
        $query .= " AND p.is_status = " . $_POST["is_status"];
        $is_status_where  =   true;
    }

    if (isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"])) {
        $query .= ' AND ( p.division_id LIKE "%' . $_POST["search"]["value"] . '%" ';
        $query .= 'OR p.question_title LIKE "%' . $_POST["search"]["value"] . '%"';
        $query .= 'OR p.is_status LIKE "%' . $_POST["search"]["value"] . '%" )';
    }

    if (isset($_POST["order"]) && !empty($_POST["order"])) {
        $query .= ' ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
    } else {
        $query .= ' ORDER BY p.question_title ASC ';
    }

    $query1 = '';
    $limit  =   $_POST["length"];
    if(isset($limit) && $limit!=-1){
        $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
    }
    //echo $query; exit;
    $number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

    $result = mysqli_query($conn, $query . $query1);

    $data = array();

    while ($row = mysqli_fetch_array($result)) {
        $details_link   =   "";
        $is_status      =   "";
        $table_name     =   "faq";
        $division_id    =   $row["division_id"];
        $primary_id     =   $row["id"];
        $table          =   "division where id=$division_id";
        if($row['is_status'] == 0){
            $is_status  =   'Unapprove';
        }elseif($row['is_status'] == 1){
            $is_status  =   'Approved';
        }
        $details_link.='<a href="question_answer_edit.php?faq_id='.$primary_id.'" class="btn btn-small"><i class="fa fa-pencil"></i></a>';
        $details_link.='<button type="button" class="btn btn-small" onclick="confirm_delete_operation(\''.$primary_id.'\',\''.$table_name.'\');"><i class="fa fa-close"></i></button>';        
        $sub_array      = array();
        $sub_array[]    = getNameByIdAndTable($table);;
        $sub_array[]    = $row["question_title"];
        $sub_array[]    = $is_status;
        $sub_array[]    = $details_link;
        $data[]         = $sub_array;
    }

    $output = array(
        "draw"              => intval($_POST["draw"]),
        "recordsTotal"      =>  getDataRowByTable('faq'),
        "recordsFiltered"   => $number_filter_row,
        "data"              => $data
       );
       
       echo json_encode($output);
       exit;
}
if (isset($_GET['process_type']) && $_GET['process_type'] == 'save_new_query_data') {
    session_start();
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $is_empty   =   false;
    $error   =   '';
    $division_id        =   mysqli_real_escape_string($conn,$_GET['division_id']);
    $question_title     =   mysqli_real_escape_string($conn,$_GET['question_title']);
    
    if(empty($division_id)){
        $is_empty   =   true;
        $error.="Division is required!\n";
    }
    if(empty($question_title)){
        $is_empty   =   true;
        $error.="Query is required!\n";
    }
    
    if(!$is_empty){
        $fields = [
            'division_id'       => $division_id,
            'question_title'    => $question_title,
            'is_status'         => 0,
            'user_id'           => $_SESSION['logged']['user_id']
        ];
        $insert                 = saveData('faq', $fields);
        $status     =   "success";
        $message    =   "Your query have been successfully send for approval!";
        $data       =   '';
    }else{
        $status     =   "error";
        $message    =   "Please fill all the required fields!";
        $data       =   $error;
    }
    
    $feedbackData   =   [
        'status'    =>   $status,
        'message'   =>   $message,
        'data'      =>   $error,
    ];
    
    echo json_encode($feedbackData);
}