<?php

$file_extension = pathinfo($_FILES["picture"]["name"], PATHINFO_EXTENSION);
$valid_extensions = ["png", "jpg", "jpeg"];

// if the file not a picture
if (!in_array($file_extension, $valid_extensions)) {
    header("Location: /client.php");
    return;
}

// generate a random string
function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}|;:,.<>?';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

$filename = generateRandomString(12).".".$file_extension;
$username = $_POST["username"];
$filepath = "./pictures/$username/$filename";

if (!$_FILES["picture"]['error']) {
    // if file don't exist
    if (!file_exists($username)) {
        mkdir("pictures/$username", 0755, true);
        
        move_uploaded_file($_FILES["picture"]["tmp_name"], $filepath);
        header("Location: /client.php");
        return;
    // if file exist
    } else {
        move_uploaded_file($_FILES["picture"]["tmp_name"], $filepath);
        header("Location: /client.php");
        return;
    }
} else {
    header("Location: /client.php");
}
