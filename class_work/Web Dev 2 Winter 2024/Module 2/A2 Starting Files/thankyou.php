<?php

/*******w******** 
    
    Name:
    Date:
    Description:

****************/

// // Ensure something was set in the post
// if(isset($_POST['fullname'])) {
//     $content = "Thanks for your order {$_POST['fullname']}.";
//     $note = "Here's a summary of your order:";
// }



// // Validate the form data submitted
// function validateFormData() {
//     $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
//     if ($email === false) {
//         echo "<p>Invalid email address</p>";
//     } 

//     $postal_code = filter_input(INPUT_POST, 'postal', FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/']]);
//     if ($postalCode === false) {
//         echo "<p>Invalid postal code.</p>";
//     }

//     $creditCardNumber = filter_input(INPUT_POST, 'cardnumber', FILTER_VALIDATE_INT);
//     if ($creditCardNumber === false || strlen((string) $creditCardNumber) !== 10) {
//         echo "<p>Invalid card number</p>";
//     }
    
//     $creditCardMonth = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 12]]);
//     if ($creditCardMonth === false) {
//         echo "<p>Invalid credit card month</p>";
//     }

//     $creditCardYear = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT, ['options' => ['min_range' => date('Y'), 'max_range' => date('Y') + 5]]);
//     if ($creditCardYear === false) {
//         echo "<p>Invalid credit card year</p>";
//     }

//     $creditCardType = filter_input(INPUT_POST, 'cardtype', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
//     if ($creditCardType === null || empty($creditCardType)) {
//         echo "<p>You must choose a card type</p>";
//     }

//     $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
//     if ($fullname === null || empty($fullname)) {
//         echo "<p>Required field</p>";
//     }
//     $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
//     if ($city === null || empty($city)) {
//         echo "<p>Required field</p>";
//     }
//     $cardName = filter_input(INPUT_POST, 'cardname', FILTER_SANITIZE_STRING);
//     if ($cardName === null || empty($cardName)) {
//         echo "<p>Required field</p>";
//     }

//     $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
//     if (empty($address)) {
//         echo "<p>Required field</p>";
//     }

//     $validProvinces = ['AB', 'BC', 'MB', 'NB', 'NL', 'NS', 'NT', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT'];
//     $province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_STRING);
//     if (!in_array($province, $validProvinces)) {
//         echo "Invalid province selection.";
//     }

//     $quantities = [];
//     for ($i = 1; $i <= 5; $i++) {
//         $qtyKey = 'qty' . $i;
//         $quantity = filter_input(INPUT_POST, $qtyKey, FILTER_VALIDATE_INT);

//         // Allow blank quantities for unordered products
//         if ($quantity === false && $_POST[$qtyKey] !== '') {
//             echo "<p>Invalid quantity for product $i</p>";
//         }

//         $quantities[$qtyKey] = $quantity;
//     }

// }



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
    if ($creditCardType === null || empty($creditCardType)) {
        $errors[] = "You must choose a card type";
    }

    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
    if ($fullname === null || empty($fullname)) {
        $errors[] = "Full Name is required";
    }

    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    if ($city === null || empty($city)) {
        $errors[] = "City is required";
    }

    $cardName = filter_input(INPUT_POST, 'cardname', FILTER_SANITIZE_STRING);
    if ($cardName === null || empty($cardName)) {
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

// Usage
$validationErrors = validateFormData();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="p2formstyles.css">
    <link rel="stylesheet" href="main.css">
    <title>Thanks for your order!</title>
</head>
<body>
    <!-- Remember that alternative syntax is good and html inside php is bad -->
    <div class="invoice">

    <?php if (empty($validationErrors)): ?>
        <div>
            <h1><?= $content ?></h1>
            <h2><?= $note ?></h2>
        </div>
        

        <div id="rollingrick">
            <table>
                <th class="bold">Address Infomation</th>
                <tr>
                    <td>Address:</td>
                    <td><?= $_POST['address'] ?></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><?= $_POST['city'] ?></td>
                </tr>
                <tr>
                    <td>Province:</td>
                    <td><?= $_POST['province'] ?></td>
                </tr>
                <tr>
                    <td>Postal Code:</td>
                    <td><?= $_POST['postal'] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?= $_POST['email'] ?></td>
                </tr>
            </table>
            <table>
                <th>Order Information</th>
                <tr>
                    <td>Quantity</td>
                    <td>Description</td>
                    <td>Cost</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Totals</td>
                    <td><?= $_POST['city'] ?></td>
                </tr>
            </table>       
        </div>

        <?php else: ?>
            <h4>Sorry, this page can only be loaded when submitting an order.</h4>
            
        <?php endif ?>
    </div>
    
</body>
</html>