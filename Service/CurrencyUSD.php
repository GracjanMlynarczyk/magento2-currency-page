<?php


namespace Ghratzoo\EuroCurrency\Service;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;

class CurrencyUSD implements \Ghratzoo\EuroCurrency\Api\CurrencyUSD
{
    /**
     * @var StoreManagerInterface
     */
    private StoreManagerInterface $storeManager;

    /**
     * CurrencyUSD constructor.
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(StoreManagerInterface $storeManager)
    {
        $this->storeManager = $storeManager;
    }


    /**
     * @return string
     * @throws NoSuchEntityException
     */
    public function getRateUSD(): string
    {
        return $this->storeManager->getStore()->getBaseCurrency()->getRate('USD');
    }

    /**
     * @param string|null $curr
     * @return string
     * @throws NoSuchEntityException
     */
    public function getRate(string $curr = null): string
    {
        return $this->storeManager->getStore()->getBaseCurrency()->getRate($curr) ?? "";
    }
}
