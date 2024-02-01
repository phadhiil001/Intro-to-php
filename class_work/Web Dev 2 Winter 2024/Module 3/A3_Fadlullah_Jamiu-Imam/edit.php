<?php

/*******w******** 
    
    Name: Fadlullah Jamiu-Imam
    Date: February 1st, 2024
    Description:  This is a PHP script that will generate an HTML page with a form for the user to edit the post. 

****************/

session_start();

require('connect.php');
require('authenticate.php');

// Check if the user is authenticated.
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Our Blog"');
    exit("Access Denied: Username and password required.");
}

// DELETE post if delete button is clicked and id is present in POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete']) && isset($_POST['id'])) {
    // Sanitize user input for id.
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Build the parameterized SQL query and bind to the above sanitized value.
    $query = "DELETE FROM blog_post WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);

    // Execute the DELETE.
    $statement->execute();

    // Redirect after deletion.
    header("Location: index.php");
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) { // Handle update if form is submitted.
    // Sanitize user input.
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Build the parameterized SQL query and bind sanitized values.
    $query = "UPDATE blog_post SET title = :title, content = :content, created_date = NOW() WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':content', $content);

    // Execute the UPDATE.
    $statement->execute();

    // Redirect after update.    
    header("Location: post.php?id=" . htmlspecialchars($id));
    exit;
    
} elseif (isset($_GET['id'])) { // Retrieve post to be edited if id GET parameter is in URL.
    // Sanitize the id.
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Build the parameterized SQL query using the filtered id.
    $query = "SELECT * FROM blog_post WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    // Execute the SELECT and fetch the single row returned.
    $statement->execute();
    $post = $statement->fetch();

    // Check if the post exists before displaying the form.
    if ($post) {
        $title = $post['title'];
        $content = $post['content'];
        $created_date = isset($post['created_date']) ? date('Y-m-d H:i:s', strtotime($post['created_date'])) : '';
    } else {
        $id = false;
    }
} else {
    $id = false; // False if we are not UPDATING or SELECTING.
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="editstyles.css"> -->
    <link rel="stylesheet" href="main.css">
    <title>Edit this Post!</title>
</head>
<body>
    
    <div class="container">

    <?php include('nav.php'); ?><br></br>

    <h1>Edit Post</h1>

        <?php if ($id): ?>

            <form class="edit-form" method="post">
                <!-- Hidden input for the post primary key. -->
                <input type="hidden" name="id" value="<?= $post['id'] ?>">

                <!-- Post title and content are echoed into the input value attributes. -->
                <label for="title">Title</label>
                <input id="title" name="title" value="<?= $post['title'] ?>">
                <label for="content">Content</label>
                <textarea id="content" name="content"><?= htmlspecialchars($post['content']) ?></textarea><br><br>

                <!-- Update button -->
                <input type="submit" value="Update">

                <!-- Delete button -->
                <input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this post?')">
            </form>

            <?php else : ?>
            <p>Post not found.</p>
        <?php endif; ?>

        <p><a href="index.php">Back to the list of posts</a></p>

    </div>

</body>
</html>
