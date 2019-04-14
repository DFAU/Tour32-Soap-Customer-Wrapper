<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 14.04.19
 * Time: 10:18
 */

namespace T32Dev\SoapCustomer\Wrapper\Data;

use T32Dev\SoapCustomer\Wrapper\Data;

class Kind extends Data
{

    protected $defaults = array(
        'Nachname'      => '',
        'Vorname'       => '',
        'Geburtsdatum'  => '',
        'Geschlecht'    => '',
        'Passnummer'    => '',
        'AusgestelltAm' => '',
        'GueltigBis'    => '',
        'AusgestelltIn' => '',
        'Beruf'         => '',
        'Allergien'     => '',
        'Verpflegung'   => '',
        'Nationalitaet' => '',
    );

}
