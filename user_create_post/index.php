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
            $fileName = $_FILES['imageFile']['name'];
            $fileNameArray = explode('.', $fileName);
            $fileExt = end($fileNameArray);
            if ($fileExt === 'jpg' || $fileExt === 'jpeg' || $fileExt === 'png') {
                echo 'lol';
                $uniqueID = uniqid("pgPostPhoto", true);
                $uploadFileName = $uniqueID . "." . $fileExt;
                if (move_uploaded_file($_FILES['imageFile']['tmp_name'], "../FileServer/UserPostPhotos/" . $uploadFileName) == TRUE) {
                    header("Location: ../user_profile");
                };
            } else {
                $error = "Please upload image files ending with .jpg/.jpeg/.png!";
                include('../views/errorPage.php');
            }
        }
        break;
    default:
        break;
}
 ?>