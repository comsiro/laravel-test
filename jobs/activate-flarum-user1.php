<?php
$api_url = "http://localhost:7080/api/users/" . $userid; // See: https://gist.github.com/woganmay/4c15a0f7c16e41ab3a3ea1a73c595bf9
$token = $session->token; // See: https://gist.github.com/woganmay/88f15e96fc019657a0e594366403b5cf
// This must be a token for a user with Administrator access
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Token ' . $token,
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'data' => [
        'attributes' => [
            "isActivated" => true,
        ],
    ],
]));
$result = curl_exec($ch);
$user = json_decode($result);
$user; // Will be a large JSON object containing the user's details:
/* SAMPLE
{
"data":
"type": "users",
"id": "1",
"attributes": {
"username": "johnsmith",
"joinTime": "2017-02-11T16:34:40+00:00",
"isActivated": true,
"email": "john.smith@example.org",
}
}
 */
