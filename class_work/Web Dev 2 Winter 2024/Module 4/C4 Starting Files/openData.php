<?php

/*******w******** 
    
    Name:
    Date:
    Description:

****************/

ini_set("allow_url_fopen", 1);
$json = file_get_contents('https://restcountries.com/v3.1/all');
$data = null;

if (isset($json)){
    $data = json_decode($json, true); //true for associative array
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Open Data Challenge</title>
    <style>
        .country {
            border: 1px solid grey;
        }
        .img {
            font-size: 50px;
            padding: 0px;
            margin: 0px;
        }
    </style>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <?php if(isset($data)): ?>
        <!-- Loop through all data -->
        <?php foreach($data as $countryInfo): ?>
            <div class="country">
                <h1><?= $countryInfo['name']['common'] ?></h1>
                <p class="img"><?= $countryInfo['flag'] ?></p>
                <h2><?= $countryInfo['name']['official'] ?></h2>
                <p>Located in: <?= $countryInfo['region'] ?></p>
                <p>Population of <?= $countryInfo['population'] ?> people</p>
                <h3>Languages Spoken:</h3>
                <?php $languages = array_keys( $countryInfo['languages'] ); ?>
                <?php foreach ($languages as $language) : ?>
                    <p><?= $countryInfo['languages'][$language] ?></p>
                <?php endforeach; ?>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</body>
</html>