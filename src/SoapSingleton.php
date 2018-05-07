<?php

namespace SingletonClasses;

class SoapSingleton
{

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

    public function getSoapClient($wsdl)
    {
        if($this->soapClient === null) {
            $this->soapClient = new \SoapClient($wsdl);
        }
        return $this->soapClient;
    }

}