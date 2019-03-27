<?php 

if ($_SESSION['isLoggedIn']) {
    if (isset($_SESSION['accountID'])) {
        echo "<p>$error</p>";
        echo "<a href=\"../user_create_post\">Click to go back.</a>";
    } else {
        header("Location: ../../../user_login");
    }
}
?>