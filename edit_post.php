<?php
session_start();
require 'db_connection.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Edit Post</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Post
                            <a href="home.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $post_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM posts WHERE id='$post_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $post = mysqli_fetch_array($query_run);
                                ?>
                                <form action="on_editpost.php" method="POST">
                                    <input type="hidden" name="post_id" value="<?= $post['id']; ?>">

                                    <div class="mb-3">
                                        <label>Post Title</label>
                                        <input type="text" name="post_title" value="<?=$post['post_title'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Post Content</label>
                                        <input type="text" name="post_content" value="<?=$post['post_content'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_post" class="btn btn-primary">
                                            Update Post
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>