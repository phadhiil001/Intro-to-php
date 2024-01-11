<?php
    /*******w******** 
        
        Name: Fadlullah Jamiu-Imam
        Date:
        Description: Write a PHP program that prints the numbers from 1 to 100, one per line.
                     For multiples of three print “Tick” instead of the number and for the multiples of five print “Tock”. For numbers which are multiples of both three and five print “TickTock”.


    ****************/

    for($num = 1; $num <= 100; $num++) {
        if ($num % 3 == 0 && $num % 5 == 0) {
            echo "<p>TickTock</p>";
        } elseif ($num % 5 == 0) {
            echo "<p>Tock</p>";
        } elseif ($num % 3 == 0) {
            echo "<p>Tick</p>";
        } else {echo "<p>{$num}</p>";}
    }
    
?>