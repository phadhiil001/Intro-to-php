<?php
/*
    Here we want to embed the contents here into an already existing HTML page
    use alternative syntax
    alternative syntax for "echo" use short echo <?=....?>
    */

$animals = ["cat", "donkey", "dog", "human", "gorilla", "ocelot"];


print_r($_GET);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embed PHP in HTML</title>
</head>

<body>
    <h1>Animals in the zone of danger</h1>
    <ol>
        <?php foreach ($animals as $animal) : ?>
            <li><?= $animal ?></li> <!-- short echo -->
        <?php endforeach ?>
    </ol>
</body>

</html>