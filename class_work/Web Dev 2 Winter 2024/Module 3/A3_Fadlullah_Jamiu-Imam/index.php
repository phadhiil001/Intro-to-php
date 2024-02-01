<?php

/*******w******** 
    
    Name: Fadlullah Jamiu-Imam
    Date: February 1st, 2024
    Description: This code powers the main page of a blog site. It fetches the latest 5 posts from the database and displays them, including a navigation bar. Each post is presented with a title, creation date, and a preview.

****************/

// Connect to the database
require('connect.php');

// Prepare the SQL query
$query = "SELECT * FROM blog_post ORDER BY created_date DESC LIMIT 5";

// Prepare the statement
$statement = $db->prepare($query);

// Execute the statement
$statement->execute();

// Fetch the rows
$rows = $statement->fetchAll();

// Check if any rows were returned
if (empty($rows)) {
    echo "No blog posts found.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <link rel="stylesheet" href="main.css?v=<?php echo time(); ?>">
    <title>Welcome to my Blog!</title>
</head>
<body>
    
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div class="container">
    <?php include('nav.php'); ?>
        <h1>My Amazing Post</h1>
        <h2>Recently posted Blog Entries</h2>

        <?php foreach ($rows as $row): ?>

            <div class="post">
                <h3><a href="post.php?id=<?= $row['id'] ?>"><?= $row['title'] ?></a></h3>

                <?php if (isset($row['created_date'])): ?>
                    <small><?= date('F j, Y, g:i a', strtotime($row['created_date'])) ?></small>
                    <small><a href="edit.php?id=<?= $row['id'] ?>">Edit</a></small>
                <?php endif; ?>
                
                <p><?= substr($row['content'], 0, 200) ?>...</p>
                <a href="post.php?id=<?= $row['id'] ?>">Read Full Post</a>
            </div>

        <?php endforeach; ?>
    </div>
</body>
</html>