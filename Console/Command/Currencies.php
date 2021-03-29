<?php

namespace Ghratzoo\EuroCurrency\Console\Command;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Magento\Directory\Model\CurrencyFactory;
use Magento\Directory\Model\ResourceModel\Currency;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Currencies extends Command
{
    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('currency');
        $this->setDescription('Get Currencies');
        parent::configure();
    }

    /**
     * CLI command description
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $client = new Client();

        $rateEUR = json_decode($client->get("http://api.nbp.pl/api/exchangerates/rates/a/eur?format=json")->getBody()->getContents())->rates[0]->mid;
        $rateUSD = json_decode($client->get("http://api.nbp.pl/api/exchangerates/rates/a/usd?format=json")->getBody()->getContents())->rates[0]->mid;

        $array = [
            "PLN" => [
                "EUR" => $rateEUR,
                "USD" => $rateUSD
            ],
            "EUR" => [
                "PLN" => 0.21
            ],
            "USD" => [
                "PLN" => 0.25
            ]
        ];
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $currencyFactory = $objectManager->get('Magento\Directory\Model\CurrencyFactory');
        $currencyFactory->create()->saveRates($array);

    }
}
