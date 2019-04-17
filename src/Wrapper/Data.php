<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 14.04.19
 * Time: 10:17
 */

namespace T32Dev\SoapCustomer\Wrapper;

abstract class Data
{
    const GENDER_MALE = 'M';
    const GENDER_FEMALE = 'W';

    protected $defaults = array();

    /**
     * Zusätzliche Eigenschaften - falls Objekte des Webservice sich von den Standard Properties unterscheiden
     *
     *
     * @var array
     */
    protected static $extra_properties = array();

    /**
     * @return array
     */
    public function getDefaults()
    {
        $defaults = $this->defaults;
        if( $extraProperties = self::$extra_properties ) {
            foreach( $extraProperties as $k => $v ) {
                $defaults[$k] = $v;
            }
        }
        return $defaults;
    }

    /**
     * @param array $inputArray
     * @return array
     */
    public function buildRequestData($inputArray)
    {
        $defaults = $this->getDefaults();
        $outputArray = array_merge($defaults, $inputArray);
        return $outputArray;
    }

    /**
     * @param string $name
     * @param mixed $default_value
     */
    public static function addExtraProperty($name, $default_value)
    {
        self::$extra_properties[$name] = $default_value;
    }

}
