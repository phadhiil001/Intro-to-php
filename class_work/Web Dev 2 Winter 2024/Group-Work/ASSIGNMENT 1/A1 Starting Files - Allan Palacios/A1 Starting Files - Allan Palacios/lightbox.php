<?php

/*******w******** 
    
    Name: Allan Palacios
    Date: 2024-01-11
    Description: Lightbox.php Bonus

****************/

$config = [
    'gallery_name' => 'Darkest Dungeon Gallery',
    'local_images' => [
        [
            'filename' => 'Darkness.jpg',
            'thumbnail' => 'Darkness_thumbnail.jpg',
            'photographer' => [
                'name' => 'Matthew Macquarry',
            ],
        ],
        [
            'filename' => 'Dungeon.jpg',
            'thumbnail' => 'Dungeon_thumbnail.jpg',
            'photographer' => [
                'name' => 'Malcolm Lightbody',
            ],
        ],
        [
            'filename' => 'Swamp.jpg',
            'thumbnail' => 'Swamp_thumbnail.jpg',
            'photographer' => [
                'name' => 'Krystian Piatek',
            ],
        ],
        [
            'filename' => 'Catacombs.jpg',
            'thumbnail' => 'Catacombs_thumbnail.jpg',
            'photographer' => [
                'name' => 'Mathew Browne',
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
    <link rel="stylesheet" href="Lightbox.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/luminous-lightbox/2.0.1/luminous-basic.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/luminous-lightbox/2.0.1/Luminous.min.js"></script>
    <title>Lightbox Gallery</title>
</head>

<h1><?= $gallery_name ?></h1>

<div class="image">
    <?php $index = 0; ?>
    <?php foreach ($local_images as $image): ?>
        <?php
            $image_path = $image_folder . $image['filename'];
            $thumbnail_path = $image_folder . $image['thumbnail'];
        ?>
        <?php if ($index % 4 == 0): ?>
            <div class="image-row">
        <?php endif; ?>

        <div class="image-item">
            <h2><?= $image['photographer']['name'] ?></h2>
            <a href="<?= $image_path ?>" data-caption="Alternative text">
                <img src="<?= $thumbnail_path ?>" alt="Thumbnail">
            </a>
        </div>

        <?php if (($index + 1) % 4 == 0 || $index + 1 == count($local_images)): ?>
            </div>
        <?php endif; ?>
        
        <?php $index++; ?>
    <?php endforeach ?>
</div>

<script>
    new LuminousGallery(document.querySelectorAll(".image a"));
</script>
</body>
</html>