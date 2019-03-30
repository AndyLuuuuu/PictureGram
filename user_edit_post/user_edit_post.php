<?php include '../views/header.php'; ?>
<!-- <?php echo $_SESSION['accountID']; ?> -->
<?php include '../views/navigationbar.php' ?>
<section class="createPostContainer">
    <h1 class="createPostH1">Create a new post</h1>
    <img src="../FileServer/UserPostPhotos/<?php echo $postID?>"/>
        <form class="imageUploadForm" action="." method="POST" id="imageUploadForm" enctype="multipart/form-data">
                <input type="hidden" name="action" value="image_file_upload"/>
                <input class="imageUploadTitle" type="text" name="imageUploadTitle" placeholder="Write a post title..." form="imageUploadForm"/>
                <textarea class="imageUploadDesc" maxlength="200" placeholder="Write a description..." form="imageUploadForm" name="imageUploadDesc"></textarea>
            <div class="imageUploadButtons">
                <input type="file" name="imageFile"/>
            <div class="cancelSubmitButtons">
                <button class="imageUploadButton" type="submit" value="Cancel">Cancel</button>
                <button class="imageUploadButton" type="submit" value="Upload Photo">Upload Photo</button>
            </div>
            </div>
        </form>
</section>
<?php include '../views/footer.php'?>