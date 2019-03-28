<?php 
session_start();
include('../model/Database.php');

if (isset($_SESSION['accountID']) && isset($_SESSION['isLoggedIn'])) {
    $db = new PDOConnection();
    $posts = $db->retrieveAllPosts($_SESSION['accountID']);
    include('./user_newsfeed.php');
} else {
    header('Location: ../user_login');
}

?>