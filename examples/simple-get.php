<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Http\HttpClient;

$client = new HttpClient();
$response = $client->get('https://postman-echo.com/get', null, []);
var_dump($response);
die();