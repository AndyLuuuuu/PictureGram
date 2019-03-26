<?php 
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
        $action = 'create_new_post';
}

switch ($action) {
    case 'create_new_post':
        include('./user_create_post.php');
        break;
    case 'image_file_upload':
        if(isset($_FILES['imageFile'])) {
            echo $_FILES['imageFile']['name'];
        }
        break;
    default:
        break;
}
 ?>