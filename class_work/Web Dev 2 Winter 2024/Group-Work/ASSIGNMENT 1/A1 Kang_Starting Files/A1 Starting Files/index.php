<?php

/*******w******** 
    
    Name: Kang Shen
    Date: 2024-01-09
    Description:php

 ****************/

$config = [

    'gallery_name' => 'Sports Gallery',

    'unsplash_categories' => ['tennis', 'badminton', 'hockey', 'basketball', 'football', 'swimming', 'diving', 'hiking'],

    'local_images' => [
        ['src' => 'img1', 'alt' => 'Moises Alex', 'link' => 'https://unsplash.com/@arnok'],
        ['src' => 'img2', 'alt' => 'Josephine Gasser', 'link' => 'https://unsplash.com/@jojog1208'],
        ['src' => 'img3', 'alt' => 'Christian Tenguan', 'link' => 'https://unsplash.com/@christiantenguan'],
        ['src' => 'img4', 'alt' => 'Ben Hershey', 'link' => 'https://unsplash.com/@benhershey']
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
    <title><?php echo $config['gallery_name'] ?></title>
</head>

<body>
    <h1><?php echo $config['gallery_name'] ?></h1>
    <div id="gallery">
        <?php
        foreach ($config['unsplash_categories'] as $category) {
            echo "<div>
            <h2>$category</h2>
            <img src=\"https://source.unsplash.com/300x200/?$category\" alt=\"$category image\">
          </div>";
        }
        ?>
    </div>
    <h1><?php echo count($config['local_images']) ?> Large Images</h1>
    <div id="large_images">
        <?php
        foreach ($config['local_images'] as $image) {
            echo "<div>
            <img src=\"images/{$image['src']}.jpg\" alt=\"{$image['alt']}\">
            <h3 class=\"photographer\"><a href=\"{$image['link']}\">{$image['alt']}</a></h3>
          </div>";
        }
        ?>
    </div>
</body>

</html>