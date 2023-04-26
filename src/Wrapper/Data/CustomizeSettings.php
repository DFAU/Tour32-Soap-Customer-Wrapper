<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 14.04.19
 * Time: 10:20
 */

namespace T32Dev\SoapCustomer\Wrapper\Data;

use T32Dev\SoapCustomer\Wrapper\Data;

class CustomizeSettings extends Data
{

    protected $defaults = [
        'CustomizeSettingsActive' => false,
        'TextErgaenzen' => true,
        'MemoErgaenzen' => true,
        'BriefAnredeAlsFamilie' => false,
        'DublettenPruefen' => true,
        'PartnerDublettenPruefen' => false,
        'KontakthistorieDublettenPruefen' => false,
        'DublettenModus' => 4,
    ];

}
