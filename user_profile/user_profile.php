<?php include '../views/header.php'; ?>
<!-- <?php echo $_SESSION['accountID']; ?> -->
<?php include '../views/navigationbar.php' ?>
<section class="profile_wrapper">
    <div class="profile_intro">
        <p>test</p>
        <p>test</p>
        <p>test</p>
    </div>
    <div class="profile_main">
        <?php foreach ($posts as $post) : ?>
        <div class="user_image_container">
            <div class="user_image_overlay" data-accountname="<?php echo $post->getAccountName()?>"
                data-photoid="<?php echo "{$post->getPostID()}"?>"
                data-photoext="<?php echo "{$post->getExtension()}"?>"
                data-postname="<?php echo "{$post->getPostName()}"?>"
                data-postdesc="<?php echo "{$post->getPostDesc()}"?>">
            </div>
            <img class="user_images" src=<?php echo "../FileServer/UserPostPhotos/{$post->getPostID()}.{$post->getExtension()}"?> alt="User Images" />
        </div>

        <?php endforeach ?>
    </div>
    <div class="popup_modal" id="popup_modal">
    <div class="popup_modal_post_info">
                <h2 class="popup_modal_post_title">POST TITLE</h2>
                <h3 class="popup_modal_post_account">ACCOUNT NAME</h3>
            </div>
        <div class="popup_modal_image"></div>
        <div class="popup_modal_post_details">
        <div class="popup_modal_post_desc"> 
            <p></p>
        </div>
        <div class="popup_modal_post_comments_header">
            <p>Comments</p>
            <hr class="comment_hr"/>
        </div>
        <div class="popup_modal_post_comments" id="modal_post_comments">
            <div class="comment">
                <p class="comment_content">
                    <b>Andy Lu</b> - Integer rhoncus interdum nulla, ac luctus lacus ultricies molestie. 
                Curabitur at metus elit. Proin leo est, pellentesque a quam finibus, pulvinar tempor elit. 
                Curabitur vehicula nisl ut neque maximus, at varius nibh ultricies. Sed facilisis pellentesque mi pretium facilisis.
                </p>
                <p class="comment_date">2019-01-02</p>
            </div>
            <div class="comment">
                <p class="comment_content">
                    <b>Andy Lu</b> - Integer rhoncus interdum nulla, ac luctus lacus ultricies molestie. 
                Curabitur at metus elit. Proin leo est, pellentesque a quam finibus, pulvinar tempor elit. 
                Curabitur vehicula nisl ut neque maximus, at varius nibh ultricies. Sed facilisis pellentesque mi pretium facilisis.
                </p>
                <p class="comment_date">2019-01-02</p>
            </div>
        </div>
        <div class="comment_input_container"><input type="hidden" id="current_user" value=<?php echo $_SESSION['accountID']; ?>><input class="comment_input" id="comment_input" type="text" placeholder="Type comment..."/><input class="comment_submit" type="submit" value="Post comment" onclick="postComment()"/></div>
    </div>
</section>
<?php include '../views/footer.php'?>