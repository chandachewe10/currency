<?php

namespace Chandachewe\Currency\Drivers;

require '.../../vendor/autoload.php';
use Chandachewe\Currency\CurrencyFormats;
use Chandachewe\Currency\Exceptions\CurrencyNotFoundException;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
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
                    'timeout'  => 120.0,
                ]);
                $response = $client->request('GET', 'latest?base='.$base_currency);
                $this->hydrate($response->getBody());
            }
        } catch (CurrencyNotFoundException $e) {
            $errorMessage = $e->invalidCurrency();

            return $errorMessage;
        }
    }

    public function hydrate($response)
    {
        $data = json_decode($response, true);

        return CurrencyFormats::$formats[0] = $data['rates']['AED'];
    }
}
