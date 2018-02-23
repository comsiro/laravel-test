<?php
$api_url = "http://localhost:7080/api/users";
$token = $session->token; // See: https://gist.github.com/woganmay/88f15e96fc019657a0e594366403b5cf
// This must be a token for a user with Administrator access
$new_username = "test1";
$new_password = "test1234";
$new_email = "test1@test.org";
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Token ' . $token,
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'data' => [
        'attributes' => [
            "username" => $new_username,
            "password" => $new_password,
            "email" => $new_email,
        ],
    ],
]));
$result = curl_exec($ch);
$new_user = json_decode($result);

$new_user; // Will be a large JSON object containing the new user's details:

$generated_password = substr(md5(microtime()), 0, 12);

// $new_user is the result of the POST /api/users call
$user->forum_id = $new_user->data->id;
$user->forum_password = $generated_password;
$user->save();

if($user->forum_id != null) { /* Integrated successfully */ }

/* SAMPLE
{
"data":
"type": "users",
"id": "1",
"attributes": {
"username": "johnsmith",
"joinTime": "2017-02-11T16:34:40+00:00",
"isActivated": false,
"email": "john.smith@example.org",
}
}
 */
