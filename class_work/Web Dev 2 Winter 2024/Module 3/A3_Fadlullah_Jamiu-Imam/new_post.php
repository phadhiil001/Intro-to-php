<?php

/*******w******** 
    
    Name: Fadlullah Jamiu-Imam
    Date: February 1st, 2024
    Description: This code show page to add a new post to the blog site. It presented with a title, content and submit functions.

****************/


    session_start();

    require('connect.php');
    require('authenticate.php');
    
    if ($_POST && !empty($_POST['title']) && !empty($_POST['content'])) {
        //  Sanitize user input to escape HTML entities and filter out dangerous characters.
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content = nl2br(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        
        //  Build the parameterized SQL query and bind to the above sanitized values.
        $query = "INSERT INTO blog_post (title, content) VALUES (:title, :content)";
        $statement = $db->prepare($query);

        
        //  Bind values to the parameters
        $statement->bindValue(':title', $title);
        $statement->bindValue(':content', $content);
        
        //  Execute the INSERT.
        //  execute() will check for possible SQL injection and remove if necessary
        if($statement->execute()) {
            echo "Success";
        }

    }

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get user inputs and trim whitespace
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        // Check if title and content are not empty
        if (empty($title) || empty($content)) {
            $error_message = "Please enter both title and content.";
        } else {

            header("Location: index.php");
            exit;
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>PDO Insert</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
    <div class="container">
    <nav>
        <ul>
            <li><a href="index.php">My Amazing Blog Post</a></li>
        </ul>
    </nav><br><br>
        <h1>New Post</h1>

        <?php if (isset($error_message)): ?>
            <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <form class="edit-form" method="post" action="new_post.php">
            <label for="title">Title</label>
            <input id="title" name="title">
            <label for="content">Content</label>
            <textarea id="content" name="content"></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>