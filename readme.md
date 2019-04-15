# php Soap Wrapper für Tour32Web Soap Webservices

#### Achtung: Dieses Paket ist **NUR** für Tour32Web Soap Webservices

Siehe https://www.tour32.de

### Vorasussetzungen

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
