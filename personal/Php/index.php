<?php

/*******w******** 
    
    Name:
    Date:
    Description:

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
    <link rel="stylesheet" href="main.css">
    <title>Welcome to my Blog!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div>
        <h1>Recently posted Blog Entries</h1>
        <?php foreach ($rows as $row): ?>
            <div>
                <h2><?= $row['title'] ?></h2>
                <?php if (isset($row['created_date'])): ?>
                    <small><?= date('F j, Y, g:i a', strtotime($row['created_date'])) ?></small>
                    <small><a href="edit.php?id=<?= $row['id'] ?>">Edit</a></small>
                <?php endif; ?>
                <p><?= substr($row['content'], 0, 100) ?>...</p>
                <a href="post.php?id=<?= $row['id'] ?>">Read More</a>
                <br>
                <br>
                <br>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>