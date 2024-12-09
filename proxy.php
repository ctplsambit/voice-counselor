<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, x-api-key');
header('Content-Type: application/json');

$api_url = 'https://f0dswhkb15.execute-api.us-east-1.amazonaws.com/dev/counselor-status';
$api_key = '0BAR6wTBIx4VMi1F7DgCj8VLbGNZwJy55ZOKiX0H';

$postData = json_decode(file_get_contents('php://input'), true);

$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'x-api-key: ' . $api_key
));

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

http_response_code($httpCode);
echo $response; 