<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 15.04.19
 * Time: 07:59
 */

namespace T32Dev\SoapCustomer\Wrapper;


/**
 * Class Result
 * @package T32Dev\SoapCustomer\Wrapper
 *
 * @property int Status
 * @property int Error
 * @property int DynError
 * @property int ID
 * @property string Doub
 */
class Result
{

    private $_stdObject = null;

    public function __construct($stdObject)
    {
        $this->_stdObject = $stdObject;
    }


    public function __get($property)
    {
        if ($this->_stdObject) {
            if (property_exists($this->_stdObject, $property)) {
                return $this->_stdObject->$property;
            }
        }
    }

}
