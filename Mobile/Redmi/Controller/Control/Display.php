<?php
 
namespace Mobile\Redmi\Controller\Control;
 
use Magento\Framework\Controller\ResultFactory;
 
class Display extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
 
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Mobiles'));
        return $resultPage;
    }
}