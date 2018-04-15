<?php 
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Connection\ChatSocket;

require_once dirname(__DIR__) . '../vendor/autoload.php';
require_once dirname(__DIR__) . '../Config/Autoloader.php';
spl_autoload_register('Autoloader::Loader');

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new ChatSocket()
            )
        ),
    8090
    );

$server->run();
?>