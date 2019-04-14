<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 14.04.19
 * Time: 10:18
 */

namespace T32Dev\SoapCustomer\Wrapper\Data;


use T32Dev\SoapCustomer\Wrapper\Data;

class Customer extends Data
{
    protected $defaults = array(
        'FunctionType'     => 1,
        'Nachname'         => '',
        'Vorname'          => '',
        'Geschlecht'       => '',
        'Geburtsdatum'     => '',
        'Mail'             => '',
        'Anrede'           => '',
        'Strasse'          => '',
        'CO'               => '',
        'Zusatz'           => '',
        'PLZ'              => '',
        'Ort'              => '',
        'Land'             => '',
        'Kategorie'        => 0,
        'Vorwahl'          => '',
        'Telefon'          => '',
        'Fax'              => '',
        'Handy'            => '',
        'VorwahlG'         => '',
        'TelefonG'         => '',
        'FaxG'             => '',
        'MailG'            => '',
        'HandyG'           => '',
        'Herkunft'         => '',
        'Passnummer'       => '',
        'AusgestelltAm'    => '',
        'GueltigBis'       => '',
        'AusgestelltIn'    => '',
        'Beruf'            => '',
        'Allergien'        => '',
        'Verpflegung'      => '',
        'Nationalitaet'    => '',
        'Bemerkung'        => '',
        'Partner'          => null,
        'Kinder'           => array(),
        'DynEigenschaften' => array(),
    );
}
