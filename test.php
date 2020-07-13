<?php

require_once dirname(__FILE__) . '/autoload.php';

$cfg = include dirname(__FILE__) . '/config.php';

T32Dev\SoapCustomer\Wrapper::setConfig(
    $cfg['wsdl'],
    $cfg['user'],
    $cfg['pass']
);

$soapWrapper = new \T32Dev\SoapCustomer\Wrapper();
$response    = $soapWrapper->setCustomerData($data = array(
    'Vorname'         => 'Robert',
    'Nachname'        => 'Schwandner',
    'Mail'            => 'robert@kohlenberg.info',
    // 'KontaktHistorie' => array(
    //     'Kontaktart' => 'die Kontaktart 2',
    //     'Quelle'     => 'die Quelle 2',
    //     'Memo'       => 'das Memo 2',
    // ),
    'Passdaten'       => array(
        'Reisepassnummer' => '123456',
        'AusgestelltAm'   => '01.01.2020',
        'AusgestelltIn'   => 'Nürnberg',
        'Gueltig_bis'     => '31.12.2025',
        'Religion'        => '',
        'Staatszugeh'     => 'Deutsch',
        'Geburtsland'     => 'DE',
        'Geburtsort'      => '',
        'Beruf'           => '',
        'NameVater'       => '',
        'ReserveS1'       => '',
        'ReserveS2'       => '',
        'ReserveD'        => '',
        'ReserveI1'       => 0,
        'ReserveI2'       => 0,
        'Visum'           => array(
            array(
                'Nummer'     => '123456789',
                'Land'       => 'DE',
                'VLabel'     => '',
                'Gueltig'    => '01.01.2021',
                'Status'     => '',
                'ReiseDatum' => '05.01.2021',
                'Bemerkung'  => 'Test',
            ),
        ),
    ),
));

print_r($data);

print_r($soapWrapper->getResult());
