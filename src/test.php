<?php

require_once dirname(__FILE__) . '/autoload.php';

T32Dev\SoapCustomer\Wrapper::setConfig(
    'http://87.139.235.208:5001/Tour32/customercgi.exe/wsdl/ICustomer',
    'TourIBE',
    'TourIBE'
);

$soapWrapper = new \T32Dev\SoapCustomer\Wrapper();
$response    = $soapWrapper->setCustomerData(array(
    'Vorname'         => 'Max',
    'Nachname'        => 'Mustermann',
    'Mail'            => 'max@mustermann.de',
    'KontaktHistorie' => array(
        'Kontaktart' => '',
        'Quelle'     => '',
        'Memo'       => '',
    ),
    'Passdaten'       => array(
        'Reisepassnummer' => '123456',
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
        'Visum'           => array(
            'Nummer'     => '',
            'Land'       => '',
            'VLabel'     => '',
            'Gueltig'    => '',
            'Status'     => '',
            'ReiseDatum' => '',
            'Bemerkung'  => '',
        ),
    ),
));

print_r($soapWrapper->getResult());
