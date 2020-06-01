<?php declare(strict_types=1);

require_once './vendor/autoload.php';

use GuzzleHttp\Client;

$logger = new Katzgrau\KLogger\Logger(__DIR__.'/logs');
$logger->info('sending_http_request');

$client = new Client(['defaults' => [
    'verify' => false
    ]]);
$client->post('https://postb.in/1591009606542-2537536595482', ['form_params' => $_POST]);
    
echo 'processed';