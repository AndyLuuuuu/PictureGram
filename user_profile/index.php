<?php 
include('../model/Database.php');
session_start();

// $images = array();
//  $images[] = 'https://images.unsplash.com/photo-1552010534-e4e817b173c2?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9';
//  $images[] = 'https://images.unsplash.com/photo-1550726932-174e0acbb076?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9';
//  $images[] = 'https://images.unsplash.com/photo-1550537687-c91072c4792d?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9';
//  $images[] = 'https://images.unsplash.com/photo-1550574435-9d7a18dcb108?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9';
//  $images[] = 'https://images.unsplash.com/photo-1550311822-df2c559511f1?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9';
//  $images[] = 'https://images.unsplash.com/photo-1552061432-02e858fdd7a2?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9';
//  $images[] = 'https://images.unsplash.com/photo-1550942745-d6c1329a5c80?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9';
//  $images[] = 'https://images.unsplash.com/photo-1550919559-2256f4b083a4?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9';
//  $images[] = 'https://images.unsplash.com/photo-1550649613-66b6ac02f56d?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9';
 

if(isset($_SESSION['accountID']) && isset($_SESSION['isLoggedIn'])) {
    $db = new PDOConnection();
    $posts = $db->retrievePosts($_SESSION['accountID']);
    include('./user_profile.php');
} else {
    header('Location: ../user_login');
}
?>