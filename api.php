<?php

// Set the header to indicate that the response is JSON.
header('Content-Type: application/json');

// A list of allowed languages to prevent security issues.
$allowed_langs = ['en', 'hi', 'mr', 'sa'];

// Get the requested language from the URL.
$lang = isset($_GET['lang']) && in_array($_GET['lang'], $allowed_langs) ? $_GET['lang'] : 'en';

// === THIS IS THE CORRECTED PATH ===
// It now correctly looks for the 'translations' folder in the same directory.
$file_path = __DIR__ . '/translations/' . $lang . '.json';

// Check if the file actually exists.
if (file_exists($file_path)) {
    // Read the file content.
    $json_content = file_get_contents($file_path);

    // Validate if the content is valid JSON before outputting.
    json_decode($json_content);
    if (json_last_error() === JSON_ERROR_NONE) {
        // If it's valid, output the JSON content.
        echo $json_content;
    } else {
        // If the JSON is broken, send a 500 error.
        http_response_code(500);
        echo json_encode(['error' => 'The JSON file for language ' . $lang . ' is malformed.']);
    }
} else {
    // If the file doesn't exist, send a 404 "Not Found" error.
    http_response_code(404);
    echo json_encode(['error' => 'Translation not found for language: ' . $lang]);
}

?>