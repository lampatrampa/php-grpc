<?php
/**
 * Sample GRPC PHP server.
 */

use Spiral\Goridge;
use Spiral\RoadRunner;

ini_set('display_errors', 'stderr');
require "vendor/autoload.php";

//To run server in debug mode - new \Spiral\GRPC\Server(null, ['debug' => true]);
$server = new \Spiral\GRPC\Server();
$server->registerService(\Service\EchoInterface::class, new EchoService());

$w = new RoadRunner\Worker(new Goridge\StreamRelay(STDIN, STDOUT));
$server->serve($w);