<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 14.04.19
 * Time: 09:49
 */

namespace T32Dev\SoapCustomer;

use T32Dev\SoapCustomer\Wrapper\Data\Customer;
use T32Dev\SoapCustomer\Wrapper\Kind;

class Wrapper
{

    /** @var Wrapper */
    private static $_instance = null;

    private static $_wsdl = null;
    private static $_soapUser = null;
    private static $_soapPassword = null;


    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * Singleton instance
     * @return Wrapper
     */
    private static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        self::$_instance->checkIfConfigured();
        return self::$_instance;
    }

    /**
     * Sets wsdl and credentials
     *
     * @param $wsdl
     * @param $soapUser
     * @param $soapPassword
     * @return bool
     */
    public static function setConfig($wsdl, $soapUser, $soapPassword)
    {
        self::$_wsdl = $wsdl;
        self::$_soapUser = $soapUser;
        self::$_soapPassword = $soapPassword;
        return true;
    }


    /**
     * @return bool
     */
    private function checkIfConfigured() {
        return (self::$_wsdl && self::$_soapUser && self::$_soapPassword);
    }


    /**
     * @param array $data
     */
    public static function setCustomerData($data)
    {
        $inst = self::getInstance();
        $DataCustomer = new Customer();
        $data = $DataCustomer->buildRequestData($data);
        $data = array_merge($data, array('SoapUser' => self::$_soapPassword, 'SoapPassword' => self::$_soapPassword));


        try {
            $client = new \SoapClient(self::$_wsdl);
            try {
                $result = $client->__call('SetData', ['TCustomerData' => $data]);
                // alles OK
                echo "Status: " 		. $result->Status ."\n";
                echo "Error: "  		. $result->Error . "\n";
                echo "Kundennummer: "  	. $result->ID . "\n";
                echo "Doublette: "  	. $result->Doub . "\n";
            } catch (Exception $ex) {
                die( "Fehler:" . $ex->getMessage() . ' - ' . $client->__getLastResponse() );
            }
        } catch( SoapFault $sf )  {
            die("SoapFault: " . $sf->getMessage());
        } catch ( Exception $ex ) {
            die("Exception: " . $ex->getMessage());
        }
    }




}
