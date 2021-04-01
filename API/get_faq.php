<?php
/*
 * Mysql Database connection string:
 */
include '../admin/connection/connect.php';
include '../admin/helper/utilities.php';

// default response Data:
$data       =   '';
$status     =   '404';
$message    =   'Data not found';

if(isset($_POST['accessToken']) && !empty($_POST['accessToken'])){ 
    $table      =   "faq WHERE division_id IN (4,9)";
    $allFaq     =   getTableDataByTableName($table, $order = 'asc', $column='question_title', $dataType = 'OBJ');
    
    if(isset($allFaq) && !empty($allFaq)){
        $status     =   '200';
        $message    =   'Data found';
        $data       =   $allFaq;
    }
    
    $feedBack       =   [
        'status'       =>  $status,
        'message'      =>  $message,
        'data'         =>  $data,
    ];   
    
}else{
    $feedBack       =   [
        'status'       =>  $status,
        'message'      =>  $message,
        'data'         =>  $data,
    ];
}
print '<pre>';
print_r($feedBack);
print '</pre>';
exit;

return $feedBack;