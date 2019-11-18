<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['faqSave']) && !empty($_POST['faqSave'])) {
    $division_id        = $_POST['division_id'];
    $question_title     = $_POST['question_title'];
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
    $question_title     = $_POST['question_title'];
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