<?php 
 require 'vendor/autoload.php';   
 use Chandachewe\Currency\Drivers\ExchangeConverter;
 use Chandachewe\Currency\Drivers\ExchangeRate;
 use Chandachewe\Currency\CurrencyConverted;
 use Chandachewe\Currency\CurrencyFormats;

 ExchangeConverter::convert('10', 'USD', 'ZMW');
 echo CurrencyConverted::$currency_conversion; 