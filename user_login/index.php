<?php 
session_start();
// session_destroy();
include('../model/Database.php');   // connects to DB

// get action to do
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
        $action = 'request_login';
}

// do action
switch($action) {
    case 'request_login':
        if(isset($_SESSION['accountID']) && isset($_SESSION['isLoggedIn'])) {
            header('Location: ../user_profile');
        } else {
            $auth_error = null;
            include('./user_login.php'); 
        }
        break;
    case 'user_login':
        $db = new PDOConnection();
        $email = filter_input(INPUT_POST, 'login_email', FILTER_VALIDATE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $auth_error = "Your email is not valid!";
            include('./user_login.php'); 
        } else {
            $password = filter_input(INPUT_POST, 'login_password');
            $auth_result = $db->loginUser($email, $password);
            if ($auth_result == false) {
                $auth_error = "Please check your login credentials!";
                include('./user_login.php'); 
            } else {
                $_SESSION['accountID'] = $auth_result[0];
                $_SESSION['isLoggedIn'] = $auth_result[1];
                header("Location: ../user_profile");
            }
        }
        break;
    case 'logout':
        include('./user_logout.php');
        break;
}
?>