<?php 
    // Ensure something was set in the post
    if(isset($_POST['fname'])) {
        $content = "Thank you for your submission, {$_POST['fname']}.";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thank you for your submission</title>
</head>
<body>
    <div id="wrapper">
        <h4><?= $content ?></h4>
        <table>
            <tr>
                <td>Name:</td>
                <td><?= $_POST['fname'] . " " . $_POST['lname'] ?></td>
            </tr>
            <tr>
                <td>Student Number: </td>
                <td><?= $_POST['studentnum'] ?></td>
            </tr>
            <tr>
                <td>Program: </td>
                <td><?= $_POST['program'] ?></td>
            </tr>
            <?php 
                // if the user chose BIT or BA show their major
                if ($_POST['program' == "BIT"]) {
                    $majorContent = $_POST['bitmajor'];
                }
                elseif ($_POST['program'] == "BA") {
                    $majorContent = $_POST['bamajor'];
                }
            ?>
        </table>
    </div>
</body>
</html>