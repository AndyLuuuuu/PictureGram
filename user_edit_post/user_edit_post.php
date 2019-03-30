<?php include '../views/header.php'; ?>
<!-- <?php echo $_SESSION['accountID']; ?> -->
<?php include '../views/navigationbar.php' ?>
<section class="createPostContainer">
    <h1 class="createPostH1">Edit post</h1>
    <img class="edit_post_image" src="../FileServer/UserPostPhotos/<?php echo $postID . "." . $photoExt?>"/>
        <form class="editPostForm" action="." method="POST" id="edit_post_form" enctype="multipart/form-data">
                <input type="hidden" name="action" value="editPost"/>
                <input type="hidden" name="postID" value="<?php echo $postID?>">
                <input class="editPostTitle" type="text" name="editPostTitle" placeholder="Write a new post title..." form="edit_post_form" value="<?php echo $postName ?>">
                <textarea class="editPostDesc" maxlength="200" placeholder="Write a new description..." form="edit_post_form" name="editPostDesc"><?php echo $postDesc ?></textarea>
            <div class="editPostButtons">
                <input class="editPostButton" type="submit" name="button" value="Cancel">
                <input class="editPostButton" type="submit" name="button" value="Edit Photo">
            </div>
        </form>
</section>
<?php include '../views/footer.php'?>