<?php

/*******w******** 
    
    Name: Fadlullah Jamiu-Imam
    Date: 22nd January, 2024
    Description: this page is the server-side validation for the website. On this page, after the user clicks on the proceed to order button, he is either directed to the page of the order mor directed to a page asking him to go back and fill out the appropriate field.

****************/


// Assume $cartItems is an array containing cart items
$cartItems = [
    ['quantity' => $_POST['qty1'], 'description' => 'MacBook', 'price' => 1899.99],
    ['quantity' => $_POST['qty2'], 'description' => 'Razer Gaming Mouse', 'price' => 79.99],
    ['quantity' => $_POST['qty3'], 'description' => 'WD My Passport Portable HDD', 'price' => 179.99],
    ['quantity' => $_POST['qty4'], 'description' => 'Google Nexus 7', 'price' => 249.99],
    ['quantity' => $_POST['qty5'], 'description' => 'DD-45 Drum Kit', 'price' => 119.99],
];

// Calculate the total cost
$totalCost = 0;
foreach ($cartItems as $item) {
    $totalCost += (int)$item['quantity'] * $item['price'];
}

$formattedTotalCost = number_format($totalCost, 2); 

// Ensure something was set in the post
if (isset($_POST['fullname'])) {
    $content = "Thanks for your order {$_POST['fullname']}.";
    $note = "Here's a summary of your order:";
}

// Validate the form data submitted
function validateFormData() {
    $errors = [];

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        $errors[] = "Invalid email address";
    }

    $postalCode = filter_input(INPUT_POST, 'postal', FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/']]);
    if ($postalCode === false) {
        $errors[] = "Invalid postal code";
    }

    $creditCardNumber = filter_input(INPUT_POST, 'cardnumber', FILTER_VALIDATE_INT);
    if ($creditCardNumber === false || strlen((string) $creditCardNumber) !== 10) {
        $errors[] = "Invalid card number";
    }

    $creditCardMonth = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 12]]);
    if ($creditCardMonth === false) {
        $errors[] = "Invalid credit card month";
    }

    $creditCardYear = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT, ['options' => ['min_range' => date('Y'), 'max_range' => date('Y') + 5]]);
    if ($creditCardYear === false) {
        $errors[] = "Invalid credit card year";
    }

    $creditCardType = filter_input(INPUT_POST, 'cardtype', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    if ($creditCardType === null || ($creditCardType)) {
        $errors[] = "You must choose a card type";
    }

    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    if (empty($fullname)) {
        $errors[] = "Full Name is required";
    }

    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    if (empty($city)) {
        $errors[] = "City is required";
    }

    $cardName = filter_input(INPUT_POST, 'cardname', FILTER_SANITIZE_STRING);
    if (empty($cardName)) {
        $errors[] = "Card Name is required";
    }

    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    if (empty($address)) {
        $errors[] = "Address is required";
    }

    $validProvinces = ['AB', 'BC', 'MB', 'NB', 'NL', 'NS', 'NT', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT'];
    $province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_STRING);
    if (!in_array($province, $validProvinces)) {
        $errors[] = "Invalid province selection";
    }

    for ($i = 1; $i <= 5; $i++) {
        $qtyKey = 'qty' . $i;
        $quantity = filter_input(INPUT_POST, $qtyKey, FILTER_VALIDATE_INT);

        if ($quantity === false && $_POST[$qtyKey] !== '') {
            $errors[] = "Invalid quantity for product $i";
        }
    }

    return $errors;
}

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
    <div class="invoice" id="rollingrick">
        <?php
        $validationErrors = validateFormData();

        if (empty($validationErrors)) :
        ?>
            <div class="bold">
                <h1><?= $content ?></h1>
                <h2><?= $note ?></h2>

                <table>
                    <tr>
                        <td colspan="4">Address Information</td>
                    </tr>
                    
                    <tr>
                        <td class="alignright">Address:</td>
                        <td><?= $_POST['address'] ?></td>
                        <td class="alignright">City:</td>
                        <td><?= $_POST['city'] ?></td>
                    </tr>
                    <tr>
                        <td class="alignright">Province:</td>
                        <td><?= $_POST['province'] ?></td>
                        <td class="alignright">Postal Code:</td>
                        <td><?= $_POST['postal'] ?></td>
                    </tr>
                    <tr>
                        <td class="alignright" colspan="2">Email:</td>
                        <td colspan="2"><?= $_POST['email'] ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <td colspan="3">Order Information</td>
                    </tr>
                    
                    <tr>
                        <td>Quantity</td>
                        <td>Description</td>
                        <td>Cost</td>
                    </tr>
                    <?php foreach ($cartItems as $item) : ?>
                        <?php if ((int)$item['quantity'] > 0) : ?>
                            <tr>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= $item['description'] ?></td>
                                <td class="alignright"><?= (int)$item['quantity'] * $item['price'] ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" class="alignright">Totals</td>
                        <td class="alignright">$ <?= $totalCost ?></td>
                    </tr>
                </table>
            </div>

        <?php else : ?>
            <h4>Sorry, this page can only be loaded when submitting an order.</h4>
            <ul>
                <?php foreach ($validationErrors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif ?>
    </div>

</body>

</html>