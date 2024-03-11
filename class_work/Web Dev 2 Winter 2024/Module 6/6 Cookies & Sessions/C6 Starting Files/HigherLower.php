<?php

/*******w******** 
        
        Name: Fadlullah Jamiu-Imam
        Date: March 07th, 2024
        Description: Creating a game to generate random number and keep count of the number of times the user tried.

 ****************/

session_start();

define("RANDOM_NUMBER_MAXIMUM", 100);
define("RANDOM_NUMBER_MINIMUM", 1);

$user_submitted_a_guess = isset($_POST['guess']);
$user_requested_a_reset = isset($_POST['reset']);

// Implement the guessing game logic here.

// Initialize or reset the random number and the number of attempts.
if (!isset($_SESSION['secretNumber']) || $user_requested_a_reset) {
    $_SESSION['secretNumber'] = rand(RANDOM_NUMBER_MINIMUM, RANDOM_NUMBER_MAXIMUM);
    $_SESSION['attempts'] = 0;
}

if ($user_submitted_a_guess) {
    // Casting the user input to an integer
    $user_guess = (int)$_POST['user_guess'];


    if ($user_guess >= RANDOM_NUMBER_MINIMUM && $user_guess <= RANDOM_NUMBER_MAXIMUM) {

        // keep count
        $_SESSION['attempts']++;

        // check if correct           
        if ($user_guess < $_SESSION['secretNumber']) {
            // give hint if not correct and there are number of attempts made
            $message = "Sorry, guess again but higher. Number of attempts: " . $_SESSION['attempts'];
        } elseif ($user_guess > $_SESSION['secretNumber']) {
            $message = "Sorry, guess again but lower. Number of attempts: " . $_SESSION['attempts'];
        } else {
            $message = "You got it! It took you " . $_SESSION['attempts'] . " attempts!. Guess again?";

            // Reset the secret number and the number of attempts for next round 
            unset($_SESSION['secretNumber'], $_SESSION['attempts']);
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Number Guessing Game</title>
</head>

<body>
    <h1>Guessing Game</h1>

    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="post">
        <label for="user_guess">Your Guess</label>
        <input id="user_guess" name="user_guess" autofocus>
        <input type="submit" name="guess" value="Guess">
        <input type="submit" name="reset" value="Reset">
    </form>

</body>

</html>