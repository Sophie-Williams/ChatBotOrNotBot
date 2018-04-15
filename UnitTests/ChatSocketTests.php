<?php
use PHPUnit\Framework\TestCase;
use Connection\ChatSocket;
require_once dirname(__DIR__) . '/vendor/autoload.php';
/**
 *  test case.
 */
class ChatSocketTests extends TestCase
{
    private $chatSocket;
    
    protected function setUp()
    {
        parent::setUp();
        // TODO Auto-generated ChatSocketTests::setUp()
    }

    protected function tearDown()
    {
        // TODO Auto-generated ChatSocketTests::tearDown()
        parent::tearDown();
    }


    public function __construct()
    {
        $this->chatSocket = new ChatSocket();
    }
    
    public function testWebsocketOpens()
    {
        $chatSocket->onOpen()
    }
}

