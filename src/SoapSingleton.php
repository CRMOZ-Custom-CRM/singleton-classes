<?php

namespace SingletonClasses;

class SoapSingleton
{
    const DEFAULT_CONNECTION_TIMEOUT = 30;

    public $soapClient = null;

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

    public function getSoapClient($wsdl, $connectionTimeout = self::DEFAULT_CONNECTION_TIMEOUT)
    {
        if($this->soapClient === null) {
            $this->soapClient = new \SoapClient($wsdl, ['connection_timeout' => $connectionTimeout]);
        }
        return $this->soapClient;
    }

}