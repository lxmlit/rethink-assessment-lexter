<?php
session_start();
require 'db_connection.php';

if(isset($_POST['update_post']))
{
    $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);

    $post_title = mysqli_real_escape_string($conn, $_POST['post_title']);
    $post_content = mysqli_real_escape_string($conn, $_POST['post_content']);

    $query = "UPDATE posts SET post_title='$post_title', post_content='$post_content' WHERE id='$post_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Post Updated Successfully";
        header("Location: home.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Post Not Updated";
        header("Location: home.php");
        exit(0);
    }

}
?>