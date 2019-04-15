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
use T32Dev\SoapCustomer\Wrapper\Result;

class Wrapper
{


    private static $_wsdl = null;
    private static $_soapUser = null;
    private static $_soapPassword = null;

    /**
     * @var null|Result
     */
    protected $lastResult = null;


    public function __construct()
    {
        if (!$this->checkIfConfigured() ) {
            throw new \Exception("Bitte erst Konfiguration setzen @see T32Dev\SoapCustomer\Wrapper::setConfig()");
        }
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
     * @return boolean
     */
    public function setCustomerData($data)
    {

        $DataCustomer = new Customer();
        $data = $DataCustomer->buildRequestData($data);
        $data = array_merge($data, array('SoapUser' => self::$_soapPassword, 'SoapPassword' => self::$_soapPassword));


        try {
            $client = new \SoapClient(self::$_wsdl);
            try {
                $result = $client->__call('SetData', ['TCustomerData' => $data]);
                $this->lastResult = new Result($result);
                return true;
            } catch (Exception $ex) {
                die( "Fehler:" . $ex->getMessage() . ' - ' . $client->__getLastResponse() );
            }
        } catch( SoapFault $sf )  {
            die("SoapFault: " . $sf->getMessage());
        } catch ( Exception $ex ) {
            die("Exception: " . $ex->getMessage());
        }
        return false;
    }

    /**
     * @return Result|null
     */
    public function getResult() {
        return $this->lastResult;
    }

    /**
     * @return bool
     */
    public function isSuccessful() {
        $lastResult = $this->getResult();
        return ( $lastResult && $lastResult->Status == 0 );
    }




}
