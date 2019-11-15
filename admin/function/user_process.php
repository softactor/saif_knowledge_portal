<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST['userSave']) && !empty($_POST['userSave'])) {
    $division_id        = $_POST['division_id'];
    $first_name         = $_POST['first_name'];
    $last_name          = $_POST['last_name'];
    $email              = $_POST['email'];
    $password           = $_POST['password'];
    $table              = "users";
    $where              = "email='$email'";
    $isDuplicate        = isDuplicateData($table, $where);
    if (!$isDuplicate) {
        $error = false;
        $_SESSION['error_data'] = [];
        if (empty($division_id)) {
            $error = true;
            $_SESSION['error_data']['division_id'] = 'Concern division is required!';
        }
        if (empty($first_name)) {
            $error = true;
            $_SESSION['error_data']['first_name'] = 'First Name is required!';
        }
        if (empty($last_name)) {
            $error = true;
            $_SESSION['error_data']['last_name'] = 'Last Name is required!';
        }
        if (empty($email)) {
            $error = true;
            $_SESSION['error_data']['email'] = 'Email is required!';
        }
        if (empty($password)) {
            $error = true;
            $_SESSION['error_data']['password'] = 'Password is required!';
        }
        if ($error) {
            $_SESSION['error']              = "Please fill up the required fields";
            $_SESSION['division_id']        = $division_id;
            $_SESSION['first_name']         = $first_name;
            $_SESSION['last_name']          = $last_name;
            $_SESSION['email']              = $email;
            $_SESSION['password']           = $password;
        } else {
            $fields = [
                'division_id'           => $division_id,
                'first_name'            => $first_name,
                'last_name'             => $last_name,
                'email'                 => $email,
                'user_type'             => 'gen',
                'password'              => md5($password)
            ];
            $insert = saveData($table, $fields);
            unset($_SESSION['division_id']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            $_SESSION['success'] = "Data have been successfully Saved.";
        }
    } else {
        $_SESSION['division_id']        = $division_id;
        $_SESSION['first_name']         = $first_name;
        $_SESSION['last_name']          = $last_name;
        $_SESSION['email']              = $email;
        $_SESSION['password']           = $password;
        $_SESSION['error'] = "Duplicate data found!.";
    }
    header("location: user_add.php");
    exit();
}
if (isset($_POST['userUpdate']) && !empty($_POST['userUpdate'])) {
    $user_edit_id        = $_POST['user_edit_id'];
    $division_id        = $_POST['division_id'];
    $first_name         = $_POST['first_name'];
    $last_name          = $_POST['last_name'];
    $email              = $_POST['email'];
    $password           = $_POST['password'];
    $table              = "users";
    $where              = "email='$email' and id!=$user_edit_id";
    $isDuplicate        = isDuplicateData($table, $where);
    if (!$isDuplicate) {
        $error = false;
        $_SESSION['error_data'] = [];
        if (empty($division_id)) {
            $error = true;
            $_SESSION['error_data']['division_id'] = 'Concern division is required!';
        }
        if (empty($first_name)) {
            $error = true;
            $_SESSION['error_data']['first_name'] = 'First Name is required!';
        }
        if (empty($last_name)) {
            $error = true;
            $_SESSION['error_data']['last_name'] = 'Last Name is required!';
        }
        if (empty($email)) {
            $error = true;
            $_SESSION['error_data']['email'] = 'Email is required!';
        }
        if ($error) {
            $_SESSION['error']              = "Please fill up the required fields";
            $_SESSION['division_id']        = $division_id;
            $_SESSION['first_name']         = $first_name;
            $_SESSION['last_name']          = $last_name;
            $_SESSION['email']              = $email;
        } else {
            $fields = [
                'division_id'           => $division_id,
                'first_name'            => $first_name,
                'last_name'             => $last_name,
                'email'                 => $email,
                'user_type'             => 'gen',
            ];
            $sql            = "UPDATE users set division_id='$division_id',first_name='$first_name',last_name='$last_name',email='$email' where id=$user_edit_id";
            $conn->query($sql);
            
            if(isset($password) && !empty($password)){
                $password       = md5($password);
                $sql            = "UPDATE users set password='$password' where id=$user_edit_id";
                $conn->query($sql);
            }
            
            unset($_SESSION['division_id']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);
            unset($_SESSION['email']);
            unset($_SESSION['password']);
            $_SESSION['success'] = "Data have been successfully Updated.";
        }
    } else {
        $_SESSION['division_id']        = $division_id;
        $_SESSION['first_name']         = $first_name;
        $_SESSION['last_name']          = $last_name;
        $_SESSION['email']              = $email;
        $_SESSION['error'] = "Duplicate data found!.";
    }
    header("location: user_edit.php?user_id=$user_edit_id");
    exit();
}