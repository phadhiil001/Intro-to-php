<?php

/*******w******** 
    
    Name: Fadlullah Jamiu-Imam
    Date: January 11th, 2024
    Description: The code builds a dynamic image gallery using the Unsplash Image Source service. Using loops to display all your images instead of hardcoding the image tags.

****************/

$config = [

    'gallery_name' => 'Fadlullah Gallery',
 
    'unsplash_categories' => ['Bear','Beer','Candy','Food','Graffiti','Nature','Urban','Water'],
 
    'local_images' => [
        'Bear.jpg' => ['photographer' => 'Francesco', 'page' => 'https://unsplash.com/@detpho'],
        'Beer.jpg' => ['photographer' => 'Fábio Alves', 'page' => 'https://unsplash.com/@barncreative'],
        'Candy.jpg' => ['photographer' => 'Jamie Albright', 'page' => 'https://unsplash.com/@dcjamie_1202'],
        'Food.jpg' => ['photographer' => 'Victoria Shes', 'page' => 'https://unsplash.com/@victoriakosmo'],
        'Graffiti.jpg' => ['photographer' => 'James Garman', 'page' => 'https://unsplash.com/@jamesgarmandotcom'],
        'Nature.jpg' => ['photographer' => 'Blake Verdoorn', 'page' => 'https://unsplash.com/@blakeverdoorn'],
        'Urban.jpg' => ['photographer' => 'Sawyer Bengtson ', 'page' => 'https://unsplash.com/@sawyerbengtson'],
        'Water.jpg' => ['photographer' => 'Jacek Dylag', 'page' => 'https://unsplash.com/@dylu'],
    ]
 
];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alegreya:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Assignment 1</title>
</head>
<body>
    <!-- Remember that alternative syntax is good, and HTML inside PHP is bad -->
    
    <!-- TASK 1 -->

    <!-- The name of your gallery  from the $config data should be displayed at the top of the page in an h1 element. -->
    <h1><?= $config['gallery_name'] ?></h1>


    <!-- TASK 2 -->

    <!-- One image for each of your categories should be displayed. -->
    <div id="gallery">
        
        <?php foreach($config['unsplash_categories'] as $category): ?>
        <div>
            <!-- Above each image, the name of the category within an h2 element -->
            <h2><?= ($category) ?></h2>
            <img src="https://source.unsplash.com/300x200/?<?= $category ?>" alt="<?= $category ?>">
        </div>
        <?php endforeach ?>
    
    </div>


    <!-- TASK 3 -->

    <!-- A h1 element that reads “# Large Images” where # is the size of the array of local images with the $config hash. -->
    <h1><?= count($config['local_images']) ?> Large Images</h1>

    <div id="large-images">

    <!-- using loops to display all your images instead of hardcoding your image tags. -->
        <?php foreach($config['local_images'] as $photographer => $page): ?>
                <img src="images/<?= $photographer ?>" alt="<?= pathinfo($photographer, PATHINFO_FILENAME) ?>">
                <a href="<?= $page['page'] ?>">
                    <h3 class= "photographer"><?= $page['photographer'] ?></h3>
                </a>
        <?php endforeach ?>

    </div>

</body>
</html>