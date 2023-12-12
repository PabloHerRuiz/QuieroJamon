<?php
use GuzzleHttp\Client;

require_once 'vendor/autoload.php';

$client = new Client();

$response = $client->request('GET', 'http://cartero/apiCorreo.php');

echo $response->getBody();
?>