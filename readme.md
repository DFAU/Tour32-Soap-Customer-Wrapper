# php Soap Wrapper für Tour32Web Soap CustomerCGI

#### Achtung: Dieses Paket ist **NUR** für Tour32Web Soap Webservices

Siehe https://www.tour32.de

### Voraussetzungen

 - php5 oder php7
 - php Soap Extension (php-soap)

### Installation

via composer

    composer require t32dev/soap-customer-wrapper
    
### Verwendung    

Die URL zur WSDL, Benutzername und Passwort erhalten Sie von der Kohlenberg Software GmbH.

Die Konfiguration setzen:

    $wsdl = "<url-zur WSDL>";
    $user = "<benutzername>";
    $pass = "<passwort>";
    // Konfig setzen
    T32Dev\SoapCustomer\Wrapper::setConfig($wsdl, $user, $pass);
    
Einfachste Form Kundendaten zu übertragen:

    T32Dev\SoapCustomer\Wrapper::setConfig($wsdl='', $user='', $pass='');
    $soapWrapper = new \T32Dev\SoapCustomer\Wrapper();
    $soapWrapper->setCustomerData(array(
        'Vorname'  => 'Max',
        'Nachname' => 'Mustermann',
        'Mail'     => 'max@mustermann.de',
    ));    
    
Rückgabe ist true | false, je nach Erfolg.

Die Anwort kann separat ausgewertet werden, dazu kann das REsponse-Objekt ausgewertet werden.

    $result = $soapWrapper->getResult()
    print $result->Status; // 0 = kein Fehler
    print $result->Error; // string - Info zum Fehler
    print $result->DynError; // string - Info zum Fehler bei dynamischen Eigenschaften
    print $result->ID; // integer - Datensatznummer des Kunden aus Tour32
    print $result->Doub; // strint - Info, falls eine Doublette erkannt wurde
    
        
### Erweiterte Daten (Partner, Kinder, Dynamische Eigenschaften)

#### Kinder:
 
 
     $soapWrapper->setCustomerData(array(
         'Vorname'  => 'Max',
         'Nachname' => 'Mustermann',
         'Mail'     => 'max@mustermann.de',
         'Kinder'   => array( // mehrere Kinder als array
             array(
                 'Geschlecht'   => \T32Dev\SoapCustomer\Wrapper\Data::GENDER_MALE, // oder "M"
                 'Vorname'      => 'Kevin',
                 'Nachname'     => 'Mustermann',
                 'Geburtsdatum' => '01.01.2010'
             )
         )
     ));

#### Partner:
 
 
    $soapWrapper->setCustomerData(array(
         'Vorname'  => 'Max',
         'Nachname' => 'Mustermann',
         'Mail'     => 'max@mustermann.de',
         'Partner'  => array( // nur 1 Partner möglich - kein array
             'Geschlecht'   => \T32Dev\SoapCustomer\Wrapper\Data::GENDER_FEMALE, // oder "W"
             'Vorname'      => 'Sabine',
             'Nachname'     => 'Mustermann',
             'Geburtsdatum' => '01.01.1970'
         )
     ));

#### Dynamische Eigenschaften:
 
 
    $soapWrapper->setCustomerData(array(
         'Vorname'  => 'Max',
         'Nachname' => 'Mustermann',
         'Mail'     => 'max@mustermann.de',
         'DynEigenschaften'   => array( // mehrere dyn. Eigenschaften als array
             array(
                 'Remove'       => true
                 'Vorgang'      => '?',
                 'DynTyp'       => '?',
                 'Schluessel'   => '?'
                 'Text'         => '?'
             )
         )
     ));


#### Passdaten und Visa-Details



    $soapWrapper->setCustomerData($data = array(
        'Vorname'         => 'Robert',
        'Nachname'        => 'Schwandner',
        'Mail'            => 'robert@kohlenberg.info',
        'KontaktHistorie' => array(
            'Kontaktart' => 'die Kontaktart 2',
            'Quelle'     => 'die Quelle 2',
            'Memo'       => 'das Memo 2',
        ),
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

     
     
### Individuelle Eigenschaften bei abweichendem Webservice

Falls Sie einen individuellen Webservice nutzen, dessen Objekte über abweichende bzw. zusätzliche Eigenschaften verfügen, können diese auch gesetzt werden.      
Bsp: Das Partner-Objekt hat bei Ihnen eine zusätzliche Eigenschaft "Lieblingsfarbe" mit dem Standardwert "blau"
Um eine Fehlermeldung "Object hasn't Property 'Lieblingsfarbe' zu vermeiden, wenn diese nicht gesetzt ist, setzen Sie bitte:

    \T32Dev\SoapCustomer\Wrapper\Data\Partner::addExtraProperty('Lieblingsfarbe', 'blau');
