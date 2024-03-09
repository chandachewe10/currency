<?php

namespace Chandachewe\Currency\Exceptions;

class DriverNotFoundException extends \Exception
{
    public function invalidDriver()
    {
        //error message
        $errorMsg = 'Whoops, this '.$this->getMessage().'key on line '.$this->getLine().' is not a valid Exchange Driver. Are you sure you have provided the Driver and it is valid?';

        return $errorMsg;
    }
}
