<?php

/*******w******** 
    
    Name: Fadlullah Jamiu-Imam
    Date:
    Description:

****************/

// Task #1 Generate the date using php.
// Save it to a variable.
// Output it within a p tag in your body.

date_default_timezone_set('America/Winnipeg');
$todaysdate = date("F j, Y");
$today = "Today's date is {$todaysdate}.";


// Task #2 Hard-code an array of strings.

// Each string is a quote.

// Within the body of your html, loop through this array.

// Output each quote within a <p> tag

$quotes = [
            "Today will be well",
            "All will be fine",
            "Tomorrow will be better"
          ];


     

// Task #3 The following array of hashes

// contains title and URLs for websites.

$links = [

    ['title' => 'Stung Eye', 'href' => 'http://stungeye.com'],

    ['title' => 'ODM',       'href' => 'http://goo.gl/cfHwe7'],

    ['title' => 'Reddit',    'href' => 'http://reddit.com']

];

// Within the body of your html, loop through this array.

// Generate a <ul> unordered list of <a> tags using the data from each of the hashes.


// Task #4 The following hash of hashes contains information about 
// the ghosts from Pacman. The keys for the outer hash are the ghost names.

$ghosts = [

          'Shadow'  => ['nickname' => 'blinky', 'color' => 'red'],

          'Speedy'  => ['nickname' => 'pinky',  'color' => 'pink'],

          'Bashful' => ['nickname' => 'inky',   'color' => 'cyan'],

          'Pokey'   => ['nickname' => 'clyde',  'color' => 'orange'],

      ];

// Within the body of your html, loop through this hash.

// Generate a paragraph tag for each ghost, formatted like this example:

// <p>My name is Shadow. My nickname is blinky. I am red.</p>

// For an extra challenge try to display the text of the nickname in the ghost's colour. 

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8" />

<title>Intro to PHP Challenge</title>

</head>

<body>

<!-- This is where you will be writing and generating your HTML. -->

<p><?= $today ?></p>
<br>
<hr>

<?php foreach($quotes as $quote): ?>
    <p><?= $quote ?></p>
<?php endforeach; ?>

<hr>

<ul>
<?php foreach($links as $link): ?>
    <li><a href="<?= $link['href'] ?>"><?= $link['title'] ?></a></li>
    <?php endforeach; ?>
</ul>

<hr>

<?php foreach($ghosts as $ghost => $ghostInfo): ?>
    <p>My name is <?= $ghost ?>. My nickname is <span style = "color: <?= $ghostInfo['color'] ?>"><?= $ghostInfo['nickname'] ?></span>. I am <?= $ghostInfo['color'] ?>.</p>
    <?php endforeach; ?>


</body>

</html>