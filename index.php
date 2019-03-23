<?php 
include('./model/database.php');

$db_conn = connectToDB();
registerUser($db_conn);
?>
<a href="user_login">login</a>