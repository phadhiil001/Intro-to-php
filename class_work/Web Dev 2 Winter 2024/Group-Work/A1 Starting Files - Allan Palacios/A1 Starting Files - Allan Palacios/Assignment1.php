<?php

/*******w******** 
    
    Name: Allan Palacios
    Date: 2024-01-11
    Description: Intro to PHP Assignment 1

****************/


$config = [
    'gallery_name' => 'Darkest Dungeon Gallery',
    'unsplash_categories' => ['Darkness', 'Dungeon', 'Swamp', 'Catacombs', 'Monster', 'Goats', 'Spiders', 'Adventurer'],
    'local_images' => [
        [
            'filename' => 'Darkness.jpg',
            'photographer' => [
                'name' => 'Matthew Macquarry',
                'unsplash_url' => 'https://unsplash.com/@matmacq',
            ],
        ],
        [
            'filename' => 'Dungeon.jpg',
            'photographer' => [
                'name' => 'Malcolm Lightbody',
                'unsplash_url' => 'https://unsplash.com/@mlightbody',
            ],
        ],
        [
            'filename' => 'Swamp.jpg',
            'photographer' => [
                'name' => 'Krystian Piatek',
                'unsplash_url' => 'https://unsplash.com/@krystian_piatek',
            ],
        ],
        [
            'filename' => 'Catacombs.jpg',
            'photographer' => [
                'name' => 'Mathew Browne',
                'unsplash_url' => 'https://unsplash.com/@mathewbrowne',
            ],
        ],
    ],
];

$gallery_name = $config['gallery_name'];
$local_images = $config['local_images'];
$image_folder = 'images/';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainv2.css">
    <title>Assignment 1</title>
</head>

<body>

    <h1><?= $gallery_name ?></h1>

    <div id="gallery">
        <?php foreach ($config['unsplash_categories'] as $category): ?>
            <div class="gallery-category">
                <h2><?= $category ?></h2>
                <?php $unsplash_image_url = "https://source.unsplash.com/300x200/?$category"; ?>
                <img src="<?= $unsplash_image_url ?>" alt="<?= $category ?> image">
            </div>
        <?php endforeach ?>
    </div>

    <h1><?= count($local_images) ?> Large Images</h1>

    <ul>
        <?php foreach ($local_images as $image): ?>
            <?php $image_path = $image_folder . $image['filename']; ?>
            <li>
                <img src="<?= $image_path ?>" alt="<?= $image['filename'] ?>">
                <p><a href="<?= $image['photographer']['unsplash_url'] ?>" target="_blank"><?= $image['photographer']['name'] ?></a></p>
            </li>
        <?php endforeach ?>
    </ul>
</body>

</html>