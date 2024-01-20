<?php 
    // Ensure something was set in the post
    if(isset($_POST['fname'])) {
        $content = "Thank you for your submission, {$_POST['fname']}.";
    }

    // Validate the student number
    function filterinput() {
        return filter_input(INPUT_POST, 'studentnum', FILTER_VALIDATE_INT);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thank you for your submission</title>
    <link rel="stylesheet" type="text/css" href="formstyle.css" />
</head>
<body>
    <div id="wrapper">
        <h4><?= $content ?></h4>
        <?php if(filterinput()): ?>
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
                if ($_POST['program'] == "BIT") {
                    $majorContent = $_POST['bitmajor'];
                }
                elseif ($_POST['program'] == "BA") {
                    $majorContent = $_POST['bamajor'];
                }

                if (isset($majorContent)):
            ?>
                <tr>
                    <td>Major: </td>
                    <td><?= $majorContent ?></td>
                </tr>
            <?php endif ?>
        </table>
        <?php else: ?>
            <h4>You did not supply an appropriate student nunmber</h4>
        <?php endif ?>
    </div>
</body>
</html>