<?php
/************

    Name: Sumaiyah 
    Date: 22 January, 2024
    Description: This is php for assignment 2

****************/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="thankyoustyles.css" >
    <title>Thanks for your order!</title>
</head>
<body>
    <?php
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Define an array to store validation error messages
        $validationErrors = [];

        // Validate email address
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $validationErrors[] = "Invalid email address";
        }

        // Validate postal code using regular expression
        $postalCode = trim($_POST['postal']);
        if (!preg_match('/^[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d$/', $postalCode)) {
            $validationErrors[] = "Invalid Canadian postal code";
        }

        // Validate credit card number as an integer
        $creditCardNumber = filter_input(INPUT_POST, 'cardnumber', FILTER_SANITIZE_NUMBER_INT);
        if (!preg_match('/^\d{10}$/', $creditCardNumber)) {
            $validationErrors[] = "Invalid credit card number";
        }

        // Validate credit card month as an integer from 1 to 12
        $creditCardMonth = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 12]]);
        if ($creditCardMonth === false) {
            $validationErrors[] = "Invalid credit card month";
        }

        // Validate credit card year as an integer with a minimum value of the current year and a maximum value of 5 years from the current year
        $currentYear = date("Y");
        $creditCardYear = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);

        if ($creditCardYear === false || $creditCardYear < $currentYear || $creditCardYear > ($currentYear + 5)) {
            $validationErrors[] = "Invalid credit card year";
        }

        // Validate credit card type (at least one selection)
        $creditCardTypes = isset($_POST['cardtype']) ? $_POST['cardtype'] : [];
        if (empty($creditCardTypes)) {
            $validationErrors[] = "Please select at least one credit card type";
        }

        // Validate that the full name, card name, address, city, and province are not blank
        $fullName = trim($_POST['fullname']);
        $cardName = trim($_POST['cardname']);
        $address = trim($_POST['address']);
        $city = trim($_POST['city']);
        $province = trim($_POST['province']);

        if ($fullName === '' || $cardName === '' || $address === '' || $city === '' || $province === '') {
            $validationErrors[] = "Please fill in all required fields";
        }

        // Validate quantities (must be integers)
        $quantities = [];
        for ($i = 1; $i <= 5; $i++) {
            $qtyKey = 'qty' . $i;
            $quantity = filter_input(INPUT_POST, $qtyKey, FILTER_VALIDATE_INT);
            if ($quantity === null || $_POST[$qtyKey] === '' || $quantity === false || $quantity < 0) {
                $quantities[$i - 1] = 0;
            } else {
                $quantities[$i - 1] = $quantity;
            }
        }

        // Validate province
        $province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_STRING);
        $validProvinces = ['AB', 'BC', 'MB', 'NB', 'NL', 'NS', 'NT', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT'];
        if (!in_array($province, $validProvinces)) {
            $validationErrors[] = "Invalid province selected";
        }

        // If there are validation errors, display them and do not generate an invoice
        if (!empty($validationErrors)) {
            echo "<h2>Form could not be processed due to the following errors:</h2>";
            echo "<ul>";
            foreach ($validationErrors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        } else {
            // If validation passes, generate the order summary
            $itemDescription = ["MacBook", "The Razer", "WD My Passport", "Nexus 7", "DD-45 Drums"];
            $itemPrice = [1899.99, 79.99, 179.99, 249.99, 119.99];

            echo "<h2>Thanks for your order $fullName </h2>";
            echo "<h1>Here's a summary of your order:</h1>";
            echo "<table><tr>"; 
            echo "<th colspan='4'>Address Information</th></tr>";
            echo "<tr><td>Address:</td><td> $address</td><td>City:</td><td> $city</td></tr>";
            echo "<tr><td>Province:</td><td> $province</td><td>Postal Code:</td><td> $postalCode</td></tr>";
           
            echo "<tr><td colspan='2'>Email</td><td colspan='2'>" . $email ."</td></tr>";
            echo "</table>";
            
        
            echo "<table><tr>";
            echo "<th colspan='3'>Order Information</th></tr>";
            echo "<tr><td>Quantity</td><td>Description</td><td>Cost</td></tr>";
           

            $orderTotal = 0;
            for ($i = 0; $i < count($itemDescription); $i++) {
                $itemTotal = $quantities[$i] * $itemPrice[$i];
                $orderTotal += $itemTotal;

                if ($quantities[$i] > 0) {
                    echo "<tr>";
                    echo "<td>{$quantities[$i]}</td>";
                    echo "<td>{$itemDescription[$i]}</td>";
                    echo "<td>$" . number_format($itemTotal, 2) . "</td>";
                    echo "</tr>";
                }
            }

            echo "<tr><td colspan='2'>Total</td><td>$" . number_format($orderTotal, 2) . "</td></tr>";
            echo "</table>";

            // Check if the total cost is equal to or more than 20,000
            if ($orderTotal >= 20000) {
                echo '<div id="rollingrick">';
                echo '<h2>Congrats on the big order. Rick Astley congratulates you.</h2>';
                echo '<iframe width="600" height="475" src="//www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen=""></iframe>';
                echo '</div>';
            }
        }
    }
    ?>
</body>
</html>