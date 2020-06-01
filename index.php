<?php declare(strict_types=1);

require_once './vendor/autoload.php';

use hollodotme\FastCGI\Client;
use hollodotme\FastCGI\Requests\PostRequest;
use hollodotme\FastCGI\SocketConnections\UnixDomainSocket;

$client     = new Client();
$connection = new UnixDomainSocket('/var/run/php/php7.4-fpm-async.sock', 5000, 5000);

for($i=0; $i<10; $i++){
    $content    = http_build_query(['time' => time()]);
    $request    = new PostRequest('/home/nahid/projects/php/fast-cgi-client/shoot.php', $content); #full path of script
    
    $socketId = $client->sendAsyncRequest($connection, $request);
    
    echo "Request sent, got ID: {$socketId}";
}
$logger = new Katzgrau\KLogger\Logger(__DIR__.'/logs');