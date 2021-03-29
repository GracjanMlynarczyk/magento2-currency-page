<?php


namespace Ghratzoo\EuroCurrency\Api;


/**
 * Interface CurrencyUSD
 * @package Ghratzoo\EuroCurrency\Api
 * @api
 */
interface CurrencyUSD
{
    /**
     * @return string
     */
    public function getRateUSD(): string;

    /**
     * @param string|null $curr
     * @return string
     */
    public function getRate(string $curr = null): string;
}
