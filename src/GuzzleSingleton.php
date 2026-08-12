<?php
namespace SingletonClasses;

use GuzzleHttp\Client;

class GuzzleSingleton
{
    const DEFAULT_CONNECT_TIMEOUT = 5;
    const DEFAULT_TIMEOUT = 30;

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

    public function getHttpClient($connectTimeout = self::DEFAULT_CONNECT_TIMEOUT, $timeout = self::DEFAULT_TIMEOUT)
    {
        if($this->httpClient === null) {
            $this->httpClient = new Client(['connect_timeout' => $connectTimeout, 'timeout' => $timeout]);
        }
        return $this->httpClient;
    }

}