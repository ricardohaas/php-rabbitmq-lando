<?php

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;

$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

if(count($argv) != 2 ){
  echo "This function needs one parameters, the routing key." . PHP_EOL;
  exit;
}

$queue = $argv[1];

echo "Listening $queue queue..." . PHP_EOL;

$channel->queue_declare($queue, false, false, false, false);

$callback = function ($msg) {
  echo ' [x] Received ', $msg->body, "\n";
};

$channel->basic_consume($queue, '', false, true, false, false, $callback);

while ($channel->is_open()) {
    $channel->wait();
}