<?php
namespace Bluethink\Crud\Controller\Sample;

class Display extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		// echo "Hello World";
		// exit;
        return $this->_pageFactory->create();
	}
	
}