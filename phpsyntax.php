<?php
    // PHP Intro Demo
    // Basic of PHP Syntax
    // Jan 09 2024

    // Getting to know the common syntax in php

    // Hello World
    echo "<p>Hello World</p>";

    // How to write variables
    $cats = 13;
    $cat_feet = $cats * 4;
    $feet_story = "<p>Once there were " . $cat_feet . " cat feet in our kitchen.</p>";

    echo "$feet_story";

    $my_int = 12;
    $my_float = (float)$my_int; // Casting to a float... the value of $my_int is now casted as a float value not an integer value
    unset($my_int); // Setting a variable to NULL ($my_int is now set to NULL)

    if(!isset($my_int) && is_float($my_float)){
        echo "<p>All is well</p>";
    }

    // To make a constant... use "define" in lower_case not upper_case
    // to define constants
    define("THE_ANSWER", 42);
    define("FULL_NAME", "Fadlullah Jamiu-Imam");
    echo "<p>" . FULL_NAME . " knows the answer: " . THE_ANSWER . "</p>";

    
    // Strings
    $name = "Bobby Brown";
    $fancy_string = "My name is {$name}. <br/ >"; // we want the value of ${name} to evaluate the name
    $plain_string = 'My name is {$name}. <br/ >'; // note the single quote used - 

    echo $fancy_string; // this prints the value of the stored value in the ${name}
    echo $plain_string; // this prints the literal code written

    // to append to a string
    $fancy_string .= "<p>Our name is " . strlen($name) . " characters long.</p>"; // how to check the number of character, use "strlen()"
    echo $fancy_string;

    // Arrays
    // to create arrays
    $numbers = [1,2,3];
    $to_do_list = ["finish marking", "play pool", "cook dinner"];

    // to append or add something to an array- add [] after the variable name
    $to_do_list[] = "practice taxidermy";

    echo "<p>Fadlullah, {$to_do_list[0]} now!</p>";
    echo "<p>There are " . count($to_do_list) . " in our array.</p>"; // to count the number of item in an array- use "count()"


    // Print_r 
    // to printout the content of the array
    $numbers = "4,8,15,16,23,42";
    // to convert the above string into an array create another variable and add the "explode()" fxn after the = sign
    // start with the [explode("deliminator", "name of variable")];
    //then print the new variable to confirm
    $dharma_hatch = explode("," , $numbers);
    print_r($dharma_hatch);

    
    // testing loop
    foreach($dharma_hatch as $hatch){
        echo "<p> Now press {$hatch}</p>";
    }

    // Creating a function
    function say_good_day($name) {
        echo "<p>A fine day {$name}!</p>";
    }

    say_good_day($name);
?>