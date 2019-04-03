<?php include '../views/header.php'; ?>
<div class="register_container">
<h1 class="register_h1">PictureGram</h1>
    <form class="form_register" action="index.php" method="POST">
        <input type="hidden" name="action" value="registering_user"/> 
        <input class="form_input" type="text" name="register_accountName" placeholder="Account Name"/>
        <input class="form_input" type="email" name="register_email" placeholder="Email"/>
        <input class="form_input" type="password" name="register_password" placeholder="Password"/>
        <input class="button_submit" type="submit" name="register_submit" value="Register"/>
    </form>
    <p style="color: red; margin: 0.5rem 0;"><?php echo $register_error ?></p>
</div>
<?php include '../views/footer.php'?>