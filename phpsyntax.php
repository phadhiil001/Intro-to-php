<?php
    // PHP Intro Demo
    // Basic of PHP Syntax
    // Jan 09 2024

    // Hello World
    echo "<p>Hello World</p>";

    // How to write variables
    $cats = 13;
    $cat_feet = $cats * 4;
    $feet_story = "<p>Once there were " . $cat_feet . " cat feet in our kitchen.</p>";

    echo "$feet_story";

    $my_int = 12;
    $my_float = (float)$my_int; // Casting to a float
    unset($my_int); // Setting a variable to NULL

    if(!isset($my_int) && is_float($my_float)){
        echo "<p>All is well</p>";
    }

    // to define constants
    define("THE_ANSWER", 42);
    define("FULL_NAME", "Fadlullah Jamiu-Imam");
    echo "<p>" . FULL_NAME . " knows the answer: " . THE_ANSWER . "</p>"
?>