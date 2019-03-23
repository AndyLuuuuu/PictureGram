<?php include '../views/header.php'; ?>
<div class="login_container">
<h1 class="login_h1">PictureGram</h1>
    <form class="form_login" action="includes/login.inc.php" method="POST">
        <input class="form_input" type="text" name="login-username" placeholder="Username">
        <input class="form_input" type="password" name="login-password" placeholder="Password">
        <input class="button_submit" type="submit" name="login-submit" value="Log In">
    </form>
    <div class="login_register"><p>Don't have an account?</p><a class="register_button" href="../user_register/index.php">Click here</a></div>
</div>
<?php include '../views/footer.php'?>