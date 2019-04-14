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
    protected $defaults = array();

    /**
     * @return array
     */
    public function getDefaults() {
        return $this->defaults;
    }

}
