<?php 
include('../model/Database.php');
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
        if (filter_input(INPUT_POST, 'uploadPhoto') == "Cancel") {
            header("Location: ../user_profile");
        } else if (filter_input(INPUT_POST, 'uploadPhoto') == "Upload Photo") {
            if(isset($_FILES['imageFile'])) {
                if ($_FILES['imageFile']['size'] <= 0) {
                    $error = "Something went wrong... :(";
                    include('../views/errorPage.php');
                } else {
                $fileName = $_FILES['imageFile']['name'];
                $fileNameArray = explode('.', $fileName);
                $fileExt = end($fileNameArray);
                if ($fileExt === 'jpg' || $fileExt === 'jpeg' || $fileExt === 'png') {
                    if($_FILES['imageFile']['size'] > 2097152) {
                        $error = "Image size cannot exceed 2MB!";
                        include('../views/errorPage.php');
                    }
                    $uniqueID = uniqid("", true);
                    $uploadFileName = $uniqueID . "." . $fileExt;
                    if (move_uploaded_file($_FILES['imageFile']['tmp_name'], "../FileServer/UserPostPhotos/" . $uploadFileName) == TRUE) {
                        // $db = new PDOConnection();
                        $accountID = $_SESSION['accountID'];
                        $postID = $uniqueID;
                        $postName = filter_input(INPUT_POST, "imageUploadTitle");
                        $postDesc = filter_input(INPUT_POST, "imageUploadDesc");
                        $db = new PDOConnection();
                        if ($db->newPost($accountID, $postID, $postName, $postDesc, $fileExt)) {
                            header("Location: ../user_profile");
                        } else {
                            $error = "Oh no! Something went wrong!";
                            include('../views/errorPage.php');
                        }
                    };
                } else {
                    $error = "Please upload image files ending with .jpg/.jpeg/.png!";
                    include('../views/errorPage.php');
                }
            }
        }
    }
        break;
    default:
        break;
}
 ?>