<?php
// cURL initialization 
$curl = curl_init();

// Define the cURL request options
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    // Vimeo has a handy query parameter that will pre-filter the response. See: https://developer.vimeo.com/api/spec#common-parameters
    CURLOPT_URL => 'https://api.vimeo.com/videos/VIDEO_ID?fields=files',
    // Use these steps to get your token: https://developer.vimeo.com/api/start
    CURLOPT_HTTPHEADER => array('Authorization: bearer API_TOKEN')
    ));

// Execute the request and store the response
$response = curl_exec($curl);

// Close the request to clear up some resources
curl_close($curl);

// convert json into something that PHP understands
$data = json_decode($response);

// print_r($data); // uncomment to see the whole object

// Select and print the HLS streaming link from the video properties
print_r($data->files[4]->link);

