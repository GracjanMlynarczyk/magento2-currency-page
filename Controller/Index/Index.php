<?php


namespace Ghratzoo\EuroCurrency\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Store\Model\StoreManagerInterface;

class Index extends Action
{
    /**
     * @var StoreManagerInterface
     */
    private StoreManagerInterface $storeManager;

    /**
     * Index constructor.
     * @param Context $context
     */
    public function __construct(Context $context, StoreManagerInterface $storeManager)
    {
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }


    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
