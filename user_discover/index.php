<?php 
session_start();
include('../model/Database.php');

if (isset($_SESSION['accountID']) && isset($_SESSION['isLoggedIn'])) {
    $db = new PDOConnection();
    $posts = $db->retrieveAllPosts(0);
    include('./user_discover.php');
} else {
    header('Location: ../user_login');
}

?>