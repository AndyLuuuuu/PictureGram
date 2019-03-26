<?php include '../views/header.php'; ?>
<!-- <?php echo $_SESSION['accountID']; ?> -->
<?php include '../views/navigationbar.php' ?>
<section class="wrapper">
    <div class="profile_intro">
        <p>test</p>
        <p>test</p>
        <p>test</p>
    </div>
    <div class="profile_main">
        <?php foreach ($images as $image) : ?>
        <div class="user_image_container">
            <div class="user_image_overlay"></div>
            <img class="user_images" src=<?php echo "{$image}"?> />
        </div>

        <?php endforeach ?>
    </div>
</section>
<?php include '../views/footer.php'?>