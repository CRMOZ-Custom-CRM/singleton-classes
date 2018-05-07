<?php
namespace SingletonClasses;

use GuzzleHttp\Client;

class GuzzleSingleton
{

    public $httpClient = null;

    private static $instance = null;


    public static function getInstance()
    {
        if (null === self::$instance)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone() {}

    private function __construct() {}

    public function getHttpClient()
    {
        if($this->httpClient === null) {
            $this->httpClient = new Client();
        }
        return $this->httpClient;
    }

}