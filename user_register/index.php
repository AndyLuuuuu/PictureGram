<?php
include('../model/Database.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = 'register_user';
    }

    switch ($action) {
        case 'register_user':
            include('./user_register.php');
            break;
        case 'registering_user':
            $email = filter_input(INPUT_POST, 'register_email', FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'register_password');
            $accountName = filter_input(INPUT_POST, 'register_accountName');
            $db = new PDOConnection();
            $db->registerUser($email, $password, $accountName);
            header('Location: ../user_login');
            break;
    }
?>