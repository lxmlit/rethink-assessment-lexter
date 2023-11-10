<?php
session_start();
require 'db_connection.php';

if (isset($_POST['create_post'])) {
    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);

    $query = "INSERT INTO posts (post_title, post_content) VALUES ('$post_title','$post_content')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Post Created Successfully";
        header("Location: create_post.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Post Not Created";
        header("Location: create_post.php");
        exit(0);
    }
}

?>