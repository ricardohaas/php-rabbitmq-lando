<?php 

require_once 'vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

if(count($argv) != 3 ){
  echo "This function needs two parameters, body and routing key." . PHP_EOL;
  exit;
}

$body = $argv[1];
$routing_key = $argv[2];
$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage($body);
$channel->basic_publish($msg, '', $routing_key);

echo " [x] Sent: $body'\n";

$channel->close();
$connection->close();
