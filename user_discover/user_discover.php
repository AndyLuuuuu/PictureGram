<?php include '../views/header.php'; ?>
<!-- <?php echo $_SESSION['accountID']; ?> -->
<?php include '../views/navigationbar.php' ?>
<section class="newsfeed_wrapper">
    <h1 class="newsfeed_header">Discover PictureGram</h1>
    <div class="newsfeed_images" id="newsfeed_images">
        <?php foreach($posts as $post) :?>
            <div class="newsfeed_image_container">
            <div class="newsfeed_image_overlay"><p><?php echo $post->getPostName()?></p></div>
                <img class="newsfeed_image" src="<?php echo "../FileServer/UserPostPhotos/{$post->getPostID()}.{$post->getExtension()}"?>"/>
            </div>
        <?php endforeach?>
    </div>
</section>
<?php include '../views/footer.php'?>