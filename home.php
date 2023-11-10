<?php
session_start();
session_regenerate_id(true);

if(!isset($_SESSION['logged_user_id']) || empty($_SESSION['logged_user_id']) || !is_numeric($_SESSION['logged_user_id'])){
    header('Location: logout.php');
    exit;
}
require_once __DIR__ . "/db_connection.php";
require_once __DIR__ . "/get_user.php";
// Get the User by ID that stored in the session
$user = get_user($conn, $_SESSION['logged_user_id']);
// If User is Empty
if($user === false){
    header('Location: logout.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="profile">
            <h2><?php echo $user["name"]; ?><span><?php echo $user["email"]; ?></span></h2>
            <a href="./create_post.php"> Add Post</a>
            <a href="./logout.php">Log out</a>
        </div>
        <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Post Title</th>
                                    <th>post Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM posts";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $posts)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $posts['post_title']; ?></td>
                                                <td><?= $posts['post_content']; ?></td>
                                                <td>
                                                    <a href="edit_post.php?id=<?= $posts['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="on_deletepost.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_post" value="<?=$posts['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No posts yet. </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
        
    </div>
</body>
</html>