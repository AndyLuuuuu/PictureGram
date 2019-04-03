<?php
include('../model/Database.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = 'register_user';
    }

    switch ($action) {
        case 'register_user':
            $register_error = null;
            include('./user_register.php');
            break;
        case 'registering_user':
            $email = filter_input(INPUT_POST, 'register_email', FILTER_VALIDATE_EMAIL);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $register_error = "Please enter a valid email!";
                include('./user_register.php');
            }
            $password = filter_input(INPUT_POST, 'register_password');
            $accountName = filter_input(INPUT_POST, 'register_accountName');
            $db = new PDOConnection();
            $db->registerUser($email, $password, $accountName);
            header('Location: ../user_login');
            break;
    }
?>