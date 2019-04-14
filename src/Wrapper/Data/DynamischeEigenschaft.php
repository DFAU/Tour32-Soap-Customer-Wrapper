<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 14.04.19
 * Time: 10:20
 */

namespace T32Dev\SoapCustomer\Wrapper\Data;

use T32Dev\SoapCustomer\Wrapper\Data;

class DynamischeEigenschaft extends Data
{

    protected $defaults = array(
        'Remove'     => true,
        'Vorgang'    => '',
        'DynTyp'     => 0,
        'Schluessel' => '',
        'Text'       => '',

    );

}
