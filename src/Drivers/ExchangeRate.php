<?php

namespace Chandachewe\Currency\Drivers;

use Chandachewe\Currency\CurrencyFormats;
use Chandachewe\Currency\Exceptions\CurrencyNotFoundException;

require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
use GuzzleHttp\Client;

class ExchangeRate
{
    public function __construct($base_currency)
    {
        try {
            if (!$base_currency) {
                throw new CurrencyNotFoundException($base_currency);
            } else {
                $client = new Client([
                    'base_uri' => $_ENV['BASE_URL_EXCHANGERATE'],
                    'timeout'  => 2.0,
                ]);
                $response = $client->request('GET', 'latest?base=USD');
                $this->hydrate($response);
            }
        } catch (CurrencyNotFoundException $e) {
            $errorMessage = $e->invalidCurrency();

            return $errorMessage;
        }
    }

    public function hydrate($response)
    {
        $data = json_decode($response, true);

        return CurrencyFormats::$formats = $data['rates'][0];
    }
}
