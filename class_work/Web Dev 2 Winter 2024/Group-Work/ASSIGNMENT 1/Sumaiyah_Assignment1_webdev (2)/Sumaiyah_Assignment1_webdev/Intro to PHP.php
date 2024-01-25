<?php

/*******w******** 
    
    Name: Sumaiyah
    Date: 15 January , 2023
    Description: This is the php for assignment 1 

****************/

$config = [

    'gallery_name' => 'Sumaiyah Gallery',
    'unsplash_categories' => ['Art','Technology','Architecture','Nature'],
    'local_images' => ['painting.jpg','robot.jpg','Taj Mahal.jpg','Niagara Falls.jpg'],
    'photographers_name' => ['Dan Cristian Paduret','Alex Knight','Sachin chauhan','Agustin Gunawan'],
    'profiles' => ['https://unsplash.com/@dancristianpaduret','https://unsplash.com/@agk42','https://unsplash.com/@sachin6192','https://unsplash.com/@ags_sss']

];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Assignment 1</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->

<h1> <?php echo $config['gallery_name']?></h1>

    <div id = "gallery" >
        <?php foreach ($config ['unsplash_categories'] as $categories){?>
        <h2> <?=  $categories ?> </h2>
        <img src = "https://source.unsplash.com/300x200/?<?= $categories ?>" alt="<?= $categories ?> image">
        <?php } ?>
    </div>

    <div id="large-images">
        <h1><?php echo $count = count($config['local_images']) . " Large Images"?></h1>
    </div>

    <div><?php foreach ($config['local_images'] as $photos => $displayed): ?>
        <?php $local_url = "./images/$displayed"; ?></div>

    <div >
        <img src = "<?= $local_url ?>" alt="<?$displayed?> ">
        <?php $profiles = $config['profiles'][$photos]; ?>
        <?php $photographers_name = $config['photographers_name'][$photos]; ?>

        <a href = "<?= $profiles ?>">
        <h2> <?= $photographers_name ?> </h2> </a></div>
    <?php endforeach ?>

    
    </body>
    </html>







  