<?php  
namespace Chandachewe\Currency;  
class CurrencyNotFoundException extends \Exception{
    public function invalidCurrency() {
      //error message
      $errorMsg = 'Whoops, this ' .$this->getMessage(). 'currency format on line '.$this->getLine().' is not a valid currency format. Are you sure there is a country which uses this currency?';
      return $errorMsg;
    }
  }



?>