<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 14.04.19
 * Time: 10:18
 */

namespace T32Dev\SoapCustomer\Wrapper\Data;

use T32Dev\SoapCustomer\Wrapper\Data;

class Passdaten extends Data
{

    protected $defaults = array(
        'Reisepassnummer' => '',
        'AusgestelltAm'   => '',
        'AusgestelltIn'   => '',
        'Gueltig_bis'     => '',
        'Religion'        => '',
        'Staatszugeh'     => '',
        'Geburtsland'     => '',
        'Geburtsort'      => '',
        'Beruf'           => '',
        'NameVater'       => '',
        'ReserveS1'       => '',
        'ReserveS2'       => '',
        'ReserveD'        => '',
        'ReserveI1'       => 0,
        'ReserveI2'       => 0,
        'Visum'           => array(),
    );

}
