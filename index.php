<<<<<<< HEAD
<?php
require 'vendor/autoload.php';
use Chandachewe\Currency\Drivers\ExchangeConverter;
use Chandachewe\Currency\Drivers\ExchangeRate;
use Chandachewe\Currency\CurrencyConverted;
use Chandachewe\Currency\CurrencyFormats;
use Chandachewe\Currency\DriverAccessKeys\ExchangeRateDriverAccessKey;


ExchangeRateDriverAccessKey::$exchangerate_access_key = '0kkswiiw993889309309jjmsklklsoee';
// echo ExchangeConverter::convert('10', 'USD', 'ZMW');
// echo CurrencyConverted::$currency_conversion;
echo ExchangeRate::exchange('USD', 'GBP');
echo CurrencyConverted::$currency_rate;
=======
<?php 
 require 'vendor/autoload.php';   
 use Chandachewe\Currency\Drivers\ExchangeConverter;
 use Chandachewe\Currency\Drivers\ExchangeRate;
 use Chandachewe\Currency\CurrencyConverted;
 use Chandachewe\Currency\CurrencyFormats;

 ExchangeConverter::convert('10', 'USD', 'ZMW');
 echo CurrencyConverted::$currency_conversion; 
>>>>>>> c56ac8b99f67bc967fe427a595a8cf13c5912dbd
