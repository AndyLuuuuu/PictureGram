<?php include '../views/header.php'; ?>
<div class="login_container">
<h1 class="login_h1">PictureGram</h1>
    <form class="form_login" action="." method="POST">
        <input type="hidden" name="action" value="user_login"/>
        <input class="form_input" type="text" name="login_email" placeholder="Email"/>
        <input class="form_input" type="password" name="login_password" placeholder="Password"/>
        <input class="button_submit" type="submit" name="login_submit" value="Login"/>
    </form>
    <div class="login_register"><p>Don't have an account?</p><a class="register_button" href="../user_register/index.php">Click here</a></div>
</div>
<?php include '../views/footer.php'?>