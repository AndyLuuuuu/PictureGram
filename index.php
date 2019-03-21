<!-- <?php include 'views/header.php'?> -->
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PictureGram</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="./assets/main.css">
        <style>
            body {
                
            }
            .login-centerer {
                height: 100%;
                display: grid;
                /* background-color: green; */
            }
            h1 {
                font-size: 3.5em;
            } 
            .form-login {
                /* margin-top: 500px; */
                box-sizing: border-box;
                font-family: "Lato", sans-serif;
                /* position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%); */
                margin: auto;
                text-align: center;
                width: 40em;
                /* background-color: gray; */
                padding: 27% 0;
            }
            form {
                background-position: center;
            }
            form input {
                font-size: 1em;
                width: 30em;
                line-height: 2em;
                border: 0;
            }
            .button-submit {
                background-color: black;
                color: white;
                border: 0;
                font-weight: bold;
            }
        </style>
    </head>
    <body class="login-centerer">
        <!-- <div > -->
            <form class="form-login" action="includes/login.inc.php" method="POST">
                <h1>PictureGram</h1>
                <br>
                <input class="form-input" type="text" name="login-username" placeholder="Username">
                <br>
                <input class="form-input" type="password" name="login-password" placeholder="Password">
                <br>
                <input class="button-submit" type="submit" name="login-submit" value="Log In">
                <br>
            </form>
        <!-- </div> -->
        <script src="./assets/main.js"></script>
    </body>
</html>
<!-- <?php include 'views/footer.php'?> -->