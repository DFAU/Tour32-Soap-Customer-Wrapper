<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 14.04.19
 * Time: 10:18
 */

namespace T32Dev\SoapCustomer\Wrapper\Data;

use T32Dev\SoapCustomer\Wrapper\Data;

class Visum extends Data
{

    protected $defaults = [
        'Nummer' => '',
        'Land' => '',
        'VLabel' => '',
        'Gueltig' => '',
        'Status' => '',
        'ReiseDatum' => '',
        'Bemerkung' => '',
    ];

}
