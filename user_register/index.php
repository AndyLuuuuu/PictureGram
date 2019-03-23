<?php
include('../model/database.php');

    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = 'register_user';
    }

    if ($action == 'register_user') {
        include('./user_register.php');
    } else if ($action == "registering_user") {
        echo 'registering user!';
        $email = filter_input(INPUT_POST, 'register_email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'register_password');
        $accountName = filter_input(INPUT_POST, 'register_accountName');
        $db = new PDOConnection();
        echo implode(", ", $db->registerUser($email, $password, $accountName));
    }
?>