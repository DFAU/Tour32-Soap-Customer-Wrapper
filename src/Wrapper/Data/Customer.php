<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 14.04.19
 * Time: 10:18
 */

namespace T32Dev\SoapCustomer\Wrapper\Data;


use T32Dev\SoapCustomer\Wrapper\Data;
use T32Dev\SoapCustomer\Wrapper\DynamischeEigenschaft;

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

    public function buildRequestData($inputArray)
    {
        $data = parent::buildRequestData($inputArray);
        if (isset($data['Kinder']) && is_array($data['Kinder']) && count($data['Kinder']) > 0) {
            $kinderArray = array();
            foreach ($data['Kinder'] as $kindData) {
                $Kind = new Kind();
                $kinderArray[] = $Kind->buildRequestData($kindData);
            }
            $data['Kinder'] = $kinderArray;
        }
        if (isset($data['Partner']) && is_array($data['Partner']) && count($data['Partner']) > 0) {
            $partnerArray = array();
            foreach ($data['Partner'] as $partnerData) {
                $Partner = new Partner();
                $partnerArray[] = $Partner->buildRequestData($partnerData);
            }
            $data['Partner'] = $partnerArray;
        }
        if (isset($data['DynEigenschaften']) && is_array($data['DynEigenschaften']) && count($data['DynEigenschaften']) > 0) {
            $dynamischeEigenschaftenArray = array();
            foreach ($data['DynEigenschaften'] as $dynData) {
                $DynEigenschaft = new DynamischeEigenschaft();
                $dynamischeEigenschaftenArray[] = $DynEigenschaft->buildRequestData($dynData);
            }
            $data['DynEigenschaften'] = $dynamischeEigenschaftenArray;
        }
        return $data;
    }
}
