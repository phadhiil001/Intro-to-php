<?php

/*******w******** 
    
    Name: Fadlullah Jamiu-Imam
    Date: March 07th, 2024
    Description: Challenge to explore the processing and persistence of form-based file uploads using PHP

 ****************/

require '\xampp\htdocs\My Personal Stuff\Intro-to-php\class_work\Web Dev 2 Winter 2024\Module 6\7 File Upload Demo Files\C7_Fadlullah_Jamiu-Imam\ImageResize.php';

require '\xampp\htdocs\My Personal Stuff\Intro-to-php\class_work\Web Dev 2 Winter 2024\Module 6\7 File Upload Demo Files\C7_Fadlullah_Jamiu-Imam\ImageResizeException.php';

// Default upload path is an 'uploads' sub-folder in the current folder.
function file_upload_path($original_filename, $upload_subfolder_name = 'uploads')
{
    $current_folder = dirname(__FILE__);

    // Build an array of paths segment names to be joins using OS specific slashes.
    $path_segments = [$current_folder, $upload_subfolder_name, basename($original_filename)];

    // The DIRECTORY_SEPARATOR constant is OS specific.
    return join(DIRECTORY_SEPARATOR, $path_segments);
}

// file_is_valid() - Checks the mime-type & extension of the uploaded file.
function file_is_allowed_file($temporary_path, $new_path)
{
    $allowed_mime_types      = ['image/gif', 'image/jpeg', 'image/png', 'application/pdf'];
    $allowed_file_extensions = ['gif', 'jpg', 'jpeg', 'png', 'pdf'];

    $actual_file_extension   = pathinfo($new_path, PATHINFO_EXTENSION);
    $actual_mime_type        = mime_content_type($temporary_path);

    $file_extension_is_valid = in_array($actual_file_extension, $allowed_file_extensions);
    $mime_type_is_valid      = in_array($actual_mime_type, $allowed_mime_types);

    return $file_extension_is_valid && $mime_type_is_valid;
}

// Resize image using PHP Image Resize library
function resize_file($original_filename, $new_path, $max_width)
{
    // Check if the file is a PDF
    $file_extension = pathinfo($original_filename, PATHINFO_EXTENSION);
    if ($file_extension === 'pdf') {
        // Handle PDF files 
        move_uploaded_file($original_filename, $new_path);
        $message = "PDF file uploaded.";
        return;
    }

    $image = new \Gumlet\ImageResize($original_filename);
    $image->resizeToWidth($max_width);
    $image->save($new_path);
}

$file_upload_detected = isset($_FILES['image']) && ($_FILES['image']['error'] === 0);
$upload_error_detected = isset($_FILES['image']) && ($_FILES['image']['error'] > 0);

if ($file_upload_detected) {
    $image_filename        = $_FILES['image']['name'];
    $temporary_image_path  = $_FILES['image']['tmp_name'];
    $new_image_path        = file_upload_path($image_filename);

    if (file_is_allowed_file($temporary_image_path, $new_image_path)) {
        move_uploaded_file($temporary_image_path, $new_image_path);
        $message = "File uploaded successfully.";

        // Extract file extension from the original filename
        $file_extension = pathinfo($image_filename, PATHINFO_EXTENSION);
        $file_name = pathinfo($image_filename, PATHINFO_FILENAME);

        // Resize images
        $medium_image_path = file_upload_path($file_name . "_medium." . $file_extension);
        $thumbnail_image_path = file_upload_path($file_name . "_thumbnail." . $file_extension);

        // Resize original to max width 400px
        resize_file($new_image_path, $medium_image_path, 400);

        // Resize original to max width 50px for the thumbnail
        resize_file($new_image_path, $thumbnail_image_path, 50);
    } else {
        $message = "Invalid file type. Only GIF, JPG, JPEG, PNG, and PDF files are allowed.";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My File Upload Challenge</title>
</head>

<body>
    <!-- 
        Create a form capable of uploading a single image
        This form should POST to itself (action="fileUpload.php")
    -->

    <form method='post' enctype='multipart/form-data'>
        <label for='image'>Filename (Image or PDF):</label>
        <input type='file' name='image' id='image'>
        <input type='submit' name='submit' value='Upload'>
    </form>

    <?php if ($upload_error_detected) : ?>
        <p>Error Number: <?= $_FILES['image']['error'] ?></p>
    <?php elseif ($file_upload_detected) : ?>
        <p><?= $message ?></p>
        <p>Client-Side Filename: <?= $_FILES['image']['name'] ?></p>
        <p>Apparent Mime Type: <?= $_FILES['image']['type'] ?></p>
        <p>Size in Bytes: <?= $_FILES['image']['size'] ?></p>
        <p>Temporary Path: <?= $_FILES['image']['tmp_name'] ?></p>
        <p>Well done</p>
    <?php endif ?>

</body>

</html>