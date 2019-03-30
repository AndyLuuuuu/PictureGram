<?php include '../views/header.php'; ?>
<!-- <?php echo $_SESSION['accountID']; ?> -->
<?php include '../views/navigationbar.php' ?>
<section class="discover_wrapper">
    <h1 class="discover_header">Discover PictureGram</h1>
    <div class="discover_images" id="discover_images">
        <?php foreach($posts as $post) :?>
            <div class="discover_image_container">
                <img data-accountname="<?php echo $post->getAccountName()?>"
                data-photoid="<?php echo "{$post->getPostID()}"?>"
                data-photoext="<?php echo "{$post->getExtension()}"?>"
                data-postname="<?php echo "{$post->getPostName()}"?>"
                data-postdesc="<?php echo "{$post->getPostDesc()}"?>"
                 class="discover_image" src="<?php echo "../FileServer/UserPostPhotos/{$post->getPostID()}.{$post->getExtension()}"?>"/>
            </div>
        <?php endforeach?>
    </div>
    <div class="popup_modal" id="popup_modal">
        <div class="popup_modal_image"></div>
        <div class="popup_modal_post_details">
        <h1 class="popup_modal_post_title"></h1>
        <div class="popup_modal_post_desc"> 
            <p></p>
        </div>
        <div class="popup_modal_post_comments_header">
            <p>Comments</p>
            <hr class="comment_hr"/>
        </div>
        <div class="popup_modal_post_comments" id="modal_post_comments">
        </div>
        <div class="comment_input_container"><input type="hidden" id="current_user" value=<?php echo $_SESSION['accountID']; ?>><input class="comment_input" id="comment_input" type="text" placeholder="Type comment..."/><input class="comment_submit" type="submit" value="Post comment" onclick="postComment()"/></div>
    </div>
</section>
<?php include '../views/footer.php'?>