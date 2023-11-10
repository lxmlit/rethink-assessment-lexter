<?php
session_start();
require 'db_connection.php';

if(isset($_POST['delete_post']))
{
    $post_id = mysqli_real_escape_string($conn, $_POST['delete_post']);

    $query = "DELETE FROM posts WHERE id='$post_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Post Deleted Successfully";
        header("Location: home.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Post Not Deleted";
        header("Location: home.php");
        exit(0);
    }
}
?>