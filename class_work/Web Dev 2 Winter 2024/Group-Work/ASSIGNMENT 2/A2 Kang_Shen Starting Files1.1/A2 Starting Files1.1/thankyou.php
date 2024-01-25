<?php

/*******w******** 
    
    Assignment 2
    Name: Kang Shen
    Date:2024-01-16
    Description:assignment 2

 ****************/
$content = "Sorry, this page can only be loaded when submitting an order.";
if (isset($_POST['fullname'])) {
    $content = "Thanks for your order, {$_POST['fullname']}.";
}

function validateForm()
{
    $errors = [];

    // Validate email
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $errors[] = "Invalid email address.";
    }

    // Validate Canadian postal code
    $postalCode = filter_input(INPUT_POST, 'postal');
    if (!preg_match('/^[ABCEGHJKLMNPRSTVXY]\d[A-Z] \d[A-Z]\d$/', $postalCode)) {
        $errors[] = "Invalid postal code.";
    }

    // Validate credit card number
    $creditCardNumber = filter_input(INPUT_POST, 'cardnumber', FILTER_VALIDATE_INT);
    if (!$creditCardNumber || strlen($creditCardNumber) !== 10) {
        $errors[] = "Invalid credit card number.";
    }

    // Validate credit card month
    $creditCardMonth = filter_input(INPUT_POST, 'month', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 12]]);
    if (!$creditCardMonth) {
        $errors[] = "Invalid credit card month.";
    }

    // Validate credit card year
    $currentYear = date('Y');
    $creditCardYear = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT, ['options' => ['min_range' => $currentYear, 'max_range' => $currentYear + 5]]);
    if (!$creditCardYear) {
        $errors[] = "Invalid credit card year.";
    }

    // Validate credit card type
    $creditCardType = filter_input(INPUT_POST, 'cardtype');
    if (!$creditCardType) {
        $errors[] = "Credit card type is required.";
    }

    // Validate non-blank fields
    $requiredFields = ['fullname', 'cardname', 'address', 'city'];
    foreach ($requiredFields as $field) {
        $value = filter_input(INPUT_POST, $field);
        if (empty($value)) {
            $errors[] = "Field '$field' cannot be blank.";
        }
    }

    // Validate province
    $provinces = ['AB', 'BC', 'MB', 'NB', 'NL', 'NS', 'NT', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT'];
    $province = filter_input(INPUT_POST, 'province');
    if (!in_array($province, $provinces)) {
        $errors[] = "Invalid province.";
    }

    // Validate quantities as integers
    $products = ['qty1', 'qty2', 'qty3', 'qty4', 'qty5'];
    foreach ($products as $product) {
        $quantity = filter_input(INPUT_POST, $product, FILTER_VALIDATE_INT);
        if ($quantity === false && $_POST[$product] !== '') {
            $errors[] = "Invalid quantity for $product.";
        }
    }
    // Display errors or process the form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        } else {
            // Process the form data
            return true;
        }
    }
}


$products = [
    ['name' => 'iMac', 'price' => 1899.99],
    ['name' => 'Razer', 'price' => 79.99],
    ['name' => 'WD HDD', 'price' => 179.99],
    ['name' => 'Nexus', 'price' => 249.99],
    ['name' => 'Drums', 'price' => 119.99],
];

$total = 0;
$order = '';

for ($i = 1; $i <= count($products); $i++) {
    $qtyKey = 'qty' . $i;
    $qty = isset($_POST[$qtyKey]) ? filter_var($_POST[$qtyKey], FILTER_VALIDATE_INT) : 0;

    $product = $products[$i - 1];
    $subtotal = $qty * $product['price'];
    if ($qty > 0) {
        // Concatenate the order rows
        $order .= "<tr>
 <td>$qty</td>
 <td>{$product['name']}</td>
 <td class=\"alignright\">$subtotal</td>
</tr>";
        $total += $subtotal;
    }
}

// Now $order contains all the order rows
$order_sum = "<tr>
                <td colspan=\"2\" class=\"alignright\"><span class=\"bold\">Totals</span></td>
                <td class=\"alignright\">
                    <span class=\"bold\">$ $total</span>
                </td>
              </tr>";

// Check if the total  is equal to or more than 20,000
if ($total >= 20000) {
    $bobby =  <<<EOF
<div id="bobby">
    <h2>Congrats on the big order. Bobby Brown congratulates you.</h2>
    <iframe width="600" height="475" src="//www.youtube.com/embed/eI0-n3bkRno"  allowfullscreen=""></iframe>
</div>
EOF;
} else {
    $bobby = null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Thanks for your order!</title>
</head>

<body>
    <div class="invoice">
        <header>
            <h2><?= $content ?></h2>
        </header>

        <?php
        if (validateForm()) : ?>
            <h3>Here's a summary of your order:</h3>

            <table>
                <tr>
                    <td colspan="4">
                        <h3>Address Information</h3>
                    </td>
                </tr>
                <tr>
                    <td class="alignright"><span class="bold">Address:</span>
                    </td>
                    <td><?= $_POST['address'] ?></td>
                    <td class="alignright"><span class="bold">City:</span>
                    </td>
                    <td><?= $_POST['city'] ?></td>
                </tr>
                <tr>
                    <td class="alignright"><span class="bold">Province:</span>
                    </td>
                    <td><?= $_POST['province'] ?></td>
                    <td class="alignright"><span class="bold">Postal Code:</span>
                    </td>
                    <td><?= $_POST['postal'] ?></td>
                </tr>
                <tr>
                    <td colspan="2" class="alignright"><span class="bold">Email:</span>
                    </td>
                    <td colspan="2"><?= $_POST['email'] ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td colspan="3">
                        <h3>Order Information</h3>
                    </td>
                </tr>
                <tr>
                    <td><span class="bold">Quantity</span>
                    </td>
                    <td><span class="bold">Description</span>
                    </td>
                    <td><span class="bold">Cost</span>
                    </td>
                </tr>
                <?= $order ?>
                <?= $order_sum ?>
            </table>
            <?= $bobby ?>
        <?php endif ?>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
</body>

</html>