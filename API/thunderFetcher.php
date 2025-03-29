<?php

// Convert to JSON
header('Content-Type: application/json');

// No location = No data
$location = $_GET['location'] ?? '';
if (empty($location)) {
    http_response_code(400);
    exit;
}


// API key and URL
$APIKey = "###############################";  // Get your own API key <3 :P
$APIUrl = "http://api.weatherapi.com/v1/current.json?key=$APIKey&q=$location";



// Initialize cURL session
$cUrl = curl_init($APIUrl);
curl_setopt_array($cUrl, [
    CURLOPT_URL => $APIUrl,
    CURLOPT_RETURNTRANSFER => true,
]);

// Execute/Send/Close cURL session + response
echo curl_exec($cUrl);
curl_close($cUrl);