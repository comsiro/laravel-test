<?php
// Details to access Flarum
$api_url = "http://localhost:7080/api/token";
$username = "default_admin";
$password = "default_pass";
// CURL call
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
   'Content-Type: application/json'
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
  'identification' => $username,
  'password'       => $password
]));
$result = curl_exec($ch);
$session = json_decode($result);
$session->token; // API Token
$session->userId; // Authenticated user ID
?>