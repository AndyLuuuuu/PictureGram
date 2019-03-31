<?php 
include('../model/Database.php');
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = "redirect";
}

switch ($action) {
    case 'redirect':
        if (isset($_SESSION['accountID']) && isset($_SESSION['isLoggedIn'])) {
            $postID = filter_input(INPUT_GET, 'postID');
            $photoExt = filter_input(INPUT_GET, 'photoExt');
            $db = new PDOConnection();
            $postInfo = $db->fetchPost($postID);
            $postName = $postInfo['postName'];
            $postDesc = $postInfo['postDesc'];
            if ($postID == NULL || $photoExt == NULL) {
                header('Location: ../user_profile');
            } else {
                include('./user_edit_post.php');
            }
        } else {
            header('Location: ../user_login');
        }
    break;
    case 'editPost':
        $formAction = filter_input(INPUT_POST, 'button');
        if ($formAction == NULL || $formAction == 'Cancel') {
            header('Location: ../../../user_profile');
        } else if ($formAction == 'Save') {
            $postID = filter_input(INPUT_POST, 'postID');
            $newPostName = filter_input(INPUT_POST, 'editPostTitle');
            $newPostDesc = filter_input(INPUT_POST, 'editPostDesc');
            $db = new PDOConnection();
            if ($db->editPost($postID, $newPostName, $newPostDesc)) {
                header('Location: ../user_profile');
            } else {
                $error = "Oh no! Something went wrong!";
                include("../views/errorPage.php");
            }
        }
    break;
}
?>