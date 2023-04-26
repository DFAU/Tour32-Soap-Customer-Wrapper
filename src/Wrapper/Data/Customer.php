<?php

/**
 * Created by PhpStorm.
 * User: robert
 * Date: 14.04.19
 * Time: 10:18
 */

namespace T32Dev\SoapCustomer\Wrapper\Data;

use T32Dev\SoapCustomer\Wrapper\Data;
use T32Dev\SoapCustomer\Wrapper\Data\DynamischeEigenschaft;
use T32Dev\SoapCustomer\Wrapper\Data\KontaktHistorie;

class Customer extends Data
{
    protected $defaults = [
        'FunctionType' => 1,
        'ID' => 0,
        'Nachname' => '',
        'Vorname' => '',
        'Geschlecht' => '',
        'Geburtsdatum' => '',
        'Mail' => '',
        'Anrede' => '',
        'Strasse' => '',
        'CO' => '',
        'Zusatz' => '',
        'PLZ' => '',
        'Ort' => '',
        'Land' => '',
        'Kategorie' => 0,
        'Vorwahl' => '',
        'Telefon' => '',
        'Fax' => '',
        'Handy' => '',
        'VorwahlG' => '',
        'TelefonG' => '',
        'FaxG' => '',
        'MailG' => '',
        'HandyG' => '',
        'Herkunft' => '',
        'Passnummer' => '',
        'AusgestelltAm' => '',
        'GueltigBis' => '',
        'AusgestelltIn' => '',
        'Beruf' => '',
        'Allergien' => '',
        'Verpflegung' => '',
        'Nationalitaet' => '',
        'Bemerkung' => '',
        'NotfallKontakt' => '',
        'Partner' => null,
        'Kinder' => [],
        'DynEigenschaften' => [],
        'Passdaten' => null,
        'KontaktHistorie' => null,
        'FIT' => null,
    ];

    public function buildRequestData($inputArray)
    {
        $data = parent::buildRequestData($inputArray);
        if (isset($data['Kinder']) && is_array($data['Kinder']) && count($data['Kinder']) > 0) {
            $kinderArray = [];
            foreach ($data['Kinder'] as $kindData) {
                $Kind = new Kind();
                $kinderArray[] = $Kind->buildRequestData($kindData);
            }
            $data['Kinder'] = $kinderArray;
        }
        if (isset($data['Partner']) && is_array($data['Partner']) && count($data['Partner']) > 0) {
            $partnerArray = [];
            foreach ($data['Partner'] as $partnerData) {
                $Partner = new Partner();
                $partnerArray = $Partner->buildRequestData($partnerData);
            }
            $data['Partner'] = $partnerArray;
        }
        if (isset($data['DynEigenschaften']) && is_array($data['DynEigenschaften']) && count($data['DynEigenschaften']) > 0) {
            $dynamischeEigenschaftenArray = [];
            foreach ($data['DynEigenschaften'] as $dynData) {
                $DynEigenschaft = new DynamischeEigenschaft();
                $dynamischeEigenschaftenArray[] = $DynEigenschaft->buildRequestData($dynData);
            }
            $data['DynEigenschaften'] = $dynamischeEigenschaftenArray;
        }
        if (isset($data['KontaktHistorie']) && !is_null($data['KontaktHistorie'])) {
            $KontaktHistorie = new KontaktHistorie();
            $data['KontaktHistorie'] = $KontaktHistorie->buildRequestData($data['KontaktHistorie']);
        }
        if (isset($data['Passdaten']) && !is_null($data['Passdaten'])) {
            $passDaten = new Passdaten();
            $data['Passdaten'] = $passDaten->buildRequestData($data['Passdaten']);
        }
        if (isset($data['FIT']) && !is_null($data['FIT'])) {
            $fit = new Fit();
            $data['FIT'] = $fit->buildRequestData($data['FIT']);
        }
        return $data;
    }
}
