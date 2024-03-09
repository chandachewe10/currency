<?php

namespace Chandachewe\Currency\Exceptions;

class ApiKeyNotFoundException extends \Exception
{
    public function invalidApiKey()
    {
        //error message
        $errorMsg = 'Whoops, this '.$this->getMessage().' key on line '.$this->getLine().' is not a valid API Key. Are you sure you have provided the API/Access Key and it is valid?';

        return $errorMsg;
    }
}
