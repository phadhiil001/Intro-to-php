<?php

/*******w******** 
    
    Name:Allan Palacios
    Date:2024-01-18 
    Description: Assignment 2 PHP

****************/

$validation_error = [];
$year = [2024];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form validation
    $required_fields = ['fullname', 'address', 'city', 'province', 'postal', 'email', 'cardtype','cardname', 'cardnumber' ];
    
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $validation_error[$field] = ucfirst($field) . ' is required.';
        }
    }

    // Additional validation for email
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $validation_error['email'] = 'Invalid email address.';
    }

    // Additional validation for postal code (Canadian postal code)
    $postal_code_pattern = '/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/';
    if (!preg_match($postal_code_pattern, $_POST['postal'])) {
        $validation_error['postal'] = 'Invalid Canadian postal code.';
    }

    // Additional validation for credit card number
    $card_number = filter_input(INPUT_POST, 'cardnumber', FILTER_SANITIZE_NUMBER_INT);
    if (!is_numeric($card_number) || strlen($card_number) !== 10) {
        $validation_error['cardnumber'] = 'Invalid credit card number.';
    }

    // Additional validation for credit card month and year
    $card_month = filter_input(INPUT_POST, 'cardmonth', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 12]]);

    // Validate and sanitize credit card year
    $year = isset($_POST['year']) ? intval($_POST['year']) : 0;

    // Get the current year
    $currentYear = date('Y');
    
    // Calculate the maximum allowed year (5 years from the current year)
    $maxYear = $currentYear + 5;
 
    // Check if the year is a valid integer within the specified range
    if ($year < $currentYear || $year > $maxYear) {
        $validation_error['Card Expiry'] = 'Error: Invalid credit card expiry year.';
    }
  
      // Additional validation for credit card type
      if (!isset($_POST['cardtype'])) {
          $validation_error['cardtype'] = 'Please select a credit card type.';
      }
    
    // Process form if there are no validation errors
    if (empty($validation_error)) {
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
        $content = "Thank you for your submission, " . htmlspecialchars($fullname) . ".";
        
    } else {
        $content = "There are errors in the form. Please fix them and resubmit.";
        $missing_fields = array_keys(array_filter($validation_error));
        $content .= "<ul>";
        foreach ($missing_fields as $missing_field) {
            $content .= "<li>" . ucfirst($missing_field) . ' is required.</li>';
        }
        $content .= "</ul>";
    }
} else {
    $content = "No data submitted.";
}

$config = [
    'itemDescription' => ["MacBook", "The Razer", "WD My Passport", "Nexus 7", "DD-45 Drums"],
    'itemPrice' => [1899.99, 79.99, 179.99, 249.99, 119.99],
    'quantityField' => ['qty1','qty2','qty3','qty4','qty5' ]
];

$itemDescriptions = $config['itemDescription'];
$itemPrices = $config['itemPrice'];
$quantityFields = $config['quantityField'];
$invoiceTotal = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Thanks for your order!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div class="invoice">
    <h1><?= $content ?></h1>
    
    <?php if (empty($validation_error) && isset($_POST['fullname'])): ?>
        <h2>Here's a summary of your order:</h2> 
        <table>
            <tbody>
                <tr>
                    <td colspan="4"><h3>Address Information</h3></td>
                </tr>
                <tr>
                    <td class="alignright"><span class="bold">Address: </td>
                    <td><?= filter_var($_POST['address'], FILTER_SANITIZE_STRING) ?? ''  ?>
                    <td class="alignright"><span class="bold">City: </td>
                    <td><?= filter_var($_POST['city'], FILTER_SANITIZE_STRING) ?? ''  ?>
                </tr>
                <tr>
                    <td class="alignright"><span class="bold">Province: </td>
                    <td><?= filter_var($_POST['province'], FILTER_SANITIZE_STRING) ?? '' ?>
                    <td class="alignright"><span class="bold">Postal Code: </td>
                    <td><?= filter_var($_POST['postal'],FILTER_SANITIZE_STRING) ?? '' ?>
                </tr>
                <tr>
                    <td colspan="2" class="alignright"><span class="bold">Email Address: </td>
                    <td colspan="2"><?= filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) ?? '' ?></td>
                </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td colspan="3"><h3>Order Information</h3></td>
                </tr>
                <tr>
                    <td><span class="bold">Quantity</td>
                    <td><span class="bold">Description</td>
                    <td><span class="bold">Cost</td>
                </tr>
                <?php
                
                for ($i = 0; $i < count($itemDescriptions); $i++) {
                    $quantityValue = isset($_POST[$quantityFields[$i]]) ? (float)$_POST[$quantityFields[$i]] : 0; 
                    $itemDescription = $itemDescriptions[$i];
                    $itemPrice = $itemPrices[$i];
                   
                    if ($quantityValue > 0) {
                        $totalAmount = $quantityValue * $itemPrice; 
                        $invoiceTotal += $totalAmount; 
                ?>
                        <tr> 
                            <td><?= $quantityValue ?></td>
                            <td><?= $itemDescription ?></td>
                            <td class="alignright"><?= $totalAmount ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
                <tr>
                    <td colspan="2" class="alignright"><span class="bold">Totals</span></td>
                    <td class="alignright"><span class="bold"><?= $invoiceTotal ?></span></td>
                </tr>
                
            </tbody>
        </table>
        <?php if ($invoiceTotal > 20000): ?>
            <div id="rollingrick">
            <p><span class="bold">Thank you for your large purchase of our product! Here is an Epic Sax Guy for you in celebration!</span></p>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/oVcQTECY_ZQ?si=VREMuP74PF2UhSLb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <?php endif ?>
                </div>
    <?php endif ?>
    
</body>
</html>