<?php
    // another name for hashes is ASSOCIATIVE ARRAYS
    // they are like arrays, instead strings are used know as key-value

    // Hashes Demo
    // They use keys to retrive values instead of zero-based integer

    $actors = ['Patrick Stewart' => 'Jean-Luc Picard', 
                'Kate Mulgrew' => 'Kathryn Janeway',
                'William Shatner' => 'James Kirk'];

    echo "<p>The best Start Trek captain was {$actors['Patrick Stewart']}.</p>";


    // Traversing hashes
    foreach($actors as $actor => $captain){
        echo "<p>{$actor} played the role of Captain {$captain}.</p>";
    }

    // An array of hashes
    $employees = [
        ['name' => 'Jyn Erso',
         'position' => 'Rebel scum'],
        ['name' => 'Fadlullah Jamiu-Imam',
         'position' => 'Developer scum']
     ];

    echo "<p>{$employees[1]['name']} is {$employees[1]['position']}.</p>";

    foreach($employees as $employee){
    echo "<p>{$employee['name']} is {$employee['position']}.</p>";
    }
    
?>