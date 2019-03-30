<?php 

include('../model/Database.php');
$action = filter_input(INPUT_POST, 'action');
$offset = 0;

switch($action) {
    case 'fetchPosts':
        header("Content-Type: application/json; charset=UTF-8");
        $offset = filter_input(INPUT_POST, 'offset');
        $db = new PDOConnection();
        $posts = $db->retrieveAllPosts($offset);
        $returnPosts = array();
        foreach($posts as $post) {
            $returnPosts[] = $post->jsonSerialize();
        };
        echo json_encode($returnPosts);
        break;
    default:
        break;
}
 ?>