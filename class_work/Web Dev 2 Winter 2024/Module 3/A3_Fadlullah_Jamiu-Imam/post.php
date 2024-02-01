<?php

/*******w******** 
    
    Name: Fadlullah Jamiu-Imam
    Date: February 1st, 2024
    Description: This PHP code creates a blog post page, fetching details from a database. It displays the post's title, creation date, and content. The page structure includes a header, date, an "Edit" link for post modification, and the content. The code promotes clarity and organization, using external files for navigation.

****************/

require('connect.php');

 // Build and prepare SQL String with :id placeholder parameter. 
    // use LIMIT 1 to avoid  multiple rows if more than one row matches the WHERE clause and prevent  unexpected results.
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $query = "SELECT * FROM blog_post WHERE id = :id";
    $statement = $db->prepare($query);
    
    // Sanitize $_GET['id'] to ensure it's a number.
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
    // Bind the :id parameter in the query to the sanitized
    // $id specifying a binding-type of Integer.

    //  PDO::PARAM_INT - the sql datatype integer, it is used for integers, it throws error  if value passed is not integer.
    $statement->bindParam('id', $id, PDO::PARAM_INT);
    $statement->execute();
    
    // Fetch the post selected by primary key id.
    $post = $statement->fetch();

    // Close the statement.
    $statement->closeCursor();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>My Blog - <?= $post['title'] ?></title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    
     <div class="container">
        <?php include('nav.php'); ?>
        <?php if ($post): ?>
            <h2><?= $post['title'] ?></h2>
            <small><?= date('F j, Y, g:i a', strtotime($post['created_date'])) ?></small>
            <small><a href="edit.php?id=<?= $post['id'] ?>" class="edit-link">Edit</a></small>
            <p><?= $post['content'] ?></p>
        <?php else: ?>
            <p>No post found.</p>
        <?php endif; ?>
    </div>
    

</body>
</html>

