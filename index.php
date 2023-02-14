<?php
require "./vendor/autoload.php" ;

use Symfony\Component\HttpClient\HttpClient;

if ($_SERVER["QUERY_STRING"] == "index.php") {
    exit('wrong request');
}

$req_params = str_replace('index.php&', '', $_SERVER["QUERY_STRING"]);
$req_params = explode('&', $req_params);

$client = HttpClient::create(['verify_peer' => false, 'verify_host' => false]);
$response = $client->request('GET', "https://www.resup.ir/$req_params[0]?$req_params[1]");

$statusCode = $response->getStatusCode();
// $statusCode = 200

$content = $response->getContent();

echo $content;