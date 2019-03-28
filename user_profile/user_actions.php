<?php 

// RETRIEVE COMMENTS FROM DATABASE
include('../model/Database.php');
$action = filter_input(INPUT_POST, 'action');

switch($action) {
    case 'retrieveComments':
        header("Content-Type: application/json; charset=UTF-8");
        $postID = filter_input(INPUT_POST,'postID');
        $db = new PDOConnection();
        $comments = $db->retrieveComments($postID);
        echo json_encode($comments);
        break;
    case 'postComment':
        $accountID = filter_input(INPUT_POST, 'accountID');
        $postID = filter_input(INPUT_POST, 'postID');
        $comment = filter_input(INPUT_POST, 'comment');
        $db = new PDOConnection();
        if ($db->postComment($accountID, $postID, $comment)) {
            echo 'SUCCESS';
        } else {
            echo 'FAIL';
        }
    default:
        break;
}
 ?>